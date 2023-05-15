### TimeZone / タイムゾーン 列挙型

地政的なタイムゾーンを表す。
IANAが管理しているタイムゾーンに従う。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum TimeZone {
    + UTC         # UTC
    + ASIA_TOKYO  # Asia/Tokyo
    + ...IANA定義のタイムゾーン...
}
```

#### フィールド

UTC / UTC
: 協定世界時。

ASIA_TOKYO / "Asia/Tokyo"
: 東京(UTC+09:00)。

以降のフィールドも同様にIANA定義のタイムゾーンに従う。
