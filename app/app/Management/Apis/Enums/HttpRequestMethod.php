<?php

namespace App\Management\Apis\Enums;

/**
 * HTTPメソッド
 */
enum HttpRequestMethod
{
    case Get;
    case Head;
    case Post;
    case Put;
    case Delete;
    case Connect;
    case Options;
    case Trace;
    case Patch;

    /**
     * ラベルを取得する
     * @return string
     */
    public function label(): string
    {
        return strtoupper($this->name);
    }
}
