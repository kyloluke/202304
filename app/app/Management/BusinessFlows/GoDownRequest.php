<?php

namespace App\Management\BusinessFlows;


/**
 * GoDown依頼
 */
class GoDownRequest extends BusinessFlow
{

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 11;
    }

	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'GoDown依頼';
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
        //GoDownの日付が決まったら、SYNC OPまたは乙仲が陸送会社にGodown実施依頼をする。(電話かメール)

        //SYNC OPまたは乙仲がLP3にGodown日を登録する。
        // @todo 本船動静でGodown日の登録機能を作成する。

        return false;
    }
}
