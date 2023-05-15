### ProductSchemeAmountUnit / 商品スキーム数量単位 モデル

商品スキーム内で扱う数量単位を表す。  
例：車両1台ごとのサービス提供を表すために '/UNIT' といった数量単位を作成する。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class ProductSchemeAmountUnit implements DomainModel {
    + String name                             # 名称
    + String nameForCustomers                 # 顧客向け名称

    詳細
    + Expression expression                   # 数量計算式
    + ExpressionDataPath expressionDataPath   # 数量計算式の入力データパス
}
```

#### プロパティ

name / 名称
: 数量単位の名前。基本的には日本語になる。

nameForCustomers / 顧客向け名称
: 顧客向けの見積書や請求書に用いる名前。

expression / 数量計算式
: この数量単位を使って数量計算を行う場合の計算式。  
請求明細自動登録用のフィールド。今は気にしない TODO 書く

expressionDataPath / 数量計算式の入力データパス
: 画面上の「請求単位」。  
請求明細自動登録用のフィールド。今は気にしない TODO 書く
