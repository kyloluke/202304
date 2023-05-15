### ProductPurchaseUnitPrice / 商品仕入単価 モデル

商品の仕入単価を表す。  
この情報と販売単価をもとにして利益計算を行う。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class ProductPurchaseUnitPrice implements DomainModel {
    + Product product                       # 商品
    + Pair<DateTime, DateTime> period       # 有効期間
    + ProductPurchaseUnitPriceItem[] items  # 内訳リスト
    
    + bool openPrice()                      # オープン価格か
    + float price()                         # 金額
}
```

#### プロパティ

product / 商品
: 仕入れた商品。

period / 有効期間
: この単価情報が有効な期間。FROM <= 日時 < TO。

items / 内訳リスト
: 単価の内訳のリスト。

#### 導出可能プロパティ

openPrice / オープン価格か
: 内訳のいずれかがオープン価格ならオープン価格と判断する。  
内訳の全てがオープン価格か、全てがオープン価格でないかのいずれかの状態のみ許可する。それ以外は異常な状態である。

price / 金額
: 内訳の金額の総和。オープン価格でない場合のみ有効。オープン価格の場合は算出不可能。


### ProductPurchaseUnitPriceItem / 商品仕入単価明細 モデル

商品仕入単価の明細を表す。仕入科目ごとの詳細情報を保持する。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class ProductPurchaseUnitPriceItem implements DomainModel {
    + bool openPrice             # オープン価格フラグ
    + float price                # 価格
    + AccountTitle accountTitle  # 勘定科目
    + String remarks             # 備考
}
```

#### プロパティ

openPrice / オープン価格フラグ
: オープン価格か。オープン価格の場合は価格を事前に決定できない。

price / 価格
: 価格。オープン価格でない場合のみ有効なプロパティ。

accountTitle / 勘定科目
: 勘定科目。統計や分析のために使用する想定。

remarks / 備考
: 任意の備考文字列。
