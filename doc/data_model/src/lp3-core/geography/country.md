### country データモデル

ドメインモデル Country を永続化するためのデータモデル。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

entity countries extends data_model {
    name : string(max:50)                                                      # 国名
    region_id : integer(foreign key = regions.id)                              # 地域ID
}
```

#### テーブル

countries テーブルに格納する。<br>
検査種別リストに関しては、inspection_typesテーブルとの中間テーブルを作成し保存する。

#### カラム

ドメインモデルの各プロパティに対応するカラムを保持する。

### InspectionType
```plantuml
hide empty members
skinparam defaultFontName Monospaced

entity country_required_inspections extends countries {
    ※多対多の中間テーブルなので省略
}
```