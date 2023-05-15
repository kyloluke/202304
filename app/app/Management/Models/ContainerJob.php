<?php

namespace App\Management\Models;

/**
 * コンテナJOB
 */
class ContainerJob
{
    /**
     * 本船スケジュールのスライドフラグ
     *
     * 本船スケジュールを変更する必要がある、という状態を管理するためのフラグ
     * スライドフラグがONの場合は、本船名を「スライド」と表記するなど、本船スケジュールの表示を切り替える必要がある
     */
    public bool $shipScheduleSlide;

    /**
     * 担当者
     *
     * LP2では「SL担当者」という表記にしていたが、LP3では「船積担当者」という表記に変更する
     */
    public $userInChage;

    /**
     * ステベ(船内荷役業者)
     *
     * 「ステベ」は現状自動で収集できない項目のため使用していないが、港湾のDX化が進めば自動で収集できるようになるかもしれないので、受け皿として残しておきたい
     * 「ステベ」はLP3のJOBの一覧や詳細・編集画面には表示しないが、将来利用できるように内部では保持しておく
     */
    public $stevedore;

    // @todo 「揚地の現地代理店」のプロパティを追加する
    // @todo 「仕向地の現地代理店」のプロパティを追加する

    // @todo ハッシュタグの決定事項
    //引用元:https://sync-logi.backlog.com/alias/wiki/2496127
    //検索のラベリングとして使用
    //SYNC内だけでまずは使用する
    //ハッシュタグは事業所内で共有
    //ハッシュタグの作成・編集権限は事業所の管理者
    //同事業所内であればタグは、事業者内メンバー全員に見えてOK　他の事業所からは見えない。
    //ハッシュタグの統合・編集機能は必要
    //類似タグが作られないようにチェック機能は必要

    //LP2にはあったが、LP3では不要なプロパティ
    //・公開ステータス
    //  LP2のリリース前後のバージョンでは作業が確定するまではSHIPPERに対して非公開にし、作業が確定してからSHIPPERに対して公開する、というようなフローにしたい場合があった
    //  2017/05/31に画面上からは非表示にしており、その後上記のようなフローにしたい場合がある、というような要望は挙がっていないため、削除する
}