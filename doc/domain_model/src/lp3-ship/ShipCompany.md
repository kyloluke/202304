### ShipCompany / 船会社 モデル

船舶を所有し、貨物の運送を扱う会社を表す。  

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class ShipCompany implements DomainModel {
    + String name      # 名称
    + Address address  # 住所
    + String scacCode  # SCACコード
    + String mail      # メールアドレス
    + String remarks   # 備考
}
```

#### プロパティ

name / 名称
: 船会社の名称。

address / 住所
: 船会社の代表住所。最低限、国とタイムゾーンは設定する必要がある。

scacCode / SCACコード
: Standard Carrier Alpha Code。米国における運送会社識別コード。

mail / メールアドレス
: 船会社の連絡先メールアドレス。

remarks / 備考
: 任意の備考文章。
