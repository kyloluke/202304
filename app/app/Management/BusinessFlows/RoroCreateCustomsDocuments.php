<?php

namespace App\Management\BusinessFlows;

/**
 * 通関書類の作成(RORO)
 */
class RoroCreateCustomsDocuments extends BusinessFlow
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 4;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '通関書類の作成(RORO)';
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

        // 車輌が保税ヤードに保管されているかどうか
        $hozei = true;

        // 保税ヤードに保管されている場合
        if ($hozei) {

        } else {
            // 保税ヤードに保管されていない場合
            // SYNC OPから陸送会社に電話orメールで陸送依頼の連絡をする

            // 陸送会社が陸送をし、車輌を保税ヤードに搬入する
        }

        // SYNC OP、船積元請け会社、シッパー、作業会社、通関業者のいずれかが通関書類（IV / EC / SI）を作成する

        // SYNC OP、船積元請け会社、シッパー、作業会社、通関業者のいずれかが通関書類のアップロードをする
        (new \App\Management\Functions\DocumentUpdate())->main();

        return false;
    }
}
