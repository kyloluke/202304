### ProductSchemeAxis / 商品スキーム軸 モデル

商品スキームから商品を作成する際に、バリエーションを持たせることがある。  
そのバリエーションの軸となる要素を表す。  
例: ある商品スキームにおいて、ヤードごとに金額が異なる  

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class ProductSchemeAxis implements DomainModel {
    + String name                  # 名称
    + ProductSchemeAxisType type   # 種別
    + bool required                # 必須フラグ
    + bool openToCustomers         # 顧客開示フラグ

    + ExpressionDataPath autoBillingDataPath  # 請求明細の自動登録用データパス
}
```

#### プロパティ

name / 名称
: 軸の名前。

type / 種別
: 軸の種別。元となったシステムでは任意の軸を定義できたが、事前に定義された種別から選択する方式とする。

required / 必須フラグ
: 商品を作成する際にこの軸を必ず用いる必要があるか。

openToCustomers / 顧客開示フラグ
: この軸の情報を顧客に開示するか。見積明細に掲載することを想定している。

autoBillingDataPath / 請求明細の自動登録用データパス
: この属性がLP3ドメインのどのデータと対応するかの情報。請求明細を自動登録しないケースではnull。


### ProductSchemeAxisType / 商品スキーム軸種別 列挙型

商品スキーム軸の種別を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum ProductSchemeAxisType {
    + YARD          # ヤード
    + POL           # 積港
    + POD           # 揚港
    + SHIP_COMPANY  # 船会社
    etc... TBC 他の種別を確認する。 単純にモデルの型情報で代替できる可能性あり。
}
```
