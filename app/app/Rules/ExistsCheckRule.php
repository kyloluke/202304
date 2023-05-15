<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ImplicitRule;

class ExistsCheckRule implements ImplicitRule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    protected $modelClass;
    protected $column;
    protected $columnName;
    protected $condition = [];

    public function __construct(string $modelClass, string $columnName, array $condition = [], string $column = 'id')
    {
        $this->modelClass = $modelClass;

        $this->column = $column;

        $this->condition = $condition;

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
        $model = new $this->modelClass;
        $query = $model::where($this->column, $value);

        if (is_array($this->condition) && count($this->condition) > 0) {
            foreach ($this->condition as $column => $val) {
                $query->where($column, '=', $val);
            }
        }

        return $query->whereNull('deleted_at')->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->columnName . 'は無効になっています';
    }
}

