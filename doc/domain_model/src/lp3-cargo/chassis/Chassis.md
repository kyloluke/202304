### Chassis / 車輌 モデル

1台の車輌を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class Chassis implements DomainModel {
    + CargoType cargoType       # 貨物種別

    + String controlNumber      # 入庫番号
    + String number             # 車台番号
    + String searchNumber()     # 検索用番号
    
    + CarModel carModel         # 車種
    + float displacement        # 排気量
    + float weight              # 重量
    + float extent              # 車体長
    + float width               # 車体幅
    + float height              # 車体高さ
    + float m3                  # 容積
    + bool movable              # 可動フラグ

    + Office shipper            # 荷主事業所
    + String shipperRefNo       # 荷主参照番号
    + Office primeForwarder     # 元請フォワーダー
    + bool requireCollectKey    # 鍵回収要望フラグ 
    + bool requireExtraLashing  # 強化ラッシング要望フラグ 
    + bool requirePhotoForSale  # 販売用写真撮影要望フラグ

    + String remarks            # 備考
    + String innerCargoRemarks  # インナーカーゴ備考
    + String adminRemarks       # 管理用備考
    
    + JobType expectedJobType   # 予定ジョブ種別
}
```

#### プロパティ

cargoType / 貨物種別
: 貨物の種別。常に車輌になる。

controlNumber / 入庫番号
: LP3固有の管理番号。

number / 車台番号
: 車輌の車台部分に打刻されている、車両の固有認識番号。

searchNumber / 検索用番号
: 車台番号などから作成した、検索マッチ用文字列。導出可能。
    
carModel / 車種
: 車種。

displacement / 排気量
: 排気量(cc)。

weight / 重量
: 重量(kg)。

extent / 車体長
: 車体の長さ(cm)。

width / 車体幅
: 車体の幅(cm)。

height / 車体高さ
: 車体の高さ(cm)。

m3 / 容積
: 車輌の容積(m3)。車体長・車体幅・車体高さと排他的に値を格納する。

movable / 可動フラグ
: 車輌が正常に動く状態か。

shipper / 荷主事業所
: 荷主の事業所。

shipperRefNo / 荷主参照番号
: 荷主が車輌を管理する際に用いる番号

forwarder / フォワーダー
: 車輌を 

requireCollectKey / 鍵回収要望フラグ
: 鍵の回収が要望されているか。

requireExtraLashing / 強化ラッシング要望フラグ
: 強化ラッシングが要望されているか。

requirePhotoForSale / 販売用写真撮影要望フラグ
: 販売用写真の撮影が要望されているか。

remarks / 備考
: 任意の備考文章。

innerCargoRemarks / インナーカーゴ備考
: インナーカーゴに関する任意の備考文章。

adminRemarks / 管理用備考
: 管理用の任意の備考文章。

expectedJobType / 予定ジョブ種別
: 車輌を輸出するために用いる予定のジョブ種別。null の場合は未定。


#### メモ

int 放射線検査ステータス     # 博多航運のみ使用している。大淵さんが確認する。それまでは保留
