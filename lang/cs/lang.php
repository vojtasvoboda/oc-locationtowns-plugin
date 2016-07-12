<?php

return [
    'plugin' => [
        'name' => 'Města lokalit',
        'description' => 'Správa měst patřících do lokalit.'
    ],
    'settings' => [
        'label' => 'Města',
        'description' => 'Správa měst patřících do lokalit.'
    ],
    'town' => [
        'title' => 'Mesto',
        'description' => 'Vypíše detail města',
        'slug' => 'Identifikátor',
        'slug_desciption' => 'Najde detail města podle daného identifikátoru.',
    ],
    'towns' => [
        'title' => 'Města',
        'description' => 'Vypíše města dle státu.',
        'state' => 'Filtr státu',
        'state_desciption' => 'Zobrazit pouze města v daném státu.',
        'pagination' => 'Číslo stránky',
        'pagination_description' => 'Tato hodnota určuje na které stránce se uživatel nachází.',
        'per_page' => 'Počet měst na stránku',
        'per_page_validation' => 'Nesprávný formát. Počet měst na stránku zadávejte jako číslo',
        'no_towns' => 'Nebyly nalezeny žádná města',
        'no_towns_description' => 'Zpráva která se zobrazí pokud nebyla nalezena žádná města.',
        'page' => 'Stránka pro zobrazení detailu města',
        'page_description' => 'Název stránky které zobrazuje detail města a povede na ní odkaz.',
    ],
    'form' => [
        'create_town' => 'Vytvořit město',
        'edit_town' => 'Upravit město',
        'preview_town' => 'Náhled města',
        'return_to_list' => 'Zpět na seznam měst',
    ],
    'list' => [
        'manage_towns' => 'Správa měst',
        'new' => 'Nové město',
    ],
    'fields' => [
        'name' => 'Název',
        'state' => 'Stát',
        'url' => 'Identifikátor',
        'excerpt' => 'Výňatek',
        'enabled' => 'Aktivní',
        'description' => 'Popisek',
    ],
];
