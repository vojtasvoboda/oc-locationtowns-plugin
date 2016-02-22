<?php

return [
    'plugin' => [
        'name' => 'Cidades',
        'description' => 'Gerenciar cidades relacionadas a locais.'
    ],
    'settings' => [
        'label' => 'Cidades',
        'description' => 'Gerenciar cidades.'
    ],
    'town' => [
        'title' => 'Cidade',
        'description' => 'Exibir detalhes de uma cidade.',
        'slug' => 'Slug',
        'slug_desciption' => 'Buscar cidade usando a slug fornecida.',
    ],
    'towns' => [
        'title' => 'Cidades',
        'description' => 'Exibir cidades de um estado.',
        'state' => 'Filtrar por estado',
        'state_desciption' => 'Exibir apenas cidades deste estado.',
        'pagination' => 'Página',
        'pagination_description' => 'Determinar a página atual.',
        'per_page' => 'Cidades por página',
        'per_page_validation' => 'Formato inválido de cidades por página',
        'no_towns' => 'Mensagem para lista vazia',
        'no_towns_description' => 'Mensagem a ser apresentada na lista de cidades caso ela esteja vazia. Esta propriedade é usada pelo bloco default do componente.',
        'page' => 'Página de detalhes da cidade',
        'page_description' => 'Nome de arquivo da página de cidades para a qual os links de cidade devem ser gerados. Esta propriedade é usada pelo bloco default do componente.',
    ],
];
