### Quotation / 見積 モデル

商品の見積もりを表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class Quotation implements DomainModel {
    + String number                      # 見積番号
    + User personInCharge                # 見積担当者
    + ShipperOffice|String shipper       # 荷主
    + User|String shipperPersonInCharge  # 荷主側担当者
    + Honorific                          # 敬称
    + String title                       # 件名
    + Pair<DateTime, DateTime> period    # 有効期間
    + QuotationItem[] items              # 明細リスト
    + String remarks                     # 備考
    + String adminRemarks                # 管理用備考

    + QuotationStatus status             # ステータス
}
```

#### プロパティ

number / 見積番号
: 見積を管理するための番号。

personInCharge / 見積担当者
: 見積の担当者。

shipper / 荷主
: 見積を提出する相手の荷主。新規取引など、登録されていない荷主に対して見積を提出するケースがあるため文字列による設定も可能にする。

shipperPersonInCharge / 荷主側担当者
: 荷主側の担当者。文字列による設定も可能。

honorific / 敬称
: 荷主側の担当者につける敬称。

title / 件名
: 見積の件名。

period / 有効期間
: 見積が有効な期間。有効期間外の場合は、この見積から請求を立てることはできない。

items / 明細リスト
: 見積明細のリスト。

remarks / 備考
: 任意の備考文章。

adminRemarks / 管理用備考
: 管理用の任意の備考文章。

status / ステータス
: 見積の状態。


### QuotationStatus / 見積ステータス 列挙型

見積の状態を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum QuotationStatus {
    + DRAFT    # 下書き
    + ISSUED   # 発行済み
    + REVOKED  # 破棄
}
```

DRAFT / 下書き
: 見積が下書きの状態。

ISSUED / 発行済み
: 見積を発行した状態。

REVOKED / 破棄
: 発行した見積が拒否された場合などに使用する状態。ボツ扱い。
