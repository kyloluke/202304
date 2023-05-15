<?php

namespace App\Management\Models;

class SyncUser extends User
{
    /**
     * @see User::viewPositionRank()
     */
    public function viewPositionRank()
    {
        //画面上の表示はBlack・Platinum・Golｄ・Silver・Bronze・Iron
        //・Black(管理者)
        //・Platinum(President)
        //・Gold(Manager)
        //・Silver(Leader)
        //・Bronze(Member)
    }

    /**
     * @see User::chassisDeleteAuthority()
     */
    public function chassisDeleteAuthority()
    {
        //車輛一台ずつの削除と「削除した車輛の表示」は全役職可能
        //「一括削除」「削除した車輛の復活」はSilver(Leader)以上が実行可能

    }

    /**
     * @see User::chassisComentAuthority()
     */
    public function chassisComentAuthority()
    {
        //Black(管理者)のみコメントの削除が可能

    }

    /**
     * @see User::accountingSkipAuthority()
     */
    public function accountingSkipAuthority()
    {
        //Silver(Leader)以上の役職のスキップ設定が可能。
    }

    /**
     * @see User::accountingAuthority()
     */
    public function accountingAuthority()
    {
        //請求の入金取り消しはSilver(Leader)以上
        //承認はSilver(Leader)以上かつ自分より権限が下のユーザーの分のみ承認ができる

    }

    /**
     * @see User::othersUserMypageAuthority()
     */
    public function othersUserMypageAuthority()
    {
        //自分の権限以下のユーザーであれば編集可能。Bronze(Member)は自分以外のユーザーの編集権限を持たない
        //ユーザーのパスワードリセットは自分の役職以下のユーザーであればリセット可能
        //ユーザーのアカウントロック解除は自分の役職以下のユーザーであれば解除可能
        //ユーザーの役職変更は自分の役職以下のユーザーであれば可能
        //特定の箇所だけ役職が上のユーザーが編集しないといけない事態を避けるため、自分の権限以下であれば登録・編集を可能にする
    }

    /**
    * @see User::myOfficeAuthority()
    */
    public function myOfficeAuthority()
    {
        //Black(管理者)とPlatinum(President)が編集可能。
        //ユーザーの登録は自分の役職以下のユーザーであれば登録可能。
    }

    /**
    * @see User::yardMasterAuthority()
    */
    public function yardMasterAuthority()
    {
        //登録・編集はBronze(Member)まで可能とし、マージはGold(Manager)以上とする
        //Bronzeも登録・編集はできないとSilver(Leader)以上の負担が多いため
    }

    /**
     * @see User::userMasterAuthority()
     */
    public function userMasterAuthority()
    {
        //LP3からはマイ事業所ページとマイページが追加になったため、SYNC事業所・SYNCユーザーの編集はそちらから行う
        //ユーザーマスタではSYNC以外のユーザーの編集ができる
        
        //以下の項目はBlack(管理者)のみ編集可能。通常は事業所の管理者が設定するものであり、窓口を複数もたないようにするため
        //通知内容設定のみ事業所管理者も編集はできないため、Black(管理者)のみ編集可能にする
        //・パスワードリセット
        //・アカウントロック解除
        //・権限
        //・通知内容設定

    }

    /**
     * @see User::productSchemeAuthority()
     */
    public function productSchemeAuthority()
    {
        //閲覧・編集はBlack(管理者)のみ。Platinum(President)以下は閲覧もなしのためメニューに表示しない

    }


}