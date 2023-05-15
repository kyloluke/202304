### ChassisPhoto / 車輌写真 モデル

車輌について撮影した写真を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class ChassisPhoto implements AttachedDocument, FileDocument {
    + Chassis chassis        # 車輌
    + ChassisPhotoType type  # 種別
    + File file              # ファイル
    + String remarks         # 備考
    + String adminRemarks    # 管理用備考
}
```

#### プロパティ

chassis / 車輌
: 撮影対象の車輌。

type / 種別
: 写真の種別。

file / ファイル
: 写真のファイル。

remarks / 備考
: 任意の備考。

adminRemarks / 管理用備考
: 任意の管理用備考。


### ChassisPhotoType / 車輌写真種別 列挙型

車輌写真の種別を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum ChassisPhotoType {
    + CARRY_IN    # 搬入写真
    + LIGHT_WORK  # 軽作業写真
    + FOR_SALE    # 販売用写真
}
```

#### フィールド

CARRY_IN / 搬入写真
: TBCS 具体的な内容を確認する。　→受け取り時点の記録用の写真。

LIGHT_WORK / 軽作業写真
: TBCS 具体的な内容を確認する　→軽作業完了時の記録用の写真。

FOR_SALE / 販売用写真
: 荷主から依頼されて撮影する写真。荷主が当該車輌を販売する際に用いる。
