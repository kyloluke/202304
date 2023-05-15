### tax_rate データモデル

ドメインモデル TaxRate を永続化するためのデータモデル。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

entity tax_rate extends data_model {
    type : enum(tax_type)   # 種別
    rate : decimal(1, 3)    # 税率
    period_from : timestamp # 適用期間(開始日時)
    period_to : timestamp   # 適用期間(終了日時)
}
```

#### テーブル

tax_rates テーブルに格納する。

#### カラム

ドメインモデル TaxRate の各プロパティに対応するカラムを保持する。
