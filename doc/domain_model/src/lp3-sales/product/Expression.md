### Expression / 計算式 モデル

商品に関する条件判定や計算を行う計算式を表す。  
Excelにおけるマクロのような概念で、簡易的な言語を用いて条件判定式や数量計算式を記述する。  

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class Expression implements DomainModel {
    + String code  # ソースコード文字列
}
```

TBC. 計算式の簡易言語仕様を決める必要がある

#### プロパティ

code / ソースコード
: 式のソースコード。
