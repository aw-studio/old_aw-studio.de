<?php

namespace FjordApp\Config;

use Fjord\Application\Navigation\Config;
use Fjord\Application\Navigation\Navigation;

class NavigationConfig extends Config
{
    /**
     * Topbar navigation entries.
     *
     * @param \Fjord\Application\Navigation\Navigation $nav
     * @return void
     */
    public function topbar(Navigation $nav)
    {
        $nav->section([
            $nav->preset('profile'),
        ]);

        $nav->section([
            $nav->title(__f('fj.user_administration')),

            $nav->preset('user.user', [
                'icon' => fa('users')
            ]),
            $nav->preset('permissions')
        ]);

        $nav->section([
            $nav->preset('form.collections.settings', [
                'title' => __f('fj.settings'),
                'icon' => fa('cog')
            ])
        ]);
    }

    /**
     * Main navigation entries.
     *
     * @param \Fjord\Application\Navigation\Navigation $nav
     * @return void
     */
    public function main(Navigation $nav)
    {
        $nav->section([
            $nav->title('Seiten'),
            // Home
            $nav->preset('form.pages.home', [
                'icon' => fa('home')
            ]),
            // Services
            $nav->preset('form.pages.services', [
                'icon' => fa('list')
            ]),
            // References
            $nav->preset('form.pages.references', [
                'icon' => fa('asterisk')
            ]),
            // Studio
            $nav->preset('form.pages.studio', [
                'icon' => fa('door-open')
            ]),
            // Application
            $nav->preset('form.pages.application', [
                'icon' => fa('envelope')
            ]),
        ]);

        $nav->section([
            $nav->title('Komponenten'),
            // Jobs
            $nav->preset('form.components.jobs', [
                'icon' => fa('keyboard')
            ]),
        ]);

        $nav->section([
            $nav->title('Datensätze'),

            // Referenzen
            $nav->group([
                'title' => 'Referenzen',
                'icon' => fa('asterisk'),
            ], [

              // Referenzen
              $nav->preset('crud.reference', [
                  'icon' => fa('database')
              ]),
              // Highlights Collection
              $nav->preset('form.collections.highlights', [
                  'icon' => fa('burn')
              ]),
              // Featured Collection
              $nav->preset('form.collections.featured', [
                  'icon' => fa('heart')
              ])

            ]),

            // Kunden
            $nav->preset('crud.customer', [
                'icon' => fa('building')
            ]),

            // Team
            $nav->preset('crud.team_member', [
                'icon' => fa('users')
            ]),

        ]);

    }
}
