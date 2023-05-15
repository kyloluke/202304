# TODO README整備する

## アプリケーション初期セットアップメモ on Ubuntu22.04LTS

```shell

# PHPを入れる
$ which php
$ php
Command 'php' not found, but can be installed with:
sudo apt install php8.1-cli  # version 8.1.2-1ubuntu2.9, or
sudo apt install php-cli     # version 2:8.1+92ubuntu1

$ sudo apt install php8.1-cli
$ php --version
PHP 8.1.2-1ubuntu2.9 (cli) (built: Oct 19 2022 14:58:09) (NTS)
Copyright (c) The PHP Group
Zend Engine v4.1.2, Copyright (c) Zend Technologies
    with Zend OPcache v8.1.2-1ubuntu2.9, Copyright (c), by Zend Technologies

# PHP拡張を入れる。Laravelプロジェクトを作成する際に必要になるため
$ sudo apt install php8.1-dom php8.1-xml php8.1-curl


# Composerを入れる
$ which composer
$ composer
Command 'composer' not found, but can be installed with:
apt で入れれるものはバージョンが少し古い,composer self-update が使えないため入れない。
公式ページのインストール手順に従って2.4.4をインストールする
Composer site (https://getcomposer.org) > download

$ php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
$ php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
$ php composer-setup.php
$ php -r "unlink('composer-setup.php');"
$ sudo mv composer.phar /usr/local/bin/composer
$ which composer
/usr/local/bin/composer
$ composer --version
Composer version 2.4.4 2022-10-27 14:39:29

# プロジェクトを作成する
$ cd lp3-server
$ composer create-project laravel/laravel app

# できあがったプロジェクトファイル一式のうち、vendorディレクトリ以外をリポジトリに登録する(プロジェクト作成時に.gitignoreに登録されている）
```

## アーキテクチャ設計・方針

参考資料の「なんちゃってクリーンアーキテクチャ」をベースに、Laravel内で論理的なマイクロサービス化をする、という方針の設計にしています。

### 参考資料

