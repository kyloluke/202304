### cargo_type / 貨物種別 モデル

ドメインモデル CargoType を永続化するためのデータモデル。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

entity cargo_type extends data_model {
    name : string()  # 名称
}
```

## テーブル

cargo_types テーブルに格納する。

#### カラム

ドメインモデルの各プロパティに対応するカラムを保持する。
