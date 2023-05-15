### system_usage 列挙値

列挙型 system_usage を永続化するための列挙値。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum SystemUsage {
    ADMINISTRATION = 1  # 管理
    MANAGEMENT = 2      # 運営
    OSL = 3             # OSL利用
    GENERAL = 4         # 一般利用
}
```

#### 値

列挙型 SystemUsage の各フィールドに対応する値を定義する。
