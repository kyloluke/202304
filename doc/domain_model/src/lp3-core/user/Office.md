### Office / 事業所 モデル

組織の事業所を表す。１つの組織には複数の事業所が存在し得る。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class Office implements DomainModel {
    + LocalizableString name                     # 名称
    + Address address                            # 住所
    + EnumSet<BusinessType> businessTypes        # 業態セット
    + String[] mails                             # メールアドレスリスト
    + String[] telephones                        # 電話番号リスト
    + String[] faxes                             # FAX番号リスト
    + String remarks                             # 備考
    + OfficeStatus status                        # ステータス
    + Map<Notification, String[]> notifications  # 通知設定
}
```

#### プロパティ

name / 名称
: 事業所の名称。

businessTypes / 業態セット
: 事業所の業態のセット。複数の業態を兼ねるケースが存在する。

mails / メールアドレスリスト
: 事業所の連絡先メールアドレスのリスト。

telephones / 電話番号リスト
: 事業所の連絡先電話番号のリスト。

faxes / FAX 番号リスト
: 事業所の連絡先 FAX 番号のリスト。

remarks / 備考
: 任意の備考文章。

status / ステータス
: 事業所のアカウント状態。

notifications / 通知設定
: 通知種別文字列=>通知先メールアドレスリストの対応情報。  
通知種別にはコンテナ写真、DR、SO、ED などがある。汎用的なプロパティにするために通知種別を文字列にしている。

### OfficeStatus / 事業所ステータス 列挙型

事業所のアカウント状態を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum OfficeStatus {
  + ENABLE   # 有効
  + DISABLE  # 無効
}
```

#### フィールド

ENABLE / 有効
: 事業所アカウントが有効な状態。

DISABLE / 無効
: 事業所アカウントが無効な状態。TODO できなくなることを洗い出す

### Notification / 通知設定 列挙型

事業所の通知設定を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum Notification {
  + CONTAINER_PHOTO    # コンテナ写真
  + DOCK_RECEIPT       # DR
  + SHIPPING_ORDER     # SO
  + EXPORT_DECLARATION # ED
}
```

#### フィールド

CONTAINER_PHOTO / コンテナ写真
: コンテナ写真を通知する設定

DOCK_RECEIPT / DR
: DR を通知する設定

SHIPPING_ORDER / SO
: SO を通知する設定

EXPORT_DECLARATION / ED
: ED を通知する設定
