### ProductScheme / 商品スキーム モデル

商品（一般的なビジネス用語でのサービス）の枠組みを表す。  
商品スキームを下敷きにして各種のパラメーターを指定することで商品を作成する。  
商品スキームは一定以上の権限を持つユーザーのみが作成できる。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class ProductScheme implements DomainModel {
    + String name                                    # 名称
    + String nameForCustomers                        # 顧客向け名称
    + String description                             # 説明
    + String descriptionForCustomers                 # 顧客向け説明    
    + ProductSchemeAxis[] axes                       # 軸リスト
    + ProductSchemeConditionGroup[] conditionGroups  # 条件グループリスト
    + ExpressionParam[] conditionExpressionParams    # 条件判定式パラメーターリスト
    + ProductSchemeAmountUnit[] amountUnits          # 数量単位リスト
    + ExpressionParam[] amountExpressionParams       # 数量計算式パラメーターリスト

    + AutoBillingItemTrigger autoBillingTrigger      # 請求明細の自動登録トリガー
    + Pair<String, DataPath>[] 請求単位               # TODO 名前考える
    
    ' スコープ算出() {
    '    全ての属性のデータパスをツリー構造にまとめる
    '    if ツリーのルートが複数ある
    '        矛盾しているのでエラーとする
    '    return ツリー構造
    '}
}

ProductScheme "1" *-- "*" ProductSchemeAxis
ProductScheme "1" *-- "*" ProductSchemeConditionGroup
ProductScheme "1" *-- "*" ProductSchemeAmountUnit
ProductScheme "1" *-- "*" ExpressionParam
```

#### プロパティ

name / 名称
: 商品スキームの名前。

nameForCustomers / 顧客向け名称
: 顧客向けに商品スキームの情報を出力する際に用いる名前。見積書などに出力されることを想定している。

description / 説明
: 商品スキームの説明。

descriptionForCustomers / 顧客向け説明    
: 顧客向けに商品スキームの情報を出力する際に用いる説明。見積書などに出力されることを想定している。
特別な記法を用いることで、ヤードの名前などを埋め込める。TODO 記法の定義が必要

axes / 軸リスト
: 商品スキームの軸のリスト。

conditionGroups / 条件グループリスト
: 商品スキームから商品を作成する際に用いルことができる条件グループのリスト。

conditionExpressionParams / 条件判定式パラメーターリスト
: TODO

amountUnits / 数量単位リスト
: 商品スキームから商品を作成する際に用いることができる数量単位のリスト。

amountExpressionParams / 数量計算式パラメーターリスト
: TODO

autoBillingTrigger / 請求明細の自動登録トリガー
: 請求明細を自動登録する契機となる事象。

??? / 請求単位
: TODO 名前考える



以下まだメモ

* 画面上で「属性判定単位」と表現されている情報
  * 請求明細を自動登録するとき（なに単位かはこの時点で決まっている）→サービス一覧から、どのサービスが該当するかを絞り込む必要がある→サービスの属性の「判定単位」を使って絞り込む 
  * 属性が指す情報の範囲を表す 
  * 各属性のデータパスをマージして情報パスツリーを構成した場合に、そのもっとも根の方のノート以下のスコープが対応する

* 画面上で「請求単位」と表現されている情報
  * 属性判定単位での判定後、請求を何単位（車輌単位、コンテナ単位など）で行うかを決めるための情報
  * 条件のデータパスをマージして情報パスツリーを構成した場合に、そのもっとも根の方のノート以下のスコープが対応する


### AutoBillingItemTrigger / 請求明細自動登録トリガー 列挙型

請求明細の自動登録機能を実行するトリガーを表す。

```plantuml
enum AutoBillingItemTrigger {
    + NONE                      # なし
    + BILLING_ON_CHASSIS        # 車輌の請求登録時
    + BILLING_ON_CONTAINER_JOB  # コンテナジョブの請求登録時
    + BILLING_ON_RORO_JOB       # ROROジョブの請求登録時
}
```

#### フィールド

NONE / なし
: 自動登録は行わない。

BILLING_ON_CHASSIS / 車輌の請求登録時
: 車輛の請求登録時に実行する。

BILLING_ON_CONTAINER_JOB / コンテナジョブの請求登録時
: コンテナジョブの請求登録時に実行する。

BILLING_ON_RORO_JOB / ROROジョブの請求登録時
: ROROジョブの請求登録時に実行する。



### 以下メモ

トリガー、請求単位、データパスは全て取り扱うデータのスコープを表しているため、
もっと一元的な表現ができるのではないか。

トリガー
  データパスLV1

請求単位
  名前
  データパスLV3

データパス
  データパスFINAL


