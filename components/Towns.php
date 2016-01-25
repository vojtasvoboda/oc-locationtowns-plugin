<?php namespace VojtaSvoboda\LocationTown\Components;

use Cms\Classes\ComponentBase;
use Cms\Classes\Page;
use RainLab\Location\Models\State;
use VojtaSvoboda\LocationTown\Models\Town as TownModel;

class Towns extends ComponentBase
{
    private $towns;

    private $townPage;

    public function componentDetails()
    {
        return [
            'name' => 'vojtasvoboda.locationtown::lang.towns.title',
            'description' => 'vojtasvoboda.locationtown::lang.towns.description',
        ];
    }

    public function defineProperties()
    {
        return [
            'pageNumber' => [
                'title' => 'vojtasvoboda.locationtown::lang.towns.pagination',
                'description' => 'vojtasvoboda.locationtown::lang.towns.pagination_description',
                'type' => 'string',
                'default' => '{{ :page }}',
            ],
            'stateFilter' => [
                'title' => 'vojtasvoboda.locationtown::lang.towns.state',
                'description' => 'vojtasvoboda.locationtown::lang.towns.state_description',
                'type' => 'dropdown',
            ],
            'townsPerPage' => [
                'title' => 'vojtasvoboda.locationtown::lang.towns.per_page',
                'type' => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'vojtasvoboda.locationtown::lang.towns.per_page_validation',
                'default' => '10',
            ],
            'noTownsMessage' => [
                'title' => 'vojtasvoboda.locationtown::lang.towns.no_towns',
                'description'  => 'vojtasvoboda.locationtown::lang.towns.no_towns_description',
                'type' => 'string',
                'default' => 'No towns found',
                'showExternalParam' => false,
            ],
            'townPage' => [
                'title' => 'vojtasvoboda.locationtown::lang.towns.page',
                'description' => 'vojtasvoboda.locationtown::lang.towns.page_description',
                'type' => 'dropdown',
                'default' => 'town/detail',
            ],
        ];
    }

    public function onRun()
    {
        // init params
        $this->page['pageParam'] = $this->paramName('pageNumber');
        $this->page['noTownsMessage'] = $this->property('noTownsMessage');
        $this->townPage = $this->page['townPage'] = $this->property('townPage');

        // load towns
        $this->towns = $this->page['towns'] = $this->listTowns();

        // if the page number is not valid, redirect
        if ($pageNumberParam = $this->paramName('pageNumber')) {
            $currentPage = $this->property('pageNumber');

            if ($currentPage > ($lastPage = $this->towns->lastPage()) && $currentPage > 1) {
                return Redirect::to($this->currentPageUrl([$pageNumberParam => $lastPage]));
            }
        }
    }

    protected function listTowns()
    {
        $towns = TownModel::isEnabled()->paginate($this->property('postsPerPage'), $this->property('pageNumber'));

        // set town URL depends on configured town page parameter
        $towns->each(function($post) {
            $post->setUrl($this->townPage, $this->controller);
        });

        return $towns;
    }

    public function getTownPageOptions()
    {
        return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }

    public function getStateFilterOptions()
    {
        return State::orderBy('name')->lists('name', 'id');
    }
}