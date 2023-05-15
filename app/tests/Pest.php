<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

uses(Tests\TestCase::class)->in(
    'Unit',
    'Feature',

    // 各サービスのテストを追加
    '../services/exl-bfwd-ftp/tests/Unit',
    '../services/exl-bfwd-ftp/tests/Feature',

    '../services/exl-inttra/tests/Unit',
    '../services/exl-inttra/tests/Feature',

    '../services/exl-sync-banc/tests/Unit',
    '../services/exl-sync-banc/tests/Feature',

    '../services/exl-sync-dp/tests/Unit',
    '../services/exl-sync-dp/tests/Feature',

    '../services/exl-sync-ftp/tests/Unit',
    '../services/exl-sync-ftp/tests/Feature',

    '../services/exl-sync-metabase/tests/Unit',
    '../services/exl-sync-metabase/tests/Feature',

    '../services/exl-sync-web/tests/Unit',
    '../services/exl-sync-web/tests/Feature',

    '../services/lp3-bi/tests/Unit',
    '../services/lp3-bi/tests/Feature',

    '../services/lp3-cargo/tests/Unit',
    '../services/lp3-cargo/tests/Feature',

    '../services/lp3-core/tests/Unit',
    '../services/lp3-core/tests/Feature',

    '../services/lp3-job/tests/Unit',
    '../services/lp3-job/tests/Feature',

    '../services/lp3-sales/tests/Unit',
    '../services/lp3-sales/tests/Feature',

    '../services/lp3-ship/tests/Unit',
    '../services/lp3-ship/tests/Feature',

    '../services/sample-alice/tests/Unit',
    '../services/sample-alice/tests/Feature',

    '../services/sample-bob/tests/Unit',
    '../services/sample-bob/tests/Feature',
);

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function something()
{
    // ..
}
