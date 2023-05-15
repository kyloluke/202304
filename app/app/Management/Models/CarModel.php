<?php

namespace App\Management\Models;

/**
 * 車種
 *
 * LP2では「車名」「車種」という表記になっていたが、LP3では「モデル」という表記に統一する
 */
class CarModel
{
    /**
     * 所属する自動社ブランド
     */
    public CarBrand $carBrand;
}
