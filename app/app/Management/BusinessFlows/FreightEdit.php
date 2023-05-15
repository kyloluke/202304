<?php

namespace App\Management\BusinessFlows;

use App\Management\Functions\Quotation\QuotationCreate;

/**
 * フレイト登録
 */
class FreightEdit extends BusinessFlow
{
    
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return null;
    }
    
	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'フレイト登録';
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
     */
    public function main()
    {
        while (true) {

            //フレイトの見積明細を選択する
            // @todo 「追加するフレイトの見積明細を選択する」機能を作成する

            //フレイトの見積明細がある/ない
            $quotation = true;

            //フレイトの見積明細がある場合
            if ($quotation) {
                //ループを抜けて次に進む
                break;
            } //該当するフレイトの見積明細がない場合
            else {
                $canCreate = true;
                if ($canCreate) {
                    //見積を作成する
                    (new QuotationCreate())->main();
                } else {
                    return;
                }
            }
        }

        //選択したフレイトの見積明細を基に、フレイトの請求明細を追加する
        // @todo 「請求明細を追加する」機能を作成する
    }
}
