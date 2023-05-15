### users / ユーザ モデル

ドメインモデル User を永続化するためのデータモデル。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

entity user extends data_model {
    name : string                                                        # ユーザ名
    email : string                                                       # メールアドレス
    email_verified_at : string(nullable)                                 # メールアドレス変更日時
    // @todo：既存のusersテーブルでは、emailが1つしか持てないようになっているので、実装時に確認する（5/9：中嶋）
    password : string                                                    # パスワード
    remember_token : string                                              # パスワードリセット用トークン
    logo_file_uri : string(nullable)                                     # ロゴファイル_Uri
    logo_file_name : string(nullable)                                    # ロゴファイル_名称
    logo_file_mime : string(nullable)                                    # ロゴファイル_MIMEタイプ
    remarks : string(nullable)                                           # 備考
    organization_id : bigInteger(nullable, foreign_key=organizations.id) # 所属組織Id
    office_id :  bigInteger(nullable, foreign_key=offices.id) 　　　　　　# 所属事業所Id(ドメインモデル：Organizationにて使用)
}
```

```plantuml
hide empty members
skinparam defaultFontName Monospaced

entity user_mails extends data_model {
    user_id : integer(foreign key = users.id)            # ユーザId
    email : string()                                      # メールアドレス
    email_verified_at : string(nullable)                 # メールアドレス変更日時
}
```

```plantuml
hide empty members
skinparam defaultFontName Monospaced

entity user_telephones extends data_model {
    user_id : integer(foreign key = users.id)            # ユーザId
    telephone : string()                                 # 電話番号
}
```

## テーブル

users テーブルに格納する。<br>

#### カラム

ドメインモデルの各プロパティに対応するカラムを保持する。

### user_status 列挙値

列挙型 UserStatus を永続化するための列挙値。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum UserStatus {
    ENABLE = 1   # 有効
    DISABLE = 2  # 無効
}
```

#### 値

列挙型 UserStatus の各フィールドに対応する値を定義する。
