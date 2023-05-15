<?php

namespace Services\Lp3Ship\App\Rules;

use Illuminate\Contracts\Validation\ImplicitRule;
use Services\Lp3Ship\App\Models\Ship;

class ShipExistsCheckRule implements ImplicitRule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $typeArr;
    protected $columnName;

    public function __construct(array $typeArr, string $columnName = '本船')
    {
        $this->typeArr = $typeArr;
        $this->columnName = $columnName;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (!is_numeric($value)) {
            return true;
        }
        return Ship::where('id', $value)
            ->whereIn('type', $this->typeArr)
            ->whereNull('deleted_at')
            ->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->columnName . 'は存在していません.';
    }

}

