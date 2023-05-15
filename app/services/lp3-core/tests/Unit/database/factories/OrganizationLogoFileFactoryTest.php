<?php

use Services\Lp3Core\App\Models\OrganizationLogoFile;
use Tests\TestCase;

it('smoke', function () {
    /** @var TestCase $this */

    $office = OrganizationLogoFile::factory()->create();
    $this->assertInstanceOf(OrganizationLogoFile::class, $office);
});
