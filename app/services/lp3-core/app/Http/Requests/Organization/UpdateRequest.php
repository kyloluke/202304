<?php

namespace Services\Lp3Core\App\Http\Requests\Organization;

use Services\Lp3Core\App\Http\Requests\Request;
use App\Http\Requests\Traits\ScribeBodyParametersHelper;
use Illuminate\Validation\Rule;
use Services\Lp3Core\App\Enums\SystemUsage;
use Services\Lp3Core\App\Models\Organization;

/**
 * 組織の更新リクエスト
 * 
 * @urlParam id integer required The ID of the organization
 */
class UpdateRequest extends Request
{
    use ScribeBodyParametersHelper;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'nameJp' => ['required', 'string'],
            'nameEn' => ['required', 'string'],
            'canonicalName' => ['nullable', 'string'],
            'nameAbbr' => ['nullable', 'string'],
            'representativeName' => ['nullable', 'string'],
            'logoFileId' => ['nullable', 'integer'],
            'systemUsage' => ['required', 'integer', Rule::in(array_column(SystemUsage::cases(), 'value'))],
        ];
    }

    /**
     * @see ScribeBodyParametersHelper::bodyParameters()
     */
    public function bodyParameters(): array
    {
        return [
            'nameJp' => [
                'description' => "名称_日本語",
                'example' => "テスト"
            ],
            'nameEn' => [
                'description' => "名称_英語",
                'example' => "test"
            ],
            'canonicalName' => [
                'description' => "正式名称",
                'example' => "株式会社テスト"
            ],
            'nameAbbr' => [
                'description' => "省略名称",
                'example' => "（株）テスト"
            ],
            'representativeName' => [
                'description' => "代表者",
                'example' => "テスト田 テスト太郎"
            ],
            'logoFileId' => [
                'description' => "ロゴのファイルのId(画像の登録を解除する場合は、「0」を入れる)",
                'example' => 100
            ],
            'systemUsage' => [
                'description' => "システム利用形態",
                'example' => SystemUsage::ADMINISTRATION->value,
            ],
        ];
    }

    public function getTargetOrganization(): Organization
    {
        return Organization::with(
            'organizationLogoFile',
            'offices',
            'users',
            'yardGroups'
        )->findOrFail($this->organization);
    }

    public function makeArrayForUseCase(Organization $targetOrganization): array
    {
        return [
            'nameJp' => isset($this->nameJp) ? $this->nameJp : $targetOrganization->name_jp,
            'nameEn' => isset($this->nameEn) ? $this->nameEn : $targetOrganization->name_en,
            'canonicalName' => isset($this->canonicalName) ? $this->canonicalName : $targetOrganization->canonical_name,
            'nameAbbr' => isset($this->nameAbbr) ? $this->nameAbbr : $targetOrganization->name_abbr,
            'representativeName' => isset($this->representativeName) ? $this->representativeName : $targetOrganization->representative_name,
            'logoFileId' => isset($this->logoFileId) ? $this->logoFileId : $targetOrganization->use_logo_file_id,
            'systemUsage' => isset($this->systemUsage) ? $this->systemUsage : $targetOrganization->system_usage
        ];
    }
}
