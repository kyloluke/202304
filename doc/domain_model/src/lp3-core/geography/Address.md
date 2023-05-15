### Address / 住所 オブジェクト

住所情報を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class Address {
    + Country country                 # 国
    + String zipCode                  # ZIPコード
    + LocalizableString state         # 州
    + LocalizableString city          # 市
    + LocalizableString[3] addresses  # 住所
    + TimeZone timezone               # タイムゾーン
}
```

#### プロパティ

country / 国
: 国。

zipCode / ZIPコード
: ZIPコードまたは郵便番号。

state / 州
: 州または都道府県の名前。

city / 市
: 市の名前。

addresses / 住所
: 住所部。最大3つまで保持する。

timezone / タイムゾーン
: タイムゾーン。
