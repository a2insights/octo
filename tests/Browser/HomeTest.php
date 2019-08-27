<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

/**
 * Class HomeTest
 *
 * @package Tests\Browser
 */
class HomeTest extends DuskTestCase
{
    /**
     * Test home page
     *
     * @return void
     * @throws \Throwable
     */
    public function test_home_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertTitle('Has Blog');
        });
    }
}
