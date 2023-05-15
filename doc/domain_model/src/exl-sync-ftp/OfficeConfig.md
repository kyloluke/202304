### OfficeConfig / 事業所設定 モデル

事業所に対するシステム的な設定情報を表す。

```plantuml
hide empty members

class OfficeConfig implements DomainModel {
    + Office office          # 事業所
    + OfficeConfigType type  # 種別
    + String valuesJson      # 値
}
```

#### プロパティ

office / 事業所
: 対象の事業所。

type / 種別
: 設定情報の種別。

valuesJson / 値
: JSON形式の設定値。TODO 種別と共に内容を展開し、論理情報としてはベタ持ちとする


### OfficeCofigType / 事業所設定種別 列挙型

事業所設定の種別を表す。

```plantuml
hide empty members

enum OfficeConfigType {
    + CHASSIS_PHOTO      # 車輌写真 
    + CONTAINER_PHOTOv1  # コンテナ写真v1
    + CONTAINER_PHOTOv2  # コンテナ写真v2
}
```

#### フィールド

CHASSIS_PHOTO / 車輌写真
: 車輌写真の設定。

CONTAINER_PHOTOv1 / コンテナ写真v1
: コンテナ写真の設定（旧方式）。

CONTAINER_PHOTOv2 / コンテナ写真v2
: コンテナ写真の設定（新方式）。
