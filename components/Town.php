<?php namespace VojtaSvoboda\LocationTown\Components;

use Cms\Classes\ComponentBase;
use VojtaSvoboda\LocationTown\Models\Town as TownModel;

class Town extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name' => 'vojtasvoboda.locationtown::lang.town.title',
            'description' => 'vojtasvoboda.locationtown::lang.town.description',
        ];
    }

    public function defineProperties()
    {
        return [
            'slug' => [
                'title' => 'vojtasvoboda.locationtown::lang.town.slug',
                'description' => 'vojtasvoboda.locationtown::lang.town.slug_description',
                'default' => '{{ :slug }}',
                'type' => 'string',
            ],
        ];
    }

    public function onRun()
    {
        $this->page['town'] = $this->loadTown();
    }

    protected function loadTown()
    {
        $slug = $this->property('slug');

        return TownModel::where('slug', $slug)->isEnabled()->first();
    }
}