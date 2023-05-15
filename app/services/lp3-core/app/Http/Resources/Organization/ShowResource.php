<?php

namespace Services\Lp3Core\App\Http\Resources\Organization;

use Services\Lp3Core\App\Http\Resources\Resource as BaseResource;

/**
 * 組織の表示APIリソース
 */
class ShowResource extends BaseResource
{
    public function toArray($request): array
    {
        $offices = [];
        $yardGroups = [];
        $officeUsers = [];
        $yardGroupStaffs = [];
        $yardGroupManagers = [];

        foreach ($this->offices as $office) {
            $officeId = $office->id;

            $offices[] = [
                'id' => $officeId,
                'name' => $office->name
            ];

            $tmpArr = $office->users->map(function ($user) use ($officeId) {
                return [
                    'officeId' => $officeId,
                    'userId' => $user->id,
                    'userName' => $user->name
                ];
            });
            $officeUsers = array_merge($officeUsers, $tmpArr->toArray());
        }

        foreach ($this->yardGroups as $yardGroup) {
            $yardGroupId = $yardGroup->id;

            $yardGroups[] = [
                'id' => $yardGroupId,
                'name' => $yardGroup->name
            ];

            $tmpArr = $yardGroup->staffs->map(function ($staff) use ($yardGroupId) {
                return [
                    'yardGroupId' => $yardGroupId,
                    'staffId' => $staff->id,
                    'staffName' => $staff->name
                ];
            });

            $yardGroupStaffs = array_merge($yardGroupStaffs, $tmpArr->toArray());

            $tmpArr2 = $yardGroup->managers->map(function ($manager) use ($yardGroupId) {
                return [
                    'yardGroupId' => $yardGroupId,
                    'managerId' => $manager->id,
                    'managerName' => $manager->name
                ];
            });
            $yardGroupManagers = array_merge($yardGroupManagers, $tmpArr2->toArray());
        }

        return [
            'id' => $this->id,
            'nameJp' => $this->name_jp,
            'nameEn' => $this->name_en,
            'canonicalName' => $this->canonical_name,
            'nameAbbr' => $this->name_abbr,
            'representativeName' => $this->representative_name,
            'logoFile' => !is_null($this->organizationLogoFile) ? [
                'uri' => $this->organizationLogoFile->logo_file_uri,
                'name' => $this->organizationLogoFile->logo_file_name,
                'mime' => $this->organizationLogoFile->logo_file_mime,
            ] : null,
            'systemUsage' => $this->system_usage,
            'users' => $this->users->count() > 0 ? $this->users->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                ];
            }) : [],
            'offices' => $offices,
            'yardGroups' => $yardGroups,
            'officeUsers' => $officeUsers,
            'yardGroupStaffs' => $yardGroupStaffs,
            'yardGroupManagers' => $yardGroupManagers,
        ];
    }
}
