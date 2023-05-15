### ExpressionParam / 計算式パラメータ モデル

計算式が持つパラメーターを表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class ExpressionParam implements DomainModel {
    + String name                  # 名称
    + String displayName           # 表示名
    + ExpressionDataType dataType  # データ型
}
```

#### プロパティ

name / 名称
: パラメーターの名前。

displayName / 表示名
: パラメーター対人用に表示する際の名前。

dataType / データ型
: パラメーターのデータ型。
