<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Factory;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

/**
 * リクエストの基底クラス
 */
class Request extends FormRequest
{
    // パラメーターのキーは camelCase にするようにしてください

    /**
     * ルートパラメーターのバリデーションルールを返す
     * @return array
     */
    public function routeRules(): array
    {
        // EloquentなどはEloquent Modelに変換されているので、専用のもの(RouterModelExistsなど)を使う事
        return [];
    }

    /**
     * 通常のバリデーションの後に、ルートパラメーターのバリデーションを実行するための処理
     * @param Validator $validator
     * @see FormRequest::getValidatorInstance()
     */
    protected function withValidator(Validator $validator)
    {
        $validator->after(function (Validator $v) {

            /** @var Factory $factory */
            $factory = $this->container->make(Factory::class);

            $routeValidator = $factory->make(
                $this->route()->parameters(),
                $this->routeRules(),
            );

            if ($routeValidator->fails()) {
                $v->errors()->merge($routeValidator->errors());
            }
        });
    }
}
