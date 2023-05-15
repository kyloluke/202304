<?php

namespace App\Management\BusinessFlows;

/*
* メーカーマスタ登録
*/
class CarMakerMasterEdit extends BusinessFlow
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
        return 'メーカーマスタ登録';
    }

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        return false;
    }
}