<?php

namespace Services\Lp3Core\App\Http\Resources\Organization;

use Services\Lp3Core\App\Http\Resources\Resource as BaseResource;

/**
 * 組織の一覧表示APIリソース
 */
class IndexResource extends BaseResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'nameJp' => $this->name_jp,
            'nameEn' => $this->name_en,
            'canonicalName' => $this->canonical_name,
            'nameAbbr' => $this->name_abbr,
            'representativeName' => $this->representative_name,
            'logoFile' => !empty($this->organizationLogoFile) ? [
                'uri' => $this->organizationLogoFile->logo_file_uri,
                'name' => $this->organizationLogoFile->logo_file_name,
                'mime' => $this->organizationLogoFile->logo_file_mime,
            ] : null,
            'systemUsage' => $this->system_usage,
        ];
    }
}
