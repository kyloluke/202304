### UpdateHistory / 更新履歴 インターフェース

ドメインモデルの更新履歴情報を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

interface "History<M, C>" as History

interface UpdateHistory<M extends DomainModel, C extends DomainModel> extends History {
    + {abstract} Memento<M> before  # 変更前モデル記録
    + {abstract} Memento<M> after   # 変更後モデル記録
}
```

#### ジェネリクスパラメーター

スーパーインターフェースのパラメーターを継承する。

#### 抽象プロパティ

スーパーインターフェースのプロパティを継承する。それに加えて以下のプロパティを定義する。

before / 変更前モデル記録
: 変更前のモデルの状態を記録したオブジェクト。  
実装としてはJSONやバイト列へのシンプルなシリアライズや、プロパティ変更をリッスンして差分のみを保存する仕組みなどが考えられる。

after / 変更後モデル記録
: 変更後のモデルの状態を記録したオブジェクト。


### AbstractUpdateHistory / 抽象更新履歴 モデル

更新履歴モデルを実装する際の基盤として利用できるユーティリティモデル。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

interface "UpdateHistory<M, C>" as UpdateHistory

abstract class AbstractUpdateHistory<M extends DomainModel, C extends DomainModel, MM extends Memento<M>> implements UpdateHistory {
    + M model              # モデル
    + C cause              # 原因
    + DateTime datetime    # 日時
    + String remarks       # 備考
    + String adminRemarks  # 管理用備考
    + MM before            # 変更前モデル記録
    + MM after             # 変更後モデル記録
}
```

#### ジェネリクスパラメーター

スーパーインターフェースのパラメーターを継承する。それに加えて以下のパラメーターを定義する。

MM
: モデル記録の型。

#### プロパティ

スーパーインターフェースのプロパティを実装する。
