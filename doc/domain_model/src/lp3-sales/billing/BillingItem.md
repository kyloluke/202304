### BillingItem / 請求明細 モデル

請求の明細情報を表す。

```plantuml
hide empty members

class BillingItem implements DomainModel {

    + QuotationItem|null quotationItem  # 見積明細
    
    + ProductPurchaseUnitPriceItem[]    # 最終的な商品仕入れ単価明細を持つ必要がある。商品側の仕入れ情報は見込み値
    
    + String name                       # 名称
    + enum category                     # タイプ TBC FREIGHT,VANNING,CHASSIC
    + float amount                      # 数量
    + String amountUnit                 # 数量単位
    + float unitPrice                   # 単価
    + Currency currency                 # 通貨
    + float currencyRate                # 為替レート
    + TaxClass taxClass                 # 課税区分

    + bool includeConsumptionTax        # 課税金額消費税込フラグ    
    + float consumptionTaxRate          # 消費税率

    + Job|Chassis|null source           # 請求ソース
}
```

#### プロパティ

quotationItem / 見積明細
: 対応する見積明細。見積なしで発生する請求明細の場合はnull。
見積明細がある場合、手動による金額などの調整は禁止する。代わりに金額調整を表す請求明細を別に作る運用とする。

name / 名称
: 名称。TBC quotationItemとは異なる場合のみ必要なフィールド？他も同様

type / タイプ
: TBC

amount / 数量
: 数量。

amountUnit / 数量単位
: 数量の単位。

unitPrice / 単価
: 単価。

currency / 通貨
: 使用する通貨。

currencyRate / 為替レート
: 対円の為替レート。

charge / 手数料
: 手数料。

float consumptionTaxRate / 消費税率
: 消費税率。

source / 請求ソース
: 請求の根拠となるオブジェクト。

