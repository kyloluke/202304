# lp3-server ドメインモデル設計書作成環境 README

本ディレクトリは、lp3-server アプリケーションのドメインモデル設計書の作成環境です。  
Markdown と PlantUML によってドメインモデルを設計し、その結果をまとめた設計書を出力します。

### 現在のステータス

* 済み
  * モデルを識別
  * 各モデルが持つ重要な情報を洗い出し
  * 各モデル間の関係性を大まかに設計
* 作業中
  * LP2のデータモデルの全フィールドを見て必要な情報を本設計に取り込み＋LP3では不要なものを削除
  * 要確認点と漏れを潰す
  * リファクタリング
  * 各モデルのコメント拡充

## 必要なパッケージ

本環境で設計書をビルドするためには、システムに以下のパッケージをインストールしてください。

* Python 3.10 with venv
* Pandoc 2.9
* OpenJDK 11
* PlantUML 1.2020.02
* LuaTex 1.14 with recommended fonts, CJK language
* GNU Make 4.3

Ubuntu 22.04LTSでのインストール例を挙げます。

```shell
$ sudo apt install python3 python3-venv
$ sudo apt install pandoc
$ sudo apt install openjdk-11-jdk-headless
$ sudo apt install plantuml
$ sudo apt install texlive texlive-fonts-recommended texlive-lang-cjk texlive-luatex
```

※Ubuntu 20.04LTSで上記のコマンドを実行した際にエラーが発生する場合は、以下のコマンドを実行してください。

```shell
$ sudo apt update
```

## ビルド動作確認済みのOS

以下のOS上でビルド動作を確認しています。

* Ubuntu 22.04LTS
* Ubuntu 20.04LTS on Windows10 WSL2
* macOS Big Sur

## ファイル構成

```
.
|_ src/              設計書のソースファイルを格納しています
|  |                 ドメインモデルの機能的・構造的な分類をディレクトリ構造で表現しています
|  |_ lp3-core/        LP3の基礎となるモデルを格納しています
|  |_ lp3-cargo/       貨物関連のモデルを格納しています
|  |_ lp3-ship/        本船関連のモデルを格納しています
|  |_ lp3-job/         ジョブ関連のモデルを格納しています
|  |_ lp3-sales/       販売管理関連のモデルを格納しています
|  |_ lp3-bi/          BI関連のモデルを格納しています。ダッシュボードで使う想定です
|  |_ exl-inttra/      INTTRA社API連携関連のモデルを格納しています
|  |_ exl-sync-banc/   SYNC社BANC連携関連のモデルを格納しています
|  |_ exl-sync-dp/     SYNC社データポータル連携関連のモデルを格納しています
|  |_ exl-sync-ftp/    SYNC社FTP連携関連のモデルを格納しています。名前など変わるかも
|  |_ exl-sync-metabase/   SYNC社Metabase連携関連のモデルを格納しています
|  |_ exl-sync-web/    SYNC社Webサイト連携関連のモデルを格納しています
|  |_ exl-bfwd-ftp/    BEFORWARD社FTP連携関連のモデルを格納しています
|
|_ Makefile          設計書をビルドするための Makefile です 
|_ requirements.txt  Python の依存ライブラリを記述しています
|_ README.md         本ドキュメントです
|_ .gitignore        一般的な .gitignore ファイルです
```

## 設計書のビルド方法

設計書をビルドするには、以下のように本ディレクトリ内で`make all`コマンドを実行してください。  
ビルドが成功すると、dist ディレクトリに HTML ファイルと画像ファイルが出力されます。

```bash
$ cd ${this directory}

# 使い方をプリントする
$ make

# ビルドする
#   Python の venv 環境のセットアップを含めて必要な処理が全て実行される
#   成果物は dist ディレクトリに出力される
$ make all

# 成果物を削除する
$ make clean

# Python の venv 環境も含めて全ての生成ファイルを削除する
$ make distclean
```

## ドメインモデルの実装について

Laravel でドメインモデルをダイレクトに実装することは困難なため、本ディレクトリをドメインモデルの設計兼実装として扱います。


## 開発中の設計変更について

1. 開発中のドメインモデルの設計変更は、本ディレクトリ内のファイルに対して実施します。
できるだけ相京が変更しますが、場合によってメンバーにお願いすることがあります。


2. 設計に変更を加えた場合は、マージリクエストを作成し、レビュアーに相京を設定してください。
それに加えて、変更の影響を受けそうなメンバーもレビュアーに追加してください。


3. できるだけ、ドメインモデルの変更後にデータモデルやビューモデルを変更するようにお願いします。
設計情報と実装が一致している状態を保つためです。ただし時間がない場合などは実装を優先して構いません。
実装を先行して変更した場合は事後に相京まで連絡をお願いします。
