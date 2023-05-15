### CarModel / 車種 モデル

車種を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class CarModel implements DomainModel {
    + LocalizableString name  # 名称
    + CarBrand brand          # ブランド
}
```

#### プロパティ

name / 名称
: 名称。「アコード」「プリウス」など。

brand / ブランド
: ブランド。
