<?php

return [
    'plugin' => [
        'name' => 'Location Towns',
        'description' => 'Manage towns belongs to locations.'
    ],
    'settings' => [
        'label' => 'Towns',
        'description' => 'Manage towns belongs to locations.'
    ],
    'town' => [
        'title' => 'Town',
        'description' => 'Render town detail',
        'slug' => 'Slug',
        'slug_desciption' => 'Look up the town using the supplied slug value.',
    ],
    'towns' => [
        'title' => 'Towns',
        'description' => 'Render state towns.',
        'state' => 'State filter',
        'state_desciption' => 'Show only towns from this state.',
        'pagination' => 'Page number',
        'pagination_description' => 'This value is used to determine what page the user is on.',
        'per_page' => 'Towns per page',
        'per_page_validation' => 'Invalid format of the towns per page value',
        'no_towns' => 'No towns message',
        'no_towns_description' => 'Message to display in the towns list in case if there are no towns. This property is used by the default component partial.',
        'page' => 'Town detail page',
        'page_description' => 'Name of the town page file for the town links. This property is used by the default component partial.',
    ],
];