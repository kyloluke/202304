<?php

namespace App\Management\Models;

/**
 * ユーザー
 */
class User
{
 
    /**
     * 役職ランクの表示設定
     */
    public function viewPositionRank()
    {
        
    }

    /**
     * web共有URL作成
     */
    public function shareScreenAuthority()
    {
        //LP3からの新機能
        //アカウントの持つ権限では見ることができない情報を特別に確認してもらうためにWEB共有することを想定
    }

    /**
     * ハッシュタグの権限
     */
    public function hashtagAuthority()
    {
        //LP3からの新機能
        //ハッシュタグは事業所内で共有して使用し、同事業所内であればユーザーが作成したタグは全員閲覧可能
    }

    /**
     * STOCK一覧画面
     */
    public function chassisListScreenAuthority()
    {

    }

    /**
     *車輛の削除に関する権限
     */
    public function chassisDeleteAuthority()
    {
        //LP3より「一括削除」「削除済み車輛の表示」「削除済み車輛の復活」の機能を追加

    }

    /**
     * 全体視点・ヤード視点の切替
     */
    public function chassisListScreenViewpointSwitching()
    {
        //LP3からの新機能
    }

    /**
     * STOCKの一括ダウンロード(全CSV)権限
     */
    public function chassisAllCsvDownloadAuthority()
    {

    }

    /**
     * STOCK詳細
     */
    public function chassisDatailAuthority()
    {

    }

    /**
     * STOCKの写真に関する権限
     */
    public function chassisDocumentAuthority()
    {
        //LP3より搬入・軽作業・商品写真の3種類の分類に変更
    }

    /**
     * STOCKの書類に関する権限
     */
    public function chassisPhotoAuthority()
    {
        //LP3からの新機能。輸出前検査合格証、EC、リサイクル還付申請書を管理
    }

    /**
     * STOCKの輸出前検査に関する権限
     */
    public function chassisInspectionHistoryAuthority()
    {
        //LP3からの新機能

    }

    /**
     * STOCKのヤード搬入・搬出に関する権限
     */
    public function chassisCarryInCarryOutAuthority()
    {
        //LP3からの新機能。ヤード搬入・搬出履歴の編集・搬出依頼・搬入搬出登録を行う

    }

    /**
     * STOCKのコメントに関する権限
     */
    public function chassisComentAuthority()
    {
        //LP3からの新機能
        //コメントは業務連絡としての使い方を想定しているので、書き込み内容は自分宛ではないものもすべて閲覧できる
    }

    /**
     * STOCK画面からの船積み登録に関する権限
     */
    public function chassisAddJobAuthority()
    {
        //LP3よりSTOCKの画面からも既存のJOBに登録できるようになったが、JOB側の権限に準ずる
    }

    /**
     * コンテナJOB詳細
     */
    public function contJobDatailAuthority()
    {

    }

    /**
     * ROROJOB詳細
     */
    public function roroJobDatailAuthority()
    {

    }

    /**
     * JOB詳細の輸出前検査種別の選択に関する権限
     */
    public function JobDatailSelectInspectionAuthority()
    {
        //LP3からの新機能。輸出に必要な輸出前検査種別を輸出国で絞り込んだ後、さらにその中から受ける検査を選択する
    }

    /**
     * JOBの船積み登録に関する権限
     */
    public function JobAddChassisAuthority()
    {

    }

    /**
     * JOB詳細画面の請求に関する権限
     */
    public function JobDatailBllingAutority()
    {

    }

    /**
     *ACCOUNTINGのスキップ設定の権限
     */
    public function accountingSkipAuthority()
    {
        //LP2ではユーザーごとに設定していたが、LP3からは業種・役職ランクで管理ができるようになった
        //SYNCユーザーのみの機能
    }

    /**
     *ACCOUNTINGに関する権限
     */
    public function accountingAuthority()
    {
        //SYNCユーザーのみの機能
    }

    /**
     * 自分以外のユーザーのマイページに関する権限
     */
    public function othersUserMyPageAuthority()
    {
        //LP3からの新機能
    }

    /**
     * マイ事業所ページに関する権限
     */
    public function myOfficeAuthority()
    {
        //LP3からの新機能
    }

    /**
     * ヤード・ヤードグループマスタの権限
     */
    public function yardMasterAuthority()
    {
        //ヤードグループはLP3からの新機能
    }

    /**
     * ユーザーマスタの権限
     */
    public function userMasterAuthority()
    {

    }

    /**
     * サービス基本情報の権限
     */
    public function productSchemeAuthority()
    {
        //SYNCユーザーのみの機能
    }

    /**
     * LP2にはあったがLP3では削除する権限
     */
    public function removeFromLp3Authority()
    {
        //本船動静のメーカーVANは非表示にしてから３年ほどたつが特に要望が上がっていないので廃止
        //ROROJOBの「BL TYPEがHBL作業であるSO書類のダウンロード」権限は書類閲覧の制限付き条件扱いとできるので、単独して切り出した権限として制御しなくていいため廃止
        //コンテナJOB・ROROJOBの書類送付のステータス更新権限は廃止
    }

}
