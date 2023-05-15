### data_model データモデル

ドメインモデル DomainModel を永続化するための抽象データモデル。  
実体としてのテーブルは作成しない。  
各ドメインモデルに対応するデータモデルを定義する際に、このデータモデルを拡張することで重複記述を避ける。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

entity domain_model {
    id : id                # ID
    created_at : timestamp # 作成日時
    created_user_id : id   # 作成ユーザー
    updated_at : timestamp # 更新日時
    updated_user_id : id   # 更新ユーザー
    deleted_at : timestamp # 削除日時
    deleted_user_id : id   # 削除ユーザー
}
```

#### カラム

ドメインモデル DomainModel の id プロパティに対応したカラムを保持する。  
それに加えて以下のカラムを保持する。

created_at / 作成日時
: データを作成した日時。

created_user_id / 作成ユーザー
: データを作成したユーザー。

updated_at / 更新日時
: データを更新した日時。

updated_user_id / 更新ユーザー
: データを更新したユーザー。

deleted_at / 削除日時
: データを削除した日時。

deleted_user_id / 削除ユーザー
: データを削除したユーザー。
