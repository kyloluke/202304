### tax_class 列挙値

列挙型 TaxClass を永続化するための列挙値。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum tax_class {
    NON_TAXABLE = 1    # 非課税
    TAXATION = 2       # 課税 
    TAX_EXEMPTION = 3  # 輸出免税  
    UNTAXABLE = 4      # 不課税
}
```

#### 値

列挙型 TaxClass の各フィールドに対応する値を定義する。
