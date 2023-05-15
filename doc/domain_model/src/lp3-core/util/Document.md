### Document / 文書 インターフェース

証明書、報告書、契約書、写真など文書として扱えるものを表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

interface Document extends DomainModel {
    + {abstract} String[] types       # 文書種別リスト
    + {abstract} String remarks       # 備考
    + {abstract} String adminRemarks  # 管理用備考
}
```

#### 抽象プロパティ

types / 文書種別リスト
: 文書種別のリスト。複数の文書種別を兼ねる文書があるためリストで保持する。

remarks / 備考
: 任意の備考文章。

adminRemarks / 管理用備考
: 管理用に用いる任意の備考文章。
