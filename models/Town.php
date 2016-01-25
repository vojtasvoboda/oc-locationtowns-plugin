<?php namespace VojtaSvoboda\LocationTown\Models;

use URL;
use Model;

/**
 * Town Model
 */
class Town extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'vojtasvoboda_locationtown_towns';

    public $rules = [
        'name' => 'required',
        'slug' => 'required|url',
        'is_enabled' => 'boolean'
    ];

    protected $fillable = ['name', 'slug', 'description', 'is_enabled'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public $belongsTo = [
        'state' => 'RainLab\Location\Models\State'
    ];

    public function findOneBySlug($slug, $params = [])
    {
        $params += [
            'slug' => $slug
        ];

        return $this->where($params)->first();
    }

    /**
     * Sets the "url" attribute with a URL to this object
     *
     * @param string $pageName
     * @param Cms\Classes\Controller $controller
     */
    public function setUrl($pageName, $controller)
    {
        $params = [
            'id' => $this->id,
            'slug' => $this->slug,
        ];

        return $this->url = $controller->pageUrl($pageName, $params);
    }

    public function scopeIsEnabled($query)
    {
        return $query->where('is_enabled', true);
    }

    //--- pages.menuitem handlers

    /**
     * Handler for the pages.menuitem.getTypeInfo event.
     *
     * @param string $type Specifies the menu item type
     *
     * @return array Returns an array
     */
    public static function getMenuTypeInfo($type)
    {
        $result = [];

        if ($type == 'location-town') {

            $references = [];
            $towns = self::orderBy('name')->get();
            foreach ($towns as $town) {
                $town->url = $town->slug;
                $references[$town->id] = $town->name;
            }

            $result = [
                'references'   => $references,
                'nesting'      => false,
                'dynamicItems' => false
            ];
        }

        if ($type == 'all-location-towns') {
            $result = [
                'dynamicItems' => true
            ];
        }

        return $result;
    }

    /**
     * Handler for the pages.menuitem.resolveItem event.
     *
     * @param \RainLab\Pages\Classes\MenuItem $item Specifies the menu item.
     * @param \Cms\Classes\Theme $theme Specifies the current theme.
     * @param string $url Specifies the current page URL, normalized, in lower case
     * The URL is specified relative to the website root, it includes the subdirectory name, if any.
     *
     * @return mixed Returns an array. Returns null if the item cannot be resolved.
     */
    public static function resolveMenuItem($item, $url, $theme)
    {
        $result = null;

        if ($item->type == 'location-town') {

            $town = self::where('id', $item->reference)->first();
            $state = $town->state;
            $stateCode = $state->code;

            $result = [];
            $result['url'] = URL::to('/kontakty/' . $stateCode . '/' . $town->slug);
            $result['isActive'] = false;
            $result['mtime'] = $town->updated_at;
        }
        elseif ($item->type == 'all-location-towns') {
            $result = [
                'items' => []
            ];

            $towns = self::orderBy('name')->get();
            foreach ($towns as $town) {
                $state = $town->state;
                $stateCode = $state->code;
                $townItem = [
                    'title' => $town->name,
                    'url'   => URL::to('/kontakty/' . $stateCode . '/' . $town->slug),
                    'mtime' => $town->updated_at,
                    'isActive' => false,
                ];

                $result['items'][] = $townItem;
            }
        }

        return $result;
    }

}