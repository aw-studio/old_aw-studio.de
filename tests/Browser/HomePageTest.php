<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class HomePageTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function test_front_page_is_visible()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/de')
                ->assertSee('Alle Wetter');
        });
    }
}
