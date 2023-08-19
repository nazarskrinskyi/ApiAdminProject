<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class MovieFilter extends AbstractFilter
{
    public const TITLE = 'name';
    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'name'],
        ];
    }

    public function title(Builder $builder, $value): void
    {
        $builder->where(self::TITLE, 'like', "%$value%");
    }
}
