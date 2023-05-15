<?php

namespace Services\Lp3Core\App\Http\Requests\Organization;

use Services\Lp3Core\App\Http\Requests\Request;
use App\Http\Requests\Traits\ScribeBodyParametersHelper;
use Illuminate\Validation\Rule;
use Services\Lp3Core\App\Enums\SystemUsage;

/**
 * 組織の登録リクエスト
 */
class StoreRequest extends Request
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
            'logoFileId' => ['nullable', 'integer', Rule::exists('organization_logo_files', 'id')],
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
                'description' => "ロゴのファイルのId",
                'example' => 1,
            ],
            'systemUsage' => [
                'description' => "システム利用形態",
                'example' => SystemUsage::ADMINISTRATION->value,
            ],
        ];
    }

    public function makeArrayForUseCase(): array
    {
        return [
            'nameJp' => $this->nameJp,
            'nameEn' => $this->nameEn,
            'canonicalName' => isset($this->canonicalName) ? $this->canonicalName : null,
            'nameAbbr' => isset($this->nameAbbr) ? $this->nameAbbr : null,
            'representativeName' => isset($this->representativeName) ? $this->representativeName : null,
            'logoFileId' => isset($this->logoFileId) ? $this->logoFileId : null,
            'systemUsage' => $this->systemUsage,
        ];
    }
}
