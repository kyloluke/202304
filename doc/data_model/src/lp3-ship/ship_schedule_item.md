### ship_schedule_item データモデル

ドメインモデル ShipScheduleItem を永続化するためのデータモデル。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class ship_shedule_items extends data_model {
    ship_schedule_id : bigInteger(foreign key = ship_schedules.id)  # 外部キー
    pol_port_id : bigInteger(nullable, foreign key = ports.id)      # 積港
    pol_arrival_at : datetime(nullable)                             # 積港入港予定日時
    pol_arrived_at : datetime(nullable)                             # 積港入港日時
    pol_departure_at : datetime(nullable)                           # 積港出港予定日時
    pol_departed_at : datetime(nullable)                            # 積港出港日時
    pod_port_id : bigInteger(nullable, foreign key = ports.id)      # 揚港
    pod_arrival_at : datetime(nullable)                             # 揚港到着予定日時
    pod_arrived_at : datetime(nullable)                             # 揚港到着日時
    document_cut_at : datetime(nullable)                            # ドキュメントカット日時
    document_am_cut : bool(default:false)                           # ドキュメントカットAMカットフラグ
    cy_open_at : datetime(nullable)                                 # コンテナヤードオープン日時
    cy_cut_at : datetime(nullable)                                  # コンテナヤードカット日時
    cy_am_cut : bool(default:false)                                 # コンテナヤードAMカットフラグ
    irregular_cy_cut : bool(default:false)                          # 例外コンテナヤードカット日時フラグ
    remarks : text(nullable)                                        # 備考
    available : bool(default:true)                                  # 利用可能フラグ
    fd_id : bigInteger(nullable, foreign key = destinatinons.id)    # 仕向地、外部キー
    fd_arrival_at : datetime(nullable)                              # 仕向地到着予定日時
    fd_arrived_at : datetime(nullable)                              # 仕向地到着日時
    go_down_at : datetime(nullable)                                 # ゴーダウン予定日時
    go_down_zip_code : string(nullable)                             # ゴーダウン場所の郵便番号
    go_down_address : string(nullable)                              # ゴーダウン場所の住所
}
```

#### テーブル

ship_schedule_items テーブルに格納する。

#### カラム

ドメインモデルの各プロパティに対応するカラムを保持する。
