<?php

namespace Services\Lp3Sales\App\Models;

use App\Models\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Services\Lp3Sales\Database\Factories\BillingFactory;

/**
 * 請求モデル
 */
class Billing extends Model
{
    use AuthorObservable, SoftDeletes, HasFactory;

    protected static function newFactory()
    {
        return BillingFactory::new();
    }
}
