<?php

namespace Services\Lp3Core\App\Models;

use App\Models\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Services\Lp3Core\Database\Factories\OrganizationFactory;

/**
 * 組織モデル
 * 
 * @property $name_jp
 * @property $name_en
 * @property $canonical_name
 * @property $name_abbr
 * @property $representative_name
 * @property $system_usage
 * @property $use_logo_file_id
 * 
 */
class Organization extends Model
{
    use AuthorObservable, SoftDeletes, HasFactory;

    protected static function newFactory()
    {
        return OrganizationFactory::new();
    }

    public function offices()
    {
        return $this->hasMany(Office::class, 'organization_id', 'id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'organization_id', 'id');
    }

    // @todo ヤードグループを営業ブロックへ変更したら修正する。（5/9：中嶋）
    public function yardGroups()
    {
        return $this->hasMany(YardGroup::class, 'organization_id', 'id');
    }

    public function organizationLogoFile()
    {
        return $this->belongsTo(OrganizationLogoFile::class, 'use_logo_file_id', 'id');
    }

    public function scopeWhereNameKeywords($query, $keywords)
    {
        return $query->orWhere(function ($query) use ($keywords) {
            foreach ($keywords as $keyword) {
                $query->orWhere('name_jp',  'LIKE', '%' .  $keyword . '%');
                $query->orWhere('name_en',  'LIKE', '%' .  $keyword . '%');
                $query->orWhere('canonical_name',  'LIKE', '%' .  $keyword . '%');
                $query->orWhere('name_abbr',  'LIKE', '%' .  $keyword . '%');
            }
        });
    }
}
