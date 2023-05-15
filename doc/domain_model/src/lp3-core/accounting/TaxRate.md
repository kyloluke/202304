### TaxRate / 税率 モデル

税率を表す。税率の変更に対応するためドメインモデルとして扱う。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class TaxRate implements DomainModel {
    + TaxType type                     # 種別
    + float rate                       # 税率
    + Pair<DateTime, DateTime> period  # 適用期間
}
```

#### プロパティ

type / 種別
: 税の種別。

rate / 税率
: 税率。10%なら0.1となる。

period / 適用期間
: 税の適用期間。FROM <= 日時 < TO の範囲が適用期間となる。
