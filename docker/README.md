# lp3-server Docker版実行環境 README

本ディレクトリは、lp3-serverアプリケーションのDocker版実行環境です。
開発・デバッグに用いることを想定しています。

## 必要なパッケージ

本環境を使用するためには、システムに以下のパッケージをインストールしてください。

* Docker CLI 20.10
* Docker Compose Plugin 2.14.2
* GNU Make 4.3

なお、DockerとDocker ComposeについてはRootless版をインストールすることを推奨します。
セキュリティ面の安全性が高いことに加えて、コンテナ<=>ホスト間でマウントしたファイルに関してパーミッションの問題が発生しないメリットがあります。

## 動作確認済みのOS

以下のOS上で動作を確認しています。

* Ubuntu 22.04LTS
* Ubuntu 20.04LTS on Windows10 WSL2
* macOS Big Sur
* macOS Monterey

## ファイル構成

```
|_ php/                   PHP実行用コンテナに関するファイルを格納しています
|  |_ Dockerfile            Dockerファイルです
|  |_ php.ini               PHP設定ファイルです
|_ nginx/                 NGINXコンテナに関するファイルを格納しています
|  |_ default.conf          デフォルト設定ファイルです
|_ minio/                 MinIO(S3互換ストレージ)コンテナに関するファイルを格納しています
|  |_ bucket-policy.json    バケットポリシーファイルです
|_ docker-compose.yml     Docker Composeのプロジェクトファイルです
|_ .env.example           Docker Composeの環境設定ファイルのサンプルです
|_ Makefile               Dockerコンテナのビルドや実行を管理するためのMakefileです
|_ README.md              本READMEファイルです
```

## 使い方

コンテナとサービスを起動するには、以下のように本ディレクトリ内で`make up`コマンドを実行してください。

```bash
$ cd ${this directory}
# 使い方をプリントする
$ make
# コンテナとサービスを起動する
$ make up
# Laravel用の.envファイルを作成する。初回のみ実施します
$ make create-laravel-env
# ログを監視する。make, make up 時にもコマンド例がプリントされます
$ docker compose logs -f
# ブラウザを用いてサーバーにアクセスする。make, make up 時にもコマンド例がプリントされます
$ xdg-open http://127.0.0.1:8000
# コンテナとサービスを破棄する
$ make down
```

Docker Composeのみで実現できない付随処理を実行させるために`make`コマンドを利用していますが、
必要に応じて直接`docker compose`コマンドを用いても構いません。

## 環境設定ファイルについて

`make up`等を実行すると`.env`という環境設定ファイルが作成されます。
このファイルではDocker Compose向けの環境変数を定義しています。
定義されている各環境変数については`.env`ファイル中のコメントを参照してください。

## WSL2環境について

WSL2環境では、WSL2上のファイルとDockerコンテナ上のファイルの所有者やアクセス権限が同期されるため、  
Laravelの実行やファイルの編集時にパーミッションエラーが発生する場合があります。

その場合はWSL2環境から以下のようなコマンドを実行し、ファイルの所有者やアクセス権限を変更してください。

```bash
$ chown (WSL2環境のユーザー名):(WSL2環境のグループ名) (ルートディレクトリ)/app/.env

$ chmod -R 777 (ルートディレクトリ)/app/bootstrap/cache/
$ chmod -R 777 (ルートディレクトリ)/app/storage/
```

## APIドキュメントの生成について

コンテナとサービスを起動した上で、以下のように本ディレクトリ内で`make generate-api-reference`コマンドを実行すると、  
(ルートディレクトリ)/doc/api_reference/ にAPIドキュメントが生成されます。

```bash
$ cd ${this directory}
# APIドキュメントを生成する
$ make generate-api-reference
```

APIドキュメントの生成には [Scribe](https://scribe.knuckles.wtf/laravel/) を使用しています。
