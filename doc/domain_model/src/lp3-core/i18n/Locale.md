### Locale / ロケール 列挙型

LP3で取り扱うロケールを表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum Locale {
    + JA_JP  # ja_JP.UTF-8
    + EN_US  # en_US.ISO8859-1
}
```

#### フィールド

JA_JP / ja_JP.UTF-8
: 日本語。

EN_US / en_US.ISO8859-1
: 米国における英語。
