### organization / 組織 モデル

ドメインモデル Organization を永続化するためのデータモデル。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

entity organizations extends data_model {
    name_jp : string()                                                   # 名称_日本語
    name_en : string()                                                   # 名称_英語
    canonical_name : string(nullable)                                    # 正式名称
    name_abbr : string(nullable)                                         # 省略名称
    representative_name : string(nullable)                               # 代表者名
    system_usage : enum(system_usage)                                    # システム利用形態
    use_logo_file_id : integer(foreign key = organization_logo_files.id) # 組織用ロゴファイルId
}
```

```plantuml
hide empty members
skinparam defaultFontName Monospaced

entity organization_logo_files extends yard_groups {
    logo_file_uri : string()                                              # ロゴファイル_URI
    logo_file_name : string(nullable)                                     # ロゴファイル_ファイル名
    logo_file_mime : string(nullable)                                     # ロゴファイル_MIMEタイプ
}
```

```plantuml
hide empty members
skinparam defaultFontName Monospaced

entity yard_group_staff extends yard_groups {
    ※多対多の中間テーブルなので省略

}
```

```plantuml
hide empty members
skinparam defaultFontName Monospaced

entity yard_group_manager extends yard_groups {
    ※多対多の中間テーブルなので省略

}
```

## テーブル

organizations テーブルに格納する。<br>
ロゴファイルに関しては、organizations に use_logo_file_id を持たせ、organization_logo_files と 多 対 1 のリレーションを組むことによって保持する。
ユーザリストに関しては、users に organization_id を持たせ、organizations と 1 対 多 のリレーションを組むことによって保持する。<br>
事業所リストに関しては、offices に organization_id を持たせ、organizations と 1 対 多 のリレーションを組むことによって保持する。<br>
ヤードグループリストに関しては、yardGroups に organization_id を持たせ、organizations と 1 対 多 のリレーションを組むことによって保持する。<br>
事業所毎の所属ユーザーに関しては、users に office_id を持たせ、offices と 1 対 多 のリレーションを組むことによって保持する。<br>
ヤードグループ毎の一般ユーザーに関しては、users テーブルと yardGroups テーブルの中間テーブルを作成して保持する。（ヤードグループの管理担当者とは別のテーブルで保持する）<br>
ヤードグループ毎の管理担当者に関しては、users テーブルと yardGroups テーブルの中間テーブルを作成して保持する。（ヤードグループの一般ユーザーとは別のテーブルで保持する）<br>

※ ドメインモデルにある「住所」は現状使用予定がないため、データモデルには記述しておりません。(5/8: 中嶋)

#### カラム

ドメインモデルの各プロパティに対応するカラムを保持する。
