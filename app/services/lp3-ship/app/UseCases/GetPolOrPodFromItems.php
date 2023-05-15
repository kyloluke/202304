<?php

namespace Services\Lp3Ship\App\UseCases;

class GetPolOrPodFromItems
{
    public function __invoke(array $items, $column, $sort = 'asc'): string
    {
        $str = '';
        foreach ($items as $index => $item) {
            if (empty($item[$column])) {
                continue;
            }

            if ($index == 0) {
                $str = $item[$column];
                continue;
            }
            if ($sort == 'asc') {
                if ($item[$column] < $str) {
                    $str = $item[$column];
                }
            } else {
                if ($item[$column] > $str) {
                    $str = $item[$column];
                }
            }
        }
        return $str;
    }
}
