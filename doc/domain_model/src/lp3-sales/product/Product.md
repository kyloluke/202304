### Product / 商品 モデル

商品（一般的なビジネス用語におけるサービス）を表す。  
Serviceという単語がプログラム上衝突しやすいため、Productと表現している。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class Product implements DomainModel {
    + String number                               # 商品番号
    + String remarks                              # 備考
    + ProductScheme scheme                        # 商品スキーム
    + String ownName                              # 独自名称
    + String ownNameForCustomers                  # 顧客向け独自名称
    + Map<ProductSchemeAxis, Object> axisValues   # 軸=>値のマップ
    + ProductSchemeCondition selectedCondition    # 選択した条件
    + ProductSchemeAmountUnit selectedAmountUnit  # 選択した数量単位
    + Currency currency                           # 通貨
    + bool available                              # 利用可能フラグ

    以下TODO
    + Map<ExpressionParam, Object> conditionExpressionParamDefaults  # 条件判定式パラメーターデフォルト値
    + Map<ExpressionParam, Object> amountExpressionParamDefaults     # 数量判定式パラメーターデフォルト値
}

ProductPurchaseUnitPrice o-- Product
```

#### プロパティ

number / 商品番号
: 商品を管理するための番号。

remarks / 備考
: 商品を管理するための備考。

scheme / スキーム:
: この商品の元となる商品スキーム。

ownName / 独自名称
: この商品独自の名称。nullの場合は商品スキームの名前がこの商品の名前となる。

ownNameForCustomers / 顧客向け独自名称 
: この商品独自の顧客向け名称。nullの場合は商品スキームの顧客向け名称がこの商品の顧客向け名称となる。

axisValues / 軸の値
: 商品スキームのどの軸を選び、どのような値を選択したかを指す。

selectedCondition / 選択した条件
: 商品スキームの条件グループリストに含まれる条件のどれを選択したかを指す。

selectedAmountUnit / 選択した数量単位
: 商品スキームの数量単位のどれを選択したかを指す。

currency / 通貨
: この商品を販売する際の通貨。

available / 利用可能フラグ
: true の場合はこの商品の見積を作成することができる。falseの場合は見積を作成できない。

以下TODO

条件判定式パラメーターデフォルト値
: {条件判定式パラメーター=>値}[] 商品スキームのどの条件判定式パラメーターに、どんなデフォルト値を当てはめたか

数量判定式パラメーターデフォルト値
: {数量計算式パラメーター=>値}[] 商品スキームのどの数量計算式パラメーターに、どんなデフォルト値を当てはめたか
