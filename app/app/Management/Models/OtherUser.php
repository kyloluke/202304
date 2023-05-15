<?php

namespace App\Management\Models;

class OtherUser extends User
{
    /**
     * @see User::viewPositionRank()
     */
    public function viewPositionRank()
    {
        //画面上の表示はGold・Bronze
        //・Gold(管理者)
        //・Bronze(一般)
    }

    /**
     * @see User::shareScreenAuthority()
     */
    public function shareScreenAuthority()
    {
        //権限なし
    }

    /**
     * @see User::hashtagAuthority()
     */
    public function hashtagAuthority()
    {
        //最初はSYNC内だけで試用するので権限無し
        //ハッシュタグの作成・編集権限は管理者のみを想定
    }

    /**
     * @see User::chassisListScreenAuthority()
     */
    public function chassisListScreenAuthority()
    {
        //STOCK一覧画面を表示できる業種の一覧
        //・通関業者
        //・船積み作業会社
        //・在庫管理会社
        //・蔵主
        //・SHIPPER
        //・船積み元受け会社
        //・現地代理店
        //・SHIPPER(OSL)

        //船積み元受け会社はSHIPPERとSYNCの間にいるため、SHIPPERと権限を揃える
    }

    /**
     * @see User::chassisDeleteAuthority()
     */
    public function chassisDeleteAuthority()
    {
        //車輛一台ずつの削除と「削除済み車輛の表示」はSHIPPER(OSL)のみ可能
        //車輛の「一括削除」「削除済み車輛の復活」はSHIPPER(OSL)のGold(管理者)のみ可能

    }

    /**
     * @see User::chassisListScreenViewpointSwitching()
     */
    public function chassisListScreenViewpointSwitching()
    {
        //全体視点・ヤード視点の切替はSYNCと同じ動きをする必要のあるSHIPPER(OSL)のみ必要
        //SHIPPERとフォワーダーは全体視点
        //それ以外はヤード視点
    }

    /**
     * @see User::chassisAllCsvDownloadAuthority()
     */
    public function chassisAllCsvDownloadAuthority()
    {
        //SHIPPER(OSL)はダウンロード可能
    }

    /**
     * @see User::chassisDatailAuthority()
     */
    public function chassisDatailAuthority()
    {
        //STOCK詳細画面を編集できる業種の一覧
        //・船積み作業会社
        //・在庫管理会社
        //・蔵主
        //・SHIPPER
        //・SHIPPER(OSL)

        //閲覧のみ
        //・通関業者
        //・SHIPPER
        //・船積み元受け会社
        //・現地代理店
    }

    /**
     * @see User::chassisDocumentAuthority()
     */
    public function chassisDocumentAuthority()
    {
        //LP3より搬入・軽作業・商品写真に分かれるが、特定の業種に閲覧・ダウンロード権限を与えないものはなし
    }

    /**
     * @see User::chassisPhotoAuthority()
     */
    public function chassisPhotoAuthority()
    {
        //アップロード・編集権限あり：通関業者・SHIPPER・船積み元受け会社
        //基本的にはSYNCとSHIPPERのやり取りがメインとなる
        //SHIPPERは自社STOCKに対してアップロードを行う
        //それ以外の業種は閲覧・ダウンロードのみ可能
    }

    /**
     * @see User::chassisInspectionHistoryAuthority()
     */
    public function chassisInspectionHistoryAuthority()
    {
        //登録・編集権限あり：船積み作業会社・在庫管理会社・SHIPPER・船積み元受け会社・SHIPPER(OSL)
        //それ以外の業種は閲覧・合格証ダウンロードのみ可能
    }

    /**
     * @see User::chassisCarryInCarryOutAuthority()
     */
    public function chassisCarryInCarryOutAuthority()
    {
        //登録・編集権限あり：在庫管理会社・SHIPPER(OSL)
        //それ以外の業種は閲覧のみ可能
    }

    /**
     * @see User::chassisComentAuthority()
     */
    public function chassisComentAuthority()
    {
        //書き込み権限あり：通関業者・船積み作業会社・在庫管理会社・蔵主・SHIPPER(OSL)
        //読み取り権限のみ：SHIPEPR・船積み元受け会社・現地代理店
        //業務の依頼が発生する可能性があるのでSHIPPERは書き込みできないようにする
    }

    /**
     * @see User::contJobDatailAuthority()
     */
    public function contJobDatailAuthority()
    {
        //コンテナJOB詳細画面を編集できる業種の一覧
        //・船積み作業会社
        //・蔵主
        //・SHIPPER(OSL)

        //閲覧のみ
        //・通関業者
        //・在庫管理会社
        //・ドレー会社
        //・SHIPPER
        //・船積み元受け会社
        //・現地代理店
        //・エージェント

        //船積み元受け会社はSHIPPERとSYNCの間にいるため、SHIPPERと権限を揃える
    }

    /**
     * @see User::roroJobDatailAuthority()
     */
    public function roroJobDatailAuthority()
    {
        //ROROJOB詳細画面を編集できる業種の一覧
        //・船積み作業会社
        //・蔵主
        //・SHIPPER(OSL)

        //閲覧のみ
        //・通関業者
        //・在庫管理会社
        //・ドレー会社
        //・SHIPPER
        //・船積み元受け会社
        //・現地代理店
        //・エージェント

        //船積み元受け会社はSHIPPERとSYNCの間にいるため、SHIPPERと権限を揃える

    }

    /**
     * @see User::JobDatailSelectInspectionAuthority()
     */
    public function JobDatailSelectInspectionAuthority()
    {
        //登録・編集権限あり：SHIPPER・船積み元受け会社・SHIPPER(OSL)
        //それ以外の業種は閲覧のみ可能
        //SHIPPERと船積み元受け会社は詳細の編集権限がないため、この項目のみ編集画面に遷移しなくても設定できるようにする
    }

    /**
     * @see User::JobAddChassisAuthority()
     */
    public function JobAddChassisAuthority()
    {
        //登録権限あり：船積み作業会社
        //LP2では蔵主が船積み登録できていたが、この操作を行うことがほとんどないのでLP3では権限なしに変更
    }

    /**
     * @see User::JobDatailBllingAutority()
     */
    public function JobDatailBllingAutority()
    {
        //詳細画面の「PLAN(ノークレーム)」「ACCOUNTING(スキップ)」「FREIGHT請求(する/しない)」「PREPAID or COLLECT」は非表示
        //LP2では「ACCOUNTING」以外編集可能だったが、SYNCしか使用しない情報のためLP3では非表示にする
    }

    /**
     * @see User::accountingSkipAuthority()
     */
    public function accountingSkipAuthority()
    {
        //権限なし
        //LP2ではユーザーごとに設定していたが、LP3からは業種・役職ランクで管理できるようになったため、SYNCユーザーのみの権限に変更
    }

    /**
     * @see User::othersUserMyPageAuthority()
     */
    public function othersUserMyPageAuthority()
    {
        //Gold(管理者)が編集可能
    }

    /**
     * @see User::myOfficeAuthority()
     */
    public function myOfficeAuthority()
    {
        //Gold(管理者)が編集・ユーザーの登録可能
    }

    /**
     * @see User::yardMasterAuthority()
     */
    public function yardMasterAuthority()
    {
        //OSL権限を持つSHIPPERは閲覧・登録・編集が可能
    }

    /**
     * ユーザーマスタの権限
     */
    public function userMasterAuthority()
    {
        //OSL権限を持つSHIPPERは閲覧・登録・編集が可能
    }

}
