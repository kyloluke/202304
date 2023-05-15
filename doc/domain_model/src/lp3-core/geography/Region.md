### Region / 地域 モデル

地理的な地域を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class Region implements DomainModel {
    + String name  # 名称
}
```

#### プロパティ

name / 名称
: 地域の名前。「北米」「アフリカ」など。
