### BillingUpdateHistory / 請求変更履歴 モデル

請求の変更履歴を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class "AbstractUpdateHistory<Billing, User, JsonMemento<Billing>>" as AbstractUpdateHistory

class BillingUpdateHistory extends AbstractUpdateHistory {
}
```

#### プロパティ

スーパークラスのプロパティを継承する。
