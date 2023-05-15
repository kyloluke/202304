### CargoActivity / 貨物アクティビティ インターフェース

貨物にまつわる活動を表す。  
過去の活動の他に未来の活動を表すこともでき、その場合は予定や依頼を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

interface CargoActivity<M extends Cargo> implements DomainModel {
    + M model              # モデル
    + bool prospect        # 予定フラグ
    + DateTime actAt       # 活動日時
    + User author          # 作成者
    + DateTime authAt      # 作成日時
    + String remarks       # 備考
    + String adminRemarks  # 管理用備考
    + int groupingValue    # グルーピング値
}
```

#### 抽象プロパティ

model / モデル
: アクティビティの主体となるまたは対象となる貨物。

prospect / 予定フラグ
: アクティビティが予定や依頼を表すか。falseなら実績を表す。

actAt / 活動日時
: アクティビティが発生した・発生する日時。

author / 作成者
: アクティビティを登録したアクター。システムがアクターである場合はシステムユーザーを格納する。

authAt / 作成日時
: アクティビティを登録した日時。

remarks / 備考
: 任意の備考文章。

adminRemarks / 管理用備考
: 管理用の任意の備考文章。

groupingValue / グルーピング値
: 複数のアクティビティをグルーピングするための値。この値が同一の活動は同じグループに属する。システムによって発番する。



### AbstractCargoActivity / 抽象貨物アクティビティ モデル

貨物アクティビティモデルを実装する際の基盤として利用できるユーティリティモデル。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

interface "CargoActivity<M, C>" as CargoActivity

abstract class AbstractCargoActivity<M extends Cargo> implements CargoActivity {
    + M model              # モデル
    + bool prospect        # 予定フラグ
    + DateTime actAt       # 活動日時
    + User author          # 作成者
    + DateTime authAt      # 作成日時
    + String remarks       # 備考
    + String adminRemarks  # 管理用備考
    + int groupingValue    # グルーピング値
}
```

#### ジェネリクスパラメーター

スーパーインターフェースのパラメーターを継承する。

#### プロパティ

スーパーインターフェースのプロパティを実装する。
