### Job / ジョブ モデル

貨物を船積みする作業を表す。

```plantuml
hide empty members

abstract class Job implements DomainModel {

    + Port pol                    # 積港
    + Port pod                    # 揚港
    + Destination fd              # 最終仕向地
    + ShipSchedule shipSchedule   # 本船スケジュール
    + User userInCharge           # 担当ユーザー

    + Yard yard                   # 実施ヤード
    + DateTime scheduledDatetime  # 実施予定日時
    + bool finalized              # 実施確定フラグ
    + DateTime finalizedDatetime  # 実施確定日時
    + int actualTimeInMinutes     # 実施実績時間[分]

    + bool skipBilling            # 請求スキップフラグ
    + BLType blType               # BLタイプ
    + bool noClaim                # ノークレームフラグ
    + FreightPaymentType freightPaymentType # フレート費用支払い種別 TBCS 着払いでFREIGHT請求することはあるのか？→運賃自体がCOLLECTでも、その他費用が発生するケースがある
    + bool freightBilling         # フレート費用請求フラグ


    # TODO コンテナジョブに分離する
    + int schedulingPriority      # スケジュール優先度
    + String combineTaskNumber    # コンテナJOBで複数SHIPPERの場合に発行しているジョブ番号。通常、ジョブ番号はvanning_job側に記録されている
    + String containerNumber       # コンテナ番号
    + ContainerSize containerSize            # コンテナサイズ
    + ContainerType containerType         # コンテナ種別
}
```


LP2での構造

job(コンテナ作業1つを表す) - vanning_job x n(荷主ごとに１つのvanning_jobができる) - chassis
job(RORO作業１つを表す) - roro_job x 1（必ず１つ） - chassis

#### プロパティ

TODO



### コンテナサイズ 列挙型

コンテナのサイズを表す。

```plantuml
hide empty members

enum ContainerSize {
    + FT12    # 12フィート
    + FT20    # 20フィート
    + FT20HC  # 20フィートハイキューブ
    + FT40    # 40フィート
    + FT40HC  # 40フィートハイキューブ
}
```

### コンテナ種別 列挙型

コンテナの種別を表す。

```plantuml
hide empty members

enum ContainerType {
    + DRY        # ドライコンテナ
    + REEFER     # リーファーコンテナ
    + OPEN_TOP   # オープントップコンテナ
    + FLAT_RACK  # フラットラックコンテナ
}
```

### BL種別 列挙型

BLの種別を表す。

```plantuml
hide empty members

enum BLType {
    + ORIGINAL            # オリジナルBL
    + ORIGINAL_SURRENDER  # オリジナルBL、サレンダードBL予定
    + WAYBILL             # Waybill
}
```

### フレート支払い種別 列挙型

フレート費用の支払い種別を表す。

```plantuml
hide empty members

enum FreightPaymentType {
    + PREPAID  # 発払い
    + COLLECT  # 着払い
}
```

#### プロパティ

TODO
