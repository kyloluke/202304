# lp3-server データモデル設計書作成環境 README

本ディレクトリは、lp3-server アプリケーションのデータモデル設計書の作成環境です。  
Markdown と PlantUML によってデータモデルを設計し、その結果をまとめた設計書を出力します。

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
|  |                 データモデルの機能的・構造的な分類をディレクトリ構造で表現しています
|  |_ lp3-core/        LP3の基礎となるモデルを格納しています
|  |_ lp3-cargo/       貨物関連のモデルを格納しています
|  |_ lp3-ship/        本船関連のモデルを格納しています
|  |_ ...以下ドメインモデル設計書と同名のディレクトリ...
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
