### History / 履歴 インターフェース

ドメインモデルの履歴情報を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

interface History<M extends DomainModel, C extends DomainModel> extends DomainModel {
    + {abstract} M model              # モデル
    + {abstract} C cause              # 原因
    + {abstract} DateTime datetime    # 日時
    + {abstract} String remarks       # 備考
    + {abstract} String adminRemarks  # 管理用備考
}
```

#### 抽象プロパティ

model / モデル
: 履歴をとるドメインモデル。

cause / 原因
: 履歴をとる原因となったドメインモデル。例えば、ユーザーによる変更履歴を取るケースにおけるユーザーモデルが該当する。

datetime / 日時
: 履歴をとった日時。

remarks / 備考
: 任意の備考文章。

adminRemarks / 管理用備考
: 管理用に用いる任意の備考文章。


### AbstractHistory / 抽象履歴 モデル

履歴モデルを実装する際の基盤として利用できるユーティリティモデル。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

interface "History<M, C>" as History

abstract class AbstractHistory<M extends DomainModel, C extends DomainModel> implements History {
    + M model              # モデル
    + C cause              # 原因
    + DateTime datetime    # 日時
    + String remarks       # 備考
    + String adminRemarks  # 管理用備考
}
```

#### ジェネリクスパラメーター

スーパーインターフェースのパラメーターを継承する。

#### プロパティ

スーパーインターフェースのプロパティを実装する。
