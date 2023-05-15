### ProductSchemeConditionGroup / 商品スキーム条件グループ モデル

関連する商品スキーム条件のまとまりを表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class ProductSchemeConditionGroup implements DomainModel {
    + String name                          # 名称
    + ProductSchemeCondition[] conditions  # 条件リスト

    以下は自動請求明細登録用の情報
    + ExpressionDataPath expressionDataPath  # 条件判定式の入力データパス    
}
ProductSchemeConditionGroup "1" *-- "n" ProductSchemeCondition
```

#### プロパティ

name / 名称
: 条件グループの名前。

conditions / 条件リスト
: このグループに含む条件のリスト。先頭の条件ほど判定時の優先順位が高い。


### ProductSchemeCondition / 商品スキーム条件 モデル

商品スキームが持つ条件を表す。  
TODO 例を書く。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class ProductSchemeCondition implements DomainModel {
    + String name                             # 名称
    
    以下は自動請求明細登録用の情報
    + Expression expression                   # 条件判定式
}
ProductSchemeCondition "1" *-- "1" Expression
ProductSchemeCondition "1" *-- "1" ExpressionDataPath
```

#### プロパティ

name / 名称
: 条件の名前。

expression / 条件判定式
: 自動請求明細登録用の情報。TODO 詳細を書く
