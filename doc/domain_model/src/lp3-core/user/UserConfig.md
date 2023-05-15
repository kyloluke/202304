### UserConfig / ユーザー設定 モデル

ユーザーに対するシステム的な設定情報を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospacedskinparam defaultFontName Monospaced

class UserConfig implements DomainModel {
    + User user            # ユーザー
    + UserConfigType type  # 種別
    + String valuesJson    # 値
}
```

#### プロパティ

user / ユーザー
: 対象のユーザー。

type / 種別
: 設定の種別。

valuesJson / 値
: JSON形式の設定値。TODO 種別と共に内容を展開し、論理情報としてはベタ持ちとする


### UserConfigType / ユーザー設定種別 列挙型

ユーザー設定の種別を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum UserConfigType {
    + FAVORITE_SEARCH  # お気に入り検索条件
    + YARD_ORDINAL     # ヤードの順序
}
```

なお、LP2でuser_extrasに保持していた以下の設定は、LP3ではアイデンティティランクによる権限制御に統廃合される。

* 対象のユーザーが請求の入金取り消しを行える権限を持っているかの設定
* 対象のユーザーが請求登録スキップを行える権限を持っているかの設定
* 対象のユーザーが、他のユーザーに対して、請求登録スキップを行える権限を付与できる権限を持っているかの設定

#### フィールド

FAVORITE_SEARCH / お気に入り検索条件
: お気に入り検索の条件。

YARD_ORDINAL / ヤードの順序
: ヤードの表示順序。
