### AttachedDocument / 添付文書 インターフェース

ドメインモデルに対して添付する文書を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

interface AttachedDocument extends Document {
    + {abstract} DomainModel[] models  # ドメインモデルリスト
}
```

#### 抽象プロパティ

models / ドメインモデルリスト
: 文書の添付対象となるドメインモデルのリスト。  
1つの文書を複数のドメインモデルに添付する関係性があるためリストにしている。
