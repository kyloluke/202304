# lp3-server

`lp3-server`は、LaPlus3のサーバーアプリケーション開発用リポジトリです。


## 開発環境

* OS : Windows / Linux / Mac
* Webサーバー : Nginx 1.20 系
* フレームワーク : Laravel 9 系
* IDE : Visual Studio Code / Jetbrains製IDE


## ブランチ構成

* mainブランチ : マスター用ブランチです。マイルストーンリリースを含めて、リリース時にはこのブランチ上にタグを打ちます
* developブランチ : 開発用ブランチです。このブランチから作業用ブランチを作成します


## ファイル構成

```
|_ doc/        設計ドキュメントを格納しています
|_ app/        アプリケーションのソースファイルを格納しています
|_ docker/     Docker版実行環境に関するファイルを格納しています
|_ aws/        AWS版実行環境に関するファイルを格納しています
|_ README.md   本ドキュメントです
|_ .gitignore  一般的な.gitignoreファイルです
```


## 基本ルール

* developブランチから作業用ブランチを作成し、そのブランチ上でコミットを重ねてください
* コミット時のメッセージは日本語で記述してください
* 作業用ブランチ上でのコミットが完了したら、developブランチへのマージリクエストを作成してレビュワーを設定してください
* ディレクトリ名・ファイル名は英語にしてください
* テキストファイルは特別な理由がない限り BOMなし・UTF-8・LF 形式にしてください
* サイズの大きなバイナリファイルは格納しないでください。必要がある場合は相談してください


## 相談先

本リポジトリに関するリクエストや相談事は紀平or相京@アバンテまで。
