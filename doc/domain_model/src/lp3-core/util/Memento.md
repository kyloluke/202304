### Memento / 記録 インターフェース

ある時点のドメインモデルの状態の記録を表す。  
一般的なMementoパターンを実装するためのユーティリティインターフェース。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

interface Memento<M extends DomainModel> {
    + {abstract} M model  # モデル
}
```

#### ジェネリクスパラメーター

M
: モデルの型。

#### 抽象プロパティ

model / モデル
: 記録したドメインモデル。記録した時点の状態を維持している。
