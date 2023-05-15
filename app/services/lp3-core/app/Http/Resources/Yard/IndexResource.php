<?php

namespace Services\Lp3Core\App\Http\Resources\Yard;

use Services\Lp3Core\App\Enums\YardStatus;
use Services\Lp3Core\App\Http\Resources\Resource as BaseResource;
use Services\Lp3Core\App\Http\Resources\Yard\YardGroupResourceForYard;

/**
 * ヤードの一覧取得のリソース
 */
class IndexResource extends BaseResource
{
    /**
     * @see Resource::toArray()
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "nameJp" => $this->name_jp,
            "nameEn" => $this->name_en,
            "address1Jp" => $this->address1_jp,
            "address1En" => $this->address1_en,
            "address2Jp" => $this->address2_jp,
            "address2En" => $this->address2_en,
            "address3Jp" => $this->address3_jp,
            "address3En" => $this->address3_en,
            "mail" => $this->mail,
            "capacity" => $this->capacity,
            "status" => YardStatus::tryFrom($this->status)->value,
            "yardGroup" => !empty($this->yardGroup) ? (new YardGroupResourceForYard($this->yardGroup))->toArray($request) : null,
            "createdAt" => $this->created_at,
            "updatedAt" => $this->updated_at,
            // "updatedBy" => $this->updater->name, // @todo User周りの改修が完了したらコメントアウトを外す。
        ];
    }
}
