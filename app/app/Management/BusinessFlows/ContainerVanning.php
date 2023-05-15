<?php

namespace App\Management\BusinessFlows;

/**
 * コンテナバンニング
 */
class ContainerVanning extends BusinessFlow
{

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 7;
    }

	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'コンテナバンニング作業';
    }

	/**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return '';
    }

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //ヤードスタッフがLP3またはSYNC OPからその日の作業の連絡を受ける。

        //作業指示書をLP3から一括ダウンロードして確認する。
        (new \App\Management\Functions\DownloadWorkInstruction())->main();

        //ヤードスタッフが保管場所から玉出し(作業ヤードまで移動)を行う。

        //ドレー会社が空のコンテナを作業ヤードまで搬入する。
        //ドレー会社には作業確定時に通知メールが飛ぶ

        //ヤードスタッフがバンニング中の作業を写真撮影する。

        //ヤードスタッフがLP3に作業写真を登録する。
        (new \App\Management\Functions\UploadWorkPhoto())->main();

        //CONT NO. / SEAL NO. / TARE WEIGHTを登録する
        (new \App\Management\Functions\ContBodyInfoEdit())->main();

        //ドレー会社がバンニング終了したコンテナをCYまで輸送する。
        //作業日の翌日に、自動的に車輛のステータスが「輸出済」になる
        (new \App\Management\Functions\ChassisStatusChangeExported())->main();

        return false;
    }
}
