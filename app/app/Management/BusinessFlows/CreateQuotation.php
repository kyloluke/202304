<?php

namespace App\Management\BusinessFlows;

/**
 * 見積書の作成
 */
class CreateQuotation extends BusinessFlow
{

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 51;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '見積書作成';
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
        //見積作成者 = SYNC営業スタッフ、SYNC OP

        while (true) {
            //見積作成者が見積書を作成する。
            // @todo 見積書作成機能を作成する。

            //LP3が共有URL・PDFを作成しLP３に保存(アップロード)する。
            // @todo 共有URL・PDF作成、PDFの保存(アップロード)機能を作成する。

            //見積作成者が共有URLをコピーし、SHIPPERにメールなどで連絡する。

            //連絡を受領したSHIPPERが共有URLをクリックしてLP3にログインする。

            //LP3で共有用の見積書画面を表示する。PDFもダウンロード可能な状態にする。
            // @todo 共有URLからの見積書表示、PDFダウンロード機能を作成する。

            //SHIPPERが見積書を確認する。

            //見積作成者がSHIPPERに対して発注の確認(問い合わせ)を行う。

            //SHIPPERが発注に対しての返答を見積作成者にする。

            //SHIPPERが価格に対して了承するか否か
            $agreeprice = true;

            if ($agreeprice) {

                //SHIPPERが了承した
                break;

            } else {
                //SHIPPERが了承しなかった。
                //見積作成者が価格を調整して見積書を作り直す。
            }
        }

        return false;
    }
}
