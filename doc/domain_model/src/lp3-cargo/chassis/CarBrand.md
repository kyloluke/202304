### CarBrand / 自動車ブランド モデル

自動車のブランドを表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class CarBrand implements DomainModel {
    + String name  # 名称
}
```

#### プロパティ

name / 名称
: 名称。「トヨタ」「ホンダ」「ポルシェ」「レクサス」など。
