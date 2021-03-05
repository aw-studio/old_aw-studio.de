<?php

namespace Lit\Config;

use Ignite\Application\Navigation\Config;
use Ignite\Application\Navigation\Navigation;
use Lit\Config\Crud\ReferenceConfig;
use Lit\Config\Crud\TeamMemberConfig;
use Lit\Config\Form\Navigations\MainNavigationConfig;
use Lit\Config\Form\Pages\HomeConfig;
use Lit\Config\Form\Pages\MasterConfig;

class NavigationConfig extends Config
{
    /**
     * Topbar navigation entries.
     *
     * @param  \Ignite\Application\Navigation\Navigation $nav
     * @return void
     */
    public function topbar(Navigation $nav)
    {
        $nav->section([
            $nav->preset('profile'),
        ]);

        $nav->section([
            $nav->title(__lit('navigation.user_administration')),

            $nav->preset('user.user', ['icon' => fa('users')]),
            $nav->preset('permissions'),
        ]);
    }

    /**
     * Main navigation entries.
     *
     * @param  \Ignite\Application\Navigation\Navigation $nav
     * @return void
     */
    public function main(Navigation $nav)
    {
        $nav->section([
            $nav->title('Models'),
            $nav->preset(MasterConfig::class)->icon(fa('shapes')),
            $nav->preset(HomeConfig::class)->icon(fa('home')),
        ]);
        $nav->section([
            $nav->title('Datensätze'),
            $nav->preset(ReferenceConfig::class)->icon(fa('shapes')),
            $nav->preset(TeamMemberConfig::class)->icon(fa('users')),
        ]);
        $nav->section([
            $nav->title('Navigation'),
            $nav->preset(MainNavigationConfig::class)->icon(fa('stream')),
        ]);
    }
}
