### ContainerJob / コンテナジョブ モデル

コンテナ船積み作業を表す。

```plantuml
hide empty members

class ContainerJob extends Job {
    + String number        # ジョブ番号
    + Office shipper       # 荷主
    + String shipperNumber # 荷主管理番号
    + String adminRemarks  # 管理備考 TODO 意図的に管理備考にしている？
    + int chassisAmount    # 車輌数
    + Booking booking      # ブッキング
    + String mixedCargo    # 混載貨物
    + String オーダー備考 TBC 要確認 => 作業指示書用備考
    + Location 最終目的地 TBC 仕向地と最終目的地は異なる？ => FD
    + DateTime 最終目的地到着日時 => 本船スケジュールから取得している。導出可能。
    + Office カスタムブローカー
    + AgentOffice シッピングエージェント
    + 作業タイプ=>Office 作業タイプごとの事業所

    + enum IV書類ステータス TBC 内容確認 => 不要、必要（未アップロード、アップロード済み、荷主に送付済み、旧システム送付済み、返却済み）
                                        TBCS 現状送付したかどうかが中途半端に運用されている。LP3ではどうするか確認
                                        →現状と同じで。ただし通知時のドキュメントはダウンロードリンクにして、ダウンロード記録もとる
    + DateTime IV書類送付日時 TBC 送付日時？＝＞荷主への送付日時。現在はLP2上からのメール送信日時。
    + enum SI書類ステータス
    + DateTime SI書類送付日時
    + enum EC書類ステータス
    + DateTime EC書類送付日時
    + enum FSI書類ステータス
    + DateTime FSI書類送付日時
    + enum PO書類ステータス
    + DateTime PO書類送付日時
    + enum AN書類ステータス
    + DateTime AN書類送付日時
    + enum DR書類ステータス
    + DateTime DR書類送付日時
    + enum CERT書類ステータス
    + DateTime CERT書類送付日時
    + enum ED書類ステータス
    + DateTime ED書類送付日時
    + enum BL書類ステータス
    + DateTime BL書類送付日時
    + DateTime 書類締切日時

    TODO
    Billing 請求
    enum ステータス
    bool フレート入力フラグ TBC 入力済みフラグ？=>フレート請求する／しない のフラグ
    enum 公開ステータス TBC 内容確認＝＞現在は使ってない。廃止する
    enum コンテナ写真公開ステータス ＝＞ 不要。廃止する
    TODO "コンテナ"を別オブジェクトに分離する？
    String シール番号
    float 梱包重量
    float ネット重量
    float グロス重量
    float 容積(m3)
    String 写真閲覧アクセストークン TODO 別オブジェクトに分離すべき
    Port 荷受け地
    Location 荷渡し地 TBC Port?Pod?両方？ => OK
    enum コンテナタイプ
    enum コンテナサイズ
    String 貨物種類 TBC 文字列になっているが、意図的か確認 => 貨物種類マスタのIDを配列で持っている
    BLType BLタイプ
    bool CY搬入時通関
    bool 危険品
    String IMCO
    String UN NO.
    bool ベンチレーション
    float 設定温度(+ or -)(値)
    bool プレクーリング
    int OVER HIGH
    int OVER WIDTH(L)
    int OVER WIDTH(R)
    
    
    # POの自動取り込み用に作ってあったカラム。廃止する
    DateTime ピックアップ予定日  TBC => 削除
    String ピックアップ場所     TBC => 削除
    String ピックアップ明細備考 TBC => 削除
    String 搬入場所      TBC => 廃止
    String 海貨業者名    TBC => カスタムブローカー名。廃止
    String 連絡先       TBC => 廃止

    DateTime SFTPアップロード日時   TODO SFTP側で管理すべき

    TBC 削除で良いか確認
    old_comp	INT	10			0 => 削除
    old_after_billing	INT	10			0 => 削除
}
```

```
    以下は車輌に対する作業関連のプロパティ. TODO ChassisJob に分離する？
    int 輸出タイプ          # CONTAINER / RORO、実績＋予定を兼ねる.予定があるためContainerJobやROROJobには持てない？

    Office フォワーダー  # SYNCさん以外が入る。nullならSYNCさんになる。

    TODO RoroJob.ChassisSlotに移動
    DateTime roro_allocated_date   # ROROと紐づいた日付。TODO ROROJob内で保持すべき情報
```

#### プロパティ

TODO





### Booking / ブッキング モデル

船腹の予約情報を表す。
TODO ジョブでブッキング情報が入力され、保存された時に既存のブッキング情報に無ければ作られる。つまりBookingオブジェクトそのものが導出可能。
Historyとして保存する？

```plantuml
hide empty members

class Booking implements Document {
    + Office 発行元のシッピングエージェント事業所
    + String number  # 番号
    
    + int allocated      # 割り当て数 割り当てられた実績値 導出可能。
    + Office 荷主事業所  使われていない.削除する。TBCS 複数の荷主で１つのブッキングを共有するのが通常なのか確認→共有する場合、ブッキング番号が変わる。
}
```

### HouseBL / ハウスBL モデル

輸送業者（SYNCなど）が貨物の荷主に対して発行するBLを表す。
TODO スポット請求のみで入力されている。スポット請求からHBLオブジェクトそのものを導出可能なため、このオブジェクトは削除できる。
Historyとして保存する？

```plantuml
hide empty members

class HouseBL implements Document {
    + String number  # 管理番号
    + int quota      # 割り当て数 TODO ブッキングの割り当て数と同じで、割り当てられた数。導出可能。
}
```
