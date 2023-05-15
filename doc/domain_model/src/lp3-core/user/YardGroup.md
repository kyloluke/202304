### YardGroup / ヤードグループ モデル

複数のヤードをまとめたグループを表す。  
地理的に近接した複数ヤードを 1 つのヤードとして管理するために用いる。

// @todo：本ドメインモデルを以下の通りに変更する。
// 名称：SalesBlock（日本名：営業ブロック）
// なお、すでにYardGroupとして作成されているため、コード側も修正が必要。（5/9：中嶋）

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class YardGroup implements DomainModel {
    + String name                　　                # 名称
    + Yard[] yards               　　                # ヤードリスト
    + Yard representativeYard    　　                # 代表ヤード
    + Port defaultPol                                # デフォルト積港
    + RegularHoliday[] regularHoliday      　 　　   # 定休日リスト
    + Date[] irregularHolidays   　　                # 臨時休日リスト
    + Date[] irregularBusinessDays                   # 臨時営業日リスト
    + Pair<Time, Time> receptionTimeWeekdays         # 平日搬入受付時刻
    + Pair<Time, Time> receptionTimeSaturday         # 土曜日搬入受付時刻
    + Pair<Time, Time> restTime                      # 搬入受付休憩時刻
    + Map<BusinessType, Office[]> defaultJobOffices  # デフォルト作業事業所
}
```

#### プロパティ

name / 名称
: ヤードグループの名前。

yards / ヤードリスト
: ヤードグループに含まれるヤードのリスト。

representativeYard / 代表ヤード
: 含まれるヤードのうち、代表となるヤード。このヤードの住所をヤードグループの住所として扱う。

defaultPol / デフォルト積港
: ヤードから輸出する貨物のデフォルトの積港。

regularHoliday / 搬入受付休日
: 搬入受付の定休日のリスト。有効期限の開始日/終了日と、月～日曜日と祝日のフラグが入る。

irregularHolodays / 臨時休日リスト
: 搬入受付の臨時休日のリスト。

irregularBusinessDays / 臨時営業日リスト
: 搬入受付の臨時営業日のリスト。

receptionTimeWeekdays / 平日搬入受付時刻
: 平日に搬入を受け付ける時刻。

receptionTimeSaturday / 土曜日搬入受付時刻
: 土曜日に搬入を受け付ける時刻。

restTime / 搬入受付休憩時刻
: 搬入受付をしない時刻（休憩時間）

defaultJobOffices / デフォルト作業事業所
: ヤードからの輸出作業における、業態ごとのデフォルトの事業所。(ヤードグループ単位)
この事業所に各種作業を依頼する。

### RegularHoliday / 定休日

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class RegularHoliday implements DomainModel {
    + Date startDate               　　                # 有効期限開始日
    + Date endDate               　　                  # 有効期限終了日
    + Map<String Integer>[] holidaysFlgList            # 曜日フラグリスト
    + Integer nationalHolidaysFlg             　　     # 祝日使用フラグ
}
```

<br>
※ 定休日はヤードグループでしか使用しないため、ヤードグループと同じ場所に記載。

#### プロパティ

startDate / 有効期限開始日
: 定休日の有効期限開始日。

endDate / 有効期限終了日
: 定休日の有効期限終了日。

holidaysFlgList / 曜日フラグリスト
: 月～日曜日の内、休日と設定している曜日のフラグリスト。

nationalHolidaysFlg / 祝日使用フラグ
: 祝日を定休日として使用するかどうか判定するフラグ
