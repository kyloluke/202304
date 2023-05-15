### Honorific / 敬称 列挙型

人名や組織名に付与する敬称を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum Honorific {
    + SIR   # Sir
    + ESQ   # Esq.
    + DEAR  # Dear
}
```

#### フィールド

SIR / Sir
: 名前が分からない男性に使う敬称。

ESQ / Esq.
: 性別が不明な相手に使う敬称。姓またはフルネームの後に付ける必要がある。 
日本語では「様」が相当する。

DEAR / Dear
: 部署などに対しても使える敬称。日本語では「御中」が相当する。 
