### TaxClass / 課税区分 列挙型

税金の課税種別を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum TaxClass {
    + NON_TAXABLE    # 非課税
    + TAXATION       # 課税 
    + TAX_EXEMPTION  # 輸出免税  
    + UNTAXABLE      # 不課税
}
```

#### フィールド

NON_TAXABLE / 非課税
: 本来であれば課税対象となるが、税の性質を鑑みると課税の対象としてなじまないもの。

TAXATION / 課税
: 課税対象となるもの。

TAX_EXEMPTION / 輸出免税
: 海外に向けて商品を販売するために課税対象とならないもの。

UNTAXABLE / 不課税
: 非課税、課税、輸出免税のいずれにも当てはまらないもの。
