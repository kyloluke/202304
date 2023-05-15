### chassis / 車輌 モデル

ドメインモデル Chassis を永続化するためのデータモデル。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class chassis implements data_model {
    cargo_type_id : bigInteger(foreign key = cargo_types.id)            # 貨物の種別、外部キー        
    car_model_id : bigInteger(foreign key = car_models.id)              # 車種、外部キー              
    control_number : string(nullable)                                   # 入庫番号
    number : string(nullable)                                           # 車台番号
    search_number : string(nullable)                                    # 検索用番号　
    displacement : float(nullable)                                      # 排気量     
    weight : float(nullable)                                            # 重量
    extent : float(nullable)                                            # 車体長
    width : float(nullable)                                             # 車体幅
    height : float(nullable)                                            # 車体高さ
    m3 : float(nullable)                                                # 容積
    movable : bool(nullable)                                            # 可動フラグ
    shipper_id : bigInteger(foreign key = offices.id)                   # 荷主事業所
    prime_forwarder_id : bigInteger(nullable, foreign key = offices.id) # 扱い業者
    require_collect_key : bool(nullable)                                # 鍵回収要望フラグ 
    require_extra_lashing : bool(nullable)                              # 強化ラッシング要望フラグ 
    require_photo_for_sale : bool(nullable)                             # 販売用写真撮影要望フラグ
    remarks : string(nullable)                                          # 備考
    inner_cargo_remarks : string(nullable)                              # インナーカーゴ備考
    admin_remarks : string(nullable)                                    # 管理用備考
    shipper_ref_no : string(nullable)                                   # 荷主参照番号
    expected_job_type : tinyInt(nullable, enum(JobType))                # 予定ジョブ種別
}
```

#### テーブル

chassis テーブルに格納する。

#### カラム

ドメインモデルの各プロパティに対応するカラムを保持する。

#### JobType 列挙値

列挙型 JobType を永続化するための列挙値。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum JobType {
    CONTAINER_JOB   = 1     # コンテナジョブ
    RORO_JOB        = 2     # ROROジョブ
}
```

#### 値

列挙型 JobType の各フィールドに対応する値を定義する。

