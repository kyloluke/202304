<?php
namespace App\Models\Traits;

use App\Observers\AuthorObserver;

/**
 * created_by、updated_by, deleted_byの自動登録を行う
 */
trait AuthorObservable
{
    public static function bootAuthorObservable()
    {
        self::observe(AuthorObserver::class);
    }
}
