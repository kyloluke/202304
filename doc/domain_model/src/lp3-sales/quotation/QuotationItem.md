### QuotationItem / 見積明細 モデル

見積もりの明細情報を表す。

```plantuml
hide empty members

class QuotationItem implements DomainModel {
    + Product product         # 商品
    + null|bool openPrice     # オープン価格フラグ
    + null|float price        # 金額
    + null|TaxClass taxClass  # 課税区分

    TODO
    {条件計算式パラメーター=>値}[] 商品スキームのどの条件判定式パラメーターに、どんな値を当てはめたかのリスト
    {数量計算式パラメーター=>値}[] 商品スキームのどの数量計算式パラメーターに、どんな値を当てはめたかのリスト

    + float 割引率()
}
```

#### プロパティ

product / 商品
: 見積を行う商品。

openPrice / オープン価格フラグ
: オープン価格か。nullなら商品のオープン価格フラグを使用する。

price / 金額
: 見積金額。nullなら商品の金額を使用する。オープン価格でない場合のみ有効なプロパティ。

taxClass / 課税区分
: 課税区分。nullなら商品の課税区分を使用する。
