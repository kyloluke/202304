### Organization / 組織 モデル

SYNCや荷主といった、LP3のアカウントとして扱う組織体を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class Organization implements DomainModel {
    + LocalizableString name         　　　　　     # 名称
    + String canonicalName           　　　　　     # 正式名称
    + String nameAbbr                　　　　　     # 省略名称
    + Address address                　　　　　     # 住所
    + String representativeName      　　　　　     # 代表者名
    + File logoFile                  　　　　　     # ロゴファイル
    + SystemUsage systemUsage        　　　　　     # システム利用形態
    + User[] users                   　　　　　     # ユーザーリスト
    + Office[] offices               　　　　　     # 事業所リスト
    + YardGroup[] yardGroups                   　　 # ヤードグループリスト
    // @todo：ヤードグループを営業ブロックへと修正したらこちらも変更する
    + MultiMap<Office, User> officeUsers  　　　　　# 事業所毎の所属ユーザー
    + MultiMap<YardGroup, User> yardGroupStaffs    # ヤードグループ毎の一般ユーザー
    + MultiMap<YardGroup, User> yardGroupManagers  # ヤードグループ毎の管理担当者
}
```

#### プロパティ

name / 名称
: 組織の名前。

canonicalName / 正式名称
: 正式な名前。

nameAbbr / 省略名称
: 省略した名前。

address / 住所
: 組織の代表住所。

representativeName / 代表者名
: 代表者の名前。

logoFile / ロゴファイル
: 組織のロゴ画像ファイル。

systemUsage / システム利用形態
: LP3システムの利用形態。

users / ユーザーリスト
: 組織に属するユーザーのリスト。

offices / 事業所リスト
: 組織が保持する事業所のリスト。

yards / ヤードリスト
: 組織が保持するヤードのリスト。

officeUsers / 事業所毎の所属ユーザー
: 事業所とユーザの対応情報。

yardGroupStaffs / ヤードグループ毎の一般ユーザー
: ヤードグループと一般ユーザーの対応情報

yardGroupManagers / ヤードグループ毎の管理担当者
: ヤードグループと管理担当者の対応情報
