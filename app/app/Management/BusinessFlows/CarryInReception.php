<?php

namespace App\Management\BusinessFlows;

use App\Management\Functions\ChassisBulkRegisterByCsv;
use App\Management\Functions\ChassisRegister;

/**
 * 搬入受付
 */
class CarryInReception extends BusinessFlow
{
	/**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 1;
    }
    
	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '搬入受付';
    }
    
	/**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return 'オークション会場などからSYNC管理ヤードへ移送されてきた車輛の受付まで';
    }
    
    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        // 荷主からの事前連絡があり、SYNC管理ヤードから？の場合は、車輌の登録 or 車輌のCSV一括登録 で情報を登録する
        (new ChassisRegister())->main();
        (new ChassisBulkRegisterByCsv())->main();

        return true;
    }
}
