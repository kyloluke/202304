### SystemUsage / システム利用形態 列挙型

LP3システムの利用形態を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum SystemUsage {
    + ADMINISTRATION  # 管理
    + MANAGEMENT      # 運営
    + OSL             # OSL利用
    + GENERAL         # 一般利用
}
```

#### フィールド

SYSTEM_ADMINISTRATION / システム管理
: システムを管理する。アバンテが該当する。

SYSTEM_MANAGEMENT / システム運営
: システムを運営する。SYNCが該当する。

OSL / OSL利用
: システムをOSL利用する。TAUなどが該当する。

GENERAL / 一般利用
: システムを一般利用する。多くの会社が該当する。
