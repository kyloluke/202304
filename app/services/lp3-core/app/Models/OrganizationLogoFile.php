<?php

namespace Services\Lp3Core\App\Models;

use App\Models\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Services\Lp3Core\Database\Factories\OrganizationLogoFileFactory;

/**
 * 組織用ロゴファイルモデル
 * 
 * @property $logo_file_uri
 * @property $logo_file_name
 * @property $logo_file_mime
 */
class OrganizationLogoFile extends Model
{
    use AuthorObservable, SoftDeletes, HasFactory;

    protected static function newFactory()
    {
        return OrganizationLogoFileFactory::new();
    }

    public function organization()
    {
        return $this->hasOne(Organization::class, 'logo_file_id', 'id');
    }
}
