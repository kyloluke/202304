<?php

namespace Services\Lp3Sales\App\Models;

use App\Models\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Services\Lp3Sales\Database\Factories\QuotationFactory;

/**
 * 見積モデル
 */
class Quotation extends Model
{
    use AuthorObservable, SoftDeletes, HasFactory;

    protected static function newFactory()
    {
        return QuotationFactory::new();
    }
}
