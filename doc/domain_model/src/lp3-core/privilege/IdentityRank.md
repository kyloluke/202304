### IdentityRank / アイデンティティランク 列挙型

アイデンティティのランクを表す。ランクが高いほど権限が強い。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum IdentityRank {
    + ALUMINIUM  # アルミ
    + BLONDS     # ブロンズ
    + SILVER     # シルバー
    + GOLD       # ゴールド
    + PLATINUM   # プラチナ
    + BLACK      # ブラック
} 
```

#### フィールド

ALUMINIUM / アルミ
: 標準よりも下位のランクを表す。

BLONDS / ブロンズ
: 標準的なランクを表す。

SILVER / シルバー
: やや上位のランクを表す。

GOLD / ゴールド
: 上位のランクを表す。

PLATINUM / プラチナ
: 最上位のランクを表す。

BLACK / ブラック
: 特権的なランクを表す。
