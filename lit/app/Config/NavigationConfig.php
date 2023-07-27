<?php

namespace Lit\Config;

use Ignite\Application\Navigation\Config;
use Ignite\Application\Navigation\Navigation;
use Lit\Config\Crud\CustomerConfig;
use Lit\Config\Crud\JobOfferConfig;
use Lit\Config\Crud\LandingPageConfig;
use Lit\Config\Crud\PostConfig;
use Lit\Config\Crud\RedirectConfig;
use Lit\Config\Crud\ReferenceConfig;
use Lit\Config\Crud\ServiceConfig;
use Lit\Config\Crud\SolutionConfig;
use Lit\Config\Crud\TagConfig;
use Lit\Config\Crud\TeamMemberConfig;
use Lit\Config\Crud\TechnologyConfig;
use Lit\Config\Form\Collections\FeaturedConfig;
use Lit\Config\Form\Collections\HighlightsConfig;
use Lit\Config\Form\Components\JobsConfig;
use Lit\Config\Form\Navigations\MainNavigationConfig;
use Lit\Config\Form\Pages\ApplicationConfig;
use Lit\Config\Form\Pages\BlogConfig;
use Lit\Config\Form\Pages\DatapolicyConfig;
use Lit\Config\Form\Pages\DirectionsConfig;
use Lit\Config\Form\Pages\HomeConfig;
use Lit\Config\Form\Pages\ImprintConfig;
use Lit\Config\Form\Pages\MasterConfig;
use Lit\Config\Form\Pages\ReferencesConfig;
use Lit\Config\Form\Pages\ServicesConfig;
use Lit\Config\Form\Pages\SolutionsConfig;
use Lit\Config\Form\Pages\StudioConfig;
use Lit\Config\Form\Settings\SitemapConfig;
use Lit\Config\Form\Settings\TranslationsConfig;

class NavigationConfig extends Config
{
    /**
     * Topbar navigation entries.
     *
     * @param  \Ignite\Application\Navigation\Navigation  $nav
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

        $nav->section([
            $nav->title('Einstellungen'),

            $nav->preset(TranslationsConfig::class, ['icon' => fa('language')]),
            $nav->preset(SitemapConfig::class, ['icon' => fa('sitemap')]),
        ]);
    }

    /**
     * Main navigation entries.
     *
     * @param  \Ignite\Application\Navigation\Navigation  $nav
     * @return void
     */
    public function main(Navigation $nav)
    {
        $nav->section([
            $nav->title('Seiten'),
            //$nav->preset(MasterConfig::class)->icon(fa('shapes')),
            $nav->preset(HomeConfig::class)->icon(fa('home')),
            $nav->preset(ServicesConfig::class)->icon(fa('th-list')),
            $nav->preset(SolutionsConfig::class)->icon(fa('th-list')),
            $nav->preset(ReferencesConfig::class)->icon(fa('star-of-life')),
            $nav->preset(StudioConfig::class)->icon(fa('door-open')),
            $nav->preset(BlogConfig::class)->icon(fa('newspaper')),
            $nav->preset(ApplicationConfig::class)->icon(fa('envelope')),
            $nav->preset(ImprintConfig::class)->icon(fa('info-circle')),
            $nav->preset(DatapolicyConfig::class)->icon(fa('file-alt')),
            $nav->preset(DirectionsConfig::class)->icon(fa('map-marker-alt')),
        ]);
        $nav->section([
            $nav->title('Daten-Objekte'),
            $nav->group([
                'title' => 'Referenzen',
                'icon'  => fa('asterisk'),
            ], [
                $nav->preset(ReferenceConfig::class)->icon(fa('star-of-life')),
                $nav->preset(TechnologyConfig::class)->icon(fa('atom-alt')),
                $nav->preset(HighlightsConfig::class)->icon(fa('star')),
                $nav->preset(FeaturedConfig::class)->icon(fa('star')),
            ]),
            $nav->preset(ServiceConfig::class)->icon(fa('th-list')),
            $nav->preset(SolutionConfig::class)->icon(fa('thumbs-up')),
            $nav->preset(CustomerConfig::class)->icon(fa('building')),
            $nav->preset(TeamMemberConfig::class)->icon(fa('users')),
            $nav->preset(PostConfig::class)->icon(fa('newspaper')),
            $nav->preset(JobOfferConfig::class)->icon(fa('briefcase')),
            $nav->preset(LandingPageConfig::class)->icon(fa('window-maximize')),
            $nav->preset(TagConfig::class)->icon(fa('tags')),
        ]);
        $nav->section([
            $nav->title('Komponenten'),
            $nav->preset(MainNavigationConfig::class)->icon(fa('stream')),
            $nav->preset(JobsConfig::class)->icon(fa('keyboard')),
        ]);

        $nav->section([
            $nav->title('Seo'),
            $nav->preset(RedirectConfig::class, ['icon' => fa('directions')]),
        ]);
    }
}
