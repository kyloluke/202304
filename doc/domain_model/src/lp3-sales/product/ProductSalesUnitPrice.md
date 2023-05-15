### ProductSalesUnitPrice / 商品販売単価 モデル

商品の販売単価を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class ProductSalesUnitPrice implements DomainModel {
    + Product product                  # 商品
    + Pair<DateTime, DateTime> period  # 有効期間
    + bool openPrice                   # オープン価格フラグ
    + float price                      # 価格
    + TaxClass taxClass                # 課税区分
}
```

#### プロパティ

product / 商品
: 対象とする商品。

period / 有効期間
: 販売単価の有効期間。

openProce / オープン価格フラグ
: オープン価格か。オープン価格の場合は価格を事前に決定できない。

price / 価格
: 価格。オープン価格でない場合のみ有効なプロパティ。

taxClass / 課税区分
: 課税区分。
