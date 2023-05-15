### File / ファイル オブジェクト

ファイルを取り扱う際に必要な情報をまとめたユーティリティオブジェクト。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class File {
    + URI uri      # URI
    + String name  # ファイル名
    + String mime  # MIMEタイプ
}
```

#### プロパティ

uri / URI
: ファイルの格納先のURI。  
`s3://bucket/dir/file.txt`、`file://tmp/example.txt` など。

name / ファイル名
: ファイルの名前。用途によってディレクトリ名を含めてもよい。

mime / MIMEタイプ
: ファイルのMIMEタイプ。ファイル名から導出できる場合は設定しなくてもよい。
