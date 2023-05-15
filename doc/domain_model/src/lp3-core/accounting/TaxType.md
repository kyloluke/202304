### TaxType / 税種別 列挙型

税の種別を表す。  
現時点では消費税のみを定義している。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum TaxType {
    + CONSUMPTION  # 消費税
}
```

#### フィールド

CONSUMPTION / 消費税
: 消費税。
