<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ImplicitRule;

class UniqueCheckRule implements ImplicitRule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $modelClass;
    protected $column;
    protected $ignoreId;
    protected $columnName;

    public function __construct(string $modelClass, string $columnName, int|null $ignoreId = 0, string $column = 'name')
    {
        $this->modelClass = $modelClass;
        $this->column = $column;
        $this->ignoreId = $ignoreId;
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
        $model = new $this->modelClass;
        $query = $model::where($this->column, $value)
            ->whereNull('deleted_at');

        if ($this->ignoreId > 0)
            $query->where('id', '!=', $this->ignoreId);

        return !$query->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->columnName . 'はすでに存在しています.';
    }
}

