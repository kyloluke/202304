### ChassisShareableLink / 車輌共有リンク モデル

車輌の一部情報についての共有リンクを表す。
主に、LP3を使用していないユーザーに対して車輌の一部情報を共有するために用いる。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class ChassisShareableLink implements DomainModel {
    Chassis chassis                    # 対象の車輌
    EnumSet<ChassisShareScope> scopes  # スコープセット
    DateTime expiredAt                 # 有効期限
    String password                    # パスワード
    URL url                            # URL
}
```

#### プロパティ

chassis / 車輌
: 対象の車輌。

scopes / スコープセット
: 共有する情報のスコープのセット。

expiredAt / 有効期限
: 有効期限。この期限以降はアクセスを拒否する。

password / パスワード
: アクセス用のパスワード。bcryptアルゴリズムによってハッシュ化した文字列を保持する。

url / URL
: アクセス用のURL。


### ChassisShareableScope / 車輌共有スコープ 列挙型

共有リンクによって共有する車輌情報の範囲を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum ChassisShareScope {
    + BASIC_INFO    # 基本情報
    + DOCUMENTS     # 書類
    + PHOTOS        # 写真
}
```

#### フィールド

BASIC_INFO / 基本情報
: 車台番号など、車輌が持つ基本的な情報。 TBCS 厳密な範囲を決める

DOCUMENTS / 車輌書類
: 車輌に添付されている書類。

PHOTOS / 写真
: 車輌写真。