- [5年間 Laravel を使って辿り着いた，全然頑張らない「なんちゃってクリーンアーキテクチャ」という落としどころ](https://zenn.dev/mpyw/articles/ce7d09eb6d8117)
- 方式設計.drawio > サービス方式概要図（LP3版） ※/doc/misc/方式設計.drawio

### ファイル構成

#### 全体

- app/
- ...
- services/ : 各マイクロサービスを格納するためのディレクトリ
    - (マイクロサービス1)/ : ※ディレクトリの名前はケバブケースにしてください
    - (マイクロサービス2)/
    - ...
    - sample-alice/ : サンプルのマイクロサービス1
    - sample-bob/ : サンプルのマイクロサービス2
    - template/ : マイクロサービスの構成のテンプレート
- ...

#### 各マイクロサービス

- app/
    - Console/
        - Commands/ : コマンド用のディレクトリ
        - UseCases/ : コマンドから利用するユースケース用のディレクトリ
    - Http/
        - Controllers/ : コントローラー用のディレクトリ
        - Requests/ : リクエスト用のディレクトリ
        - Resources/ : APIリソース用のディレクトリ
        - UseCases/ : コントローラーから利用するユースケース用のディレクトリ
    - Listeners
        - EventSubscriber.php : イベントサブスクライバクラス
    - Models/ : モデル用のディレクトリ
    - Services/ : サービス(ユースケース以外の共通機能)用のディレクトリ
    - UseCases/ : コマンド(app/Console/Commands/)、API(app/Http/Controllers)以外から利用するユースケース用のディレクトリ
- database/
    - migrations/ : マイグレーション用のディレクトリ
- exports/ : 別サービスに機能を提供するためのディレクトリ
- refers/ : 別サービスの exports/ 以外の機能を参照するためのディレクトリ
- routes/
    - api.php : APIのルート登録用のファイル
- tests/
    - Feature/ : Featureテスト用のディレクトリ
    - Unit/ : Unitテスト用のディレクトリ

### Laravelでの方式設計の実装方法

#### APIゲートウェイ

「方式設計.drawio > サービス方式概要図（LP3版）」の「APIゲートウェイ」の役割は、 `\App\Providers\RouteServiceProvider` が担う。  
リクエストの内容に応じたマイクロサービスの分岐、マイクロサービス間でのアクセス制御、といった制御が必要な場合は `\App\Providers\RouteServiceProvider` で制御をする。

#### ドメインサービス等

「方式設計.drawio > サービス方式概要図（LP3版）」の「ドメインサービス等」にあたるものが必要な場合は、呼び出される側のマイクロサービスの `.../exports/` 内にサービスのインターフェイスを用意する。  
呼び出す側のマイクロサービスは用意されたインターフェイスを利用し、呼び出される側のマイクロサービスが実装した機能を呼び出す。

##### 参考

- /services/sample-alice/exports/SampleAliceService.php : 呼び出される側のマイクロサービスのサービスのインターフェイス
- /services/sample-alice/app/Services/SampleAliceServiceMock.php : 呼び出される側のマイクロサービスのサービスの実装
- /services/sample-bob/app/Console/UseCases/UseExportedService.php : 呼び出す側のマイクロサービスのインターフェイスの利用

#### イベントサービス(イベント配信・イベント講読)

本アプリケーションのマイクロサービス間でのイベント配信・講読の実装方法について述べる。

本来のマイクロサービス実装では、メッセージキューなどを用いて、マイクロサービス間での粗結合なイベント配信・講読を実現することが一般的である。  
これに対して、本アプリケーションの擬似的なマイクロサービス構成においては、Laravelのイベント処理の仕組みをそのまま利用する。

実装上は密結合に動作するLaravelのイベント処理を利用するものの、概念上はイベントの配信と購読は粗結合にするべきである。
そこで、イベント配信側のマイクロサービスではイベント配信用のインターフェースを定義し、イベント購読側のマイクロサービスではイベント講読用のインターフェースを定義することで、概念上は祖結合であることを表現する。

**配信側のマイクロサービス**
1. イベント配信用のサービスインターフェイスを定義する
2. 1.の実装を定義する。これはDIによって実行時に注入する
3. 通知すべきイベントが発生した際には、1.のサービスインターフェイスを用いてイベントを配信する

**購読側のマイクロサービス**
1. `${購読側のマイクロサービス}\App\Listeners\EventSubscriber` にイベント購読用のクラスを定義する
2. 1. をLaravelのイベントサービスプロバイダーに登録する
3. 1. のイベント受信処理内で、具体的なイベントを識別して希望する処理を行う

詳細はサンプルを参照のこと。

##### 参考

- /services/sample-alice/app/Services/EventDispatch/EventDispatchService.php : イベント配信のサービスのインターフェイス
- /services/sample-alice/app/Services/EventDispatch/EventDispatchServiceApp.php : Laravelのイベント機能を使ったイベント配信のサービスの実装
- /services/sample-alice/exports/Events/SampleAliceEvent.php : 配信するイベントのインターフェイス
- /services/sample-alice/app/Events/SampleAliceEvent.php : 配信するイベントの実装
- /services/sample-bob/app/Listeners/EventSubscriber.php : イベント講読

### その他詳細

#### コマンド

1つのコマンドに対して1つのユースケースを作成する。

##### 参考

- /services/sample-alice/app/Console/Commands/Hello.php : コマンド
- /services/sample-alice/app/Console/UseCases/Hello.php : コマンドに対応するユースケース

#### API

1つのAPIに対して1つのリクエスト、ユースケース、APIリソース(コレクション)を作成する。

また、[Scribe](https://scribe.knuckles.wtf/laravel/)を利用してソースコードからAPIリファレンスを生成するため、[Scribe](https://scribe.knuckles.wtf/laravel/)用のコメントやメソッドを(主にコントローラー、リクエストに)追加する。

##### 参考

- /services/sample-alice/app/Http/Controllers/AnimalController.php　の index() : API
- /services/sample-alice/app/Http/Requests/Animal/IndexRequest.php : APIに対応するリクエスト
- /services/sample-alice/app/Http/UseCases/Animal/Index.php : APIに対応するユースケース
- /services/sample-alice/app/Http/Resources/Animal/IndexResourceCollection.php : APIに対応するAPIリソースコレクション

#### exports

別のマイクロサービスに対して提供するサービスやイベントがある場合は、各マイクロサービスの `.../exports/` 以下にインターフェイス等を作成する。

##### 参考

- /services/sample-alice/exports/

#### refers

別のマイクロサービスが `.../exports/` 以下で明示的に提供している機能以外のものを利用する必要がある場合は、各マイクロサービスの `.../refers/` 以下にクラス等を作成する。  
各マイクロサービスのプログラムは `.../refers/` 以下のクラスなどを中継して別のマイクロサービスが提供していない機能を利用し、後から検出や置換が可能なようにする。

##### 参考

- /services/sample-bob/refers/

#### マイグレーション

各マイクロサービス毎にマイグレーションを作成する。

■ マイグレーション作成時のコマンド例

```batch
$ php artisan make:migration create_animals_table --path=services/sample-alice/database/migrations
```

■ マイグレーション実行時のコマンド例

```batch
$ php artisan migrate
```

※パスの指定を省略して実行できるように、 /app/Console/Commands/Migrations/MigrateCommand.php でLaravel標準のマイグレーションの実行コマンドを上書きしています

#### テスト

ユースケースのクラスに対しては、必ずユニットテストを作成する。  
ユースケース以外のクラスに対しては、必要に応じてユニットテストを作成する。  
APIに対しては必ずフィーチャーテストを作成する。

##### 参考

- /services/sample-alice/tests/Unit/app/Http/UseCases/Animal/IndexTest.php : ユースケースのクラスに対するユニットテスト
- /services/sample-alice/tests/Feature/api/Animal/IndexTest.php : APIに対するフィーチャーテスト
