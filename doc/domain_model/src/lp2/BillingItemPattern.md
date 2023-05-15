### BillingItemPattern / 請求明細パターン モデル

請求明細を入力する際の入力補助に用いるパターン情報を表す。
TODO 商品スキームに統廃合される

```plantuml
hide empty members

class BillingItemPattern implements DomainModel {
    + String 名称
    + String コード
    + enum タイプ
    + String 数量単位
    + Currency 通貨
    + float 単価
    + TaxClass 課税区分
}
```

* データ移行の仕方要検討
  * 事前にLP2請求明細パターンに対応する商品スキーム＋商品を作ってもらい、対応付ける。その際に各荷主に対する見積書も生成する
  * できれば請求明細パターンを移行せずに済むような請求書移行方式を取りたい
