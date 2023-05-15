### UserLoginSession / ユーザーログインセッション モデル

ユーザーのログインセッション情報を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class UserLoginSession implements DomainModel {
    + User user                # ユーザー
    + UserLoginMethod method   # ログイン方法    
    + DateTime loginDatetime   # ログイン日時
    + String ipAddress         # IPアドレス
    + String userAgent         # ユーザーエージェント
    + String apiToken          # APIトークン
    + DateTime logoutDatetime  # ログアウト日時
}
```

#### プロパティ

スーパークラスのプロパティを継承する。

user / ユーザー
: ログインしたユーザー。

method / ログイン方法
: ログインした方法。

loginDatetime / ログイン日時
: ログインした日時。

ipAddress / IPアドレス
: アクセス元のIPアドレス。

userAgent / ユーザーエージェント
: アクセス元のユーザーエージェント。

apiToken / APIトークン
: 使用されたAPIトークン。

logoutDatetime / ログアウト日時
: ログアウトした日時。


### UserLoginMethod / ユーザーログイン方法 列挙型

ユーザーのログイン方法を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum UserLoginMethod {
  + SELF_LOGIN   # 本人ログイン
  + AGENT_LOGIN  # 代理ログイン
}
```

#### フィールド

SELF_LOGIN / 本人ログイン
: ユーザー自身が通常のログイン操作を用いてログインした。

AGENT_LOGIN / 代理ログイン
: 他のユーザーが特権での代理ログイン操作を用いてログインした。
