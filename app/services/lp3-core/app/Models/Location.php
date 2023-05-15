<?php

namespace Services\Lp3Core\App\Models;

use App\Models\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * ロケーションモデル
 */
class Location extends Model
{
    use AuthorObservable, SoftDeletes, HasFactory;

    public $table = 'locations';
}
