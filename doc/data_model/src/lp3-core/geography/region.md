### region データモデル

ドメインモデル Region を永続化するためのデータモデル。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

entity regions extends data_model {
     name : string(max:50)                                     # 地域名
}
```

#### テーブル

regions テーブルに格納する。

#### カラム

ドメインモデルの各プロパティに対応するカラムを保持する。
