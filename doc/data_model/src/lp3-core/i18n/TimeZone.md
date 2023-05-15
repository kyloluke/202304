#### timezone 列挙値

列挙型 TimeZone を永続化するための列挙値。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum TimeZone {
    UTC = UTC                                                   # 協定世界時
    ASIA_TOKYO = Asia/Tokyo                                     # 日本標準時
    ASIA_KARACHI = Asia/Karachi                                 # パキスタン時間
    AMERICA_NEWYORK = America/New_York                          # 東部標準時
}
```

#### 値

列挙型 TimeZone の各フィールドに対応する値を定義する。