### inspection_type データモデル

ドメインモデル InspectionType を永続化するためのデータモデル。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

entity inspection_types extends data_model {
     name : string(max:50)                                     # 検査種別名
}
```

#### テーブル

inspection_types テーブルに格納する。

#### カラム

ドメインモデルの各プロパティに対応するカラムを保持する。
