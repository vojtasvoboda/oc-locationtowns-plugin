<?php namespace VojtaSvoboda\LocationTown;

use Backend;
use Event;
use RainLab\Location\Models\State;
use System\Classes\PluginBase;
use VojtaSvoboda\LocationTown\Models\Town;

/**
 * LocationTown Plugin Information File
 */
class Plugin extends PluginBase
{
    /** @var array $require Required plugins */
    public $require = [
        'RainLab.Location'
    ];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name' => 'vojtasvoboda.locationtown::lang.plugin.name',
            'description' => 'vojtasvoboda.locationtown::lang.plugin.description',
            'author' => 'Vojta Svoboda',
            'icon' => 'icon-building-o',
        ];
    }

    public function registerComponents()
    {
        return [
            'VojtaSvoboda\LocationTown\Components\Town' => 'locationTown',
            'VojtaSvoboda\LocationTown\Components\Towns' => 'locationTowns',
        ];
    }

    public function registerSettings()
    {
        return [
            'locationtown' => [
                'label' => 'vojtasvoboda.locationtown::lang.settings.label',
                'description' => 'vojtasvoboda.locationtown::lang.settings.description',
                'category' => 'rainlab.location::lang.plugin.name',
                'icon' => 'icon-building-o',
                'url' => Backend::url('vojtasvoboda/locationtown/towns'),
                'order' => 500,
                'permissions' => ['vojtasvoboda.locationtown.*'],
            ],
        ];
    }

    public function boot()
    {
        $this->app->bind('locationtowns', 'VojtaSvoboda\LocationTown\Models\Town');

        State::extend(function($model) {
            $model->hasMany['towns'] = 'VojtaSvoboda\LocationTown\Models\Town';
        });

        $this->initMenuItems();
    }

    /**
     * Register new MenuItems, which is usefull for Sitemap and etc.
     */
    public function initMenuItems()
    {
        Event::listen('pages.menuitem.listTypes', function() {
            return [
                'location-town' => 'Location Town',
                'all-location-towns' => 'All location towns'
            ];
        });

        Event::listen('pages.menuitem.getTypeInfo', function($type) {
            if ($type == 'location-town' || $type == 'all-location-towns') {
                return Town::getMenuTypeInfo($type);
            }
        });

        Event::listen('pages.menuitem.resolveItem', function($type, $item, $url, $theme) {
            if ($type == 'location-town' || $type == 'all-location-towns') {
                return Town::resolveMenuItem($item, $url, $theme);
            }
        });
    }
}
