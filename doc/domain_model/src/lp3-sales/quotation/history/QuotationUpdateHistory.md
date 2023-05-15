### QuotationUpdateHistory / 見積変更履歴 モデル

見積もりの変更履歴を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class "AbstractUpdateHistory<Quotation, User, JsonMemento<Quotation>>" as AbstractUpdateHistory

class QuotationUpdateHistory extends AbstractUpdateHistory {
}
```

#### プロパティ

スーパークラスのプロパティを継承する。
