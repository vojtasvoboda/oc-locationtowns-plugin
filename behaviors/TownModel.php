<?php


namespace VojtaSvoboda\LocationTown\Behaviors;


use System\Classes\ModelBehavior;
use VojtaSvoboda\LocationTown\Models\Town;

class TownModel extends ModelBehavior
{
    /**
     * Constructor
     */
    public function __construct($model)
    {
        parent::__construct($model);

        $guarded = $model->getGuarded();

        if (count($guarded) === 1 && $guarded[0] === '*') {
            $model->addFillable([
                'town',
                'town_id',
                'town_slug',
            ]);
        }

        $model->belongsTo['town'] = [\VojtaSvoboda\LocationTown\Models\Town::class];
    }

    public function getTownOptions()
    {
        return Town::getNameList($this->model->state_id);
    }

    /**
     * Sets the "town" relation with the slug specified, model lookup used.
     *
     * @param string $slug
     */
    public function setTownSlugAttribute($slug)
    {
        if (!$town = Town::whereSlug($slug)->first()) {
            return;
        }

        $this->model->town = $town;
    }

    /**
     * Mutator for "town_slug" attribute.
     * @return string
     */
    public function getTownSlugAttribute()
    {
        return $this->model->town ? $this->model->town->slug : null;
    }

    /**
     * Ensure an integer value is set, otherwise nullable.
     */
    public function setTownIdAttribute($value)
    {
        $this->model->attributes['town_id'] = $value ?: null;
    }
}