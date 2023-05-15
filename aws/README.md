# lp3-server AWSインフラ構築環境 README

本ディレクトリは、lp3-serverアプリケーションのAWSインフラ構築環境です。  
IaC ツールとして Terraform を用いています。


## 必要なパッケージ

本環境を使用するためには、システムに以下のパッケージをインストールしてください。

* Terraform CLI v1.4
* AWS CLI 2.7


## 動作確認済みのOS

以下のOS上で動作を確認しています。

* TODO Ubuntu 22.04LTS
* Windows10
* TODO macOS Big Sur


## ファイル構成

```
.
|_ environments/  各環境向けのファイルを格納しています
|  |_ dev/          開発環境向けのソースファイルを格納しています
|  |_ prod/         プロダクション環境向けのソースファイルを格納しています
|  |_ stg/          ステージング環境向けのソースファイルを格納しています
|_ modules/       各環境で共通使用するモジュールを格納しています
|  |_ base/         基礎モジュールのソースファイルを格納しています
|_ README.md        本ドキュメントです
|_ .gitignore       一般的な.gitignoreファイルです
```


## AWSの準備

1. Terraform のバックエンドとして使う S3 バケットを作成します。

2. 1.で作成したバケットにアクセスできる IAM ユーザーとそのアクセスキーを作成します。

3. AWS CLI のプロファイルを作成します。  
各環境用に、`dev.smart-port.jp`, `prod.smart-port.jp`, `stg.smart-port.jp` という名前でプロファイルを作成します。
```shell
$ aws configure --profile dev.smart-port.jp
> AWS Access Key ID []: ${1.で作成したアクセスキーID}
> AWS Secret Access Key []: ${1. で作成したシークレットアクセスキー}
> Default region name []: ap-northeast-1
> Default output format []: json

$ aws configure --profile prod.smart-port.jp
...以下同様...
```


## 変数値の設定

Terraform に与える変数値を定義するファイルを作成します。  
作成したファイルの内容はそれぞれの環境に合わせて書き換えます。

```shell
$ cd environments/dev
$ cp terraform.tfvars.example terraform.tfvars
...環境に合わせて内容を書き換えます...
```


## 作業ディレクトリの初期化

構築したい環境のディレクトリに移動し、`terraform init` を実行します。

```shell
$ cd environments/dev
$ terraform init
```


## スタックの構築

スタックを構築するにはまず `terraform plan` で実行計画を確認します。  
実行計画に問題がなければ `terraform apply` を実行します。

```shell
$ cd environments/dev
$ terraform plan
$ terraform apply
```


## スタックの破棄

構築したスタックを破棄するには `terraform destroy` を実行します。

```shell
$ cd environments/dev
$ terraform destroy
```


## スタック作成後の設定

1. AWS コンソール上から AP インスタンスに SSM 接続できることを確認します。
2. SNS トピックの受信メールアドレスに届いている確認メールを開き、確認リンクをクリックします。TODO 購読解除できない方式にする
3. SES の Identity を開き、デフォルト構成セットに当該スタックの ses-configurationi-set を指定します。
4. AWS Backup のデフォルトのサービスロールは terraform では作成されないため、手動で作成します。
    * 手動で任意のバックアップジョブ（DB のオンデマンドバックアップなど）を実行すると AWS によってサービスロールが作成されます。
    * サービスロールに AWSBackupServiceRolePolicyForS3Backup ポリシーを追加でアタッチします。S3 のバックアップを許可するためです。
    * サービスロールに AWSBackupServiceRolePolicyForS3Restore ポリシーを追加でアタッチします。S3 のリストアを許可するためです。
5. 使用している DNS サービスで、サービスのドメイン名を ALB の DNS 名にマッピングする CNAME レコードを登録します。
6. アプリケーションをデプロイします。デプロイ方法はアプリケーションの README を参照してください。









## Adminerのセットアップ TODO 整理する

```bash
# adminer用のディレクトリを作成
$ cd /var/www/temp2
$ mkdir temp-adminer
$ cd temp-adminer

# adminerをダウンロードして改名
$ wget https://github.com/vrana/adminer/releases/download/v4.8.1/adminer-4.8.1-mysql.php
$ mv adminer-4.8.1-mysql.php adminer.php

# PHPのセッション保存用ディレクトリの所有者がPHPデフォルトでapahceになっているためnginxに変更
$ sudo ls -al /var/opt/remi/php81/lib/php/session
$ sudo chown -R nginx:nginx /var/opt/remi/php81/lib/php/session
$ sudo ls -al /var/opt/remi/php81/lib/php/session
```

```
# nginx設定
$ cd /etc/nginx/sites-available
$ sudo nano temp2-stg.ma-cp.com.adminer.conf

server {
    listen      8080 default;
    listen      [::]:8080;
    server_name temp2-stg.ma-cp.com 127.0.0.1;
    set         $base /var/www/temp2;
    set         $base_adminer $base/temp-adminer;
    root        $base_adminer;

    # ALB IP to Real IP
    set_real_ip_from   172.17.0.0/16;
    real_ip_header     X-Forwarded-For;

    # gzip
    gzip            on;
    gzip_vary       on;
    gzip_proxied    any;
    gzip_comp_level 6;
    gzip_types      text/plain text/css text/xml application/json application/javascript application/rss+xml application/atom+xml image/svg+xml;
    client_max_body_size 50M;

    # security
    include     nginxconfig.io/security.conf;

    # logging
    access_log  /var/log/nginx/temp2-stg.ma-cp.com.adminer.access.log;
    error_log   /var/log/nginx/temp2-stg.ma-cp.com.adminer.error.log warn;

    # root
    location / {
        try_files $uri $uri/ /adminer.php;
    }

    # handle .php
    location ~ \.php$ {
        alias $base_adminer/;
        fastcgi_pass unix:/var/run/php-fpm/php-fpm.sock;
        include      nginxconfig.io/php_fastcgi.conf;
    }
}
$ cd ../sites-enabled
$ sudo ln -fs ../sites-available/temp2-stg.ma-cp.com.conf temp2-stg.ma-cp.com.conf
$ ls -al ./sites-enabled
```

```
# nginx 再起動してローカルから動作確認
$ sudo nginx -t
$ sudo systemctl restart nginx
$ ss -natu | grep LISTEN
$ curl http://127.0.0.1:8080/adminer.php
```

# Adminer用DBユーザー作成
```bash
$ mysql -h ${RDSエンドポイント} -u ${RDSマスターユーザー名} "-p${RDSマスターユーザーパスワード}" temp2

> CREATE USER temp2_adminer@'%' IDENTIFIED BY '${PASSWORD}';
> GRANT ALL ON temp2.* TO temp2_adminer@'%';
```

**作成者:** Masaki Aikyo
