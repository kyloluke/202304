<?php

namespace Services\SampleAlice\Exports;

/**
 * 別サービスに機能を提供するサービスのインターフェイス
 */
interface SampleAliceService
{
    /**
     * 動物の一覧を取得する
     *
     * @return array
     */
    public function getAnimals(): array;
}
