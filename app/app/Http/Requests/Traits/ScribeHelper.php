<?php

namespace App\Http\Requests\Traits;

/**
 * Scribe用のヘルパートレイト
 */
trait ScribeHelper
{
    /**
     * enumの説明を返す
     * @param string $description
     * @param array $cases
     * @return array
     */
    protected function enumDescription(string $description, array $cases): array
    {
        return [
            'description' => $description . ' (' . collect($cases)->map(fn($case) => "{$case->value}:{$case->name}")->implode(', ') . ')',
            'example' => $cases[0]->value,
        ];
    }
}
