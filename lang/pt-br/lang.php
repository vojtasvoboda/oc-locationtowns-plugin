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
    'form' => [
        'create_town' => 'Inserir Cidade',
        'edit_town' => 'Editar Cidade',
        'preview_town' => 'Visualizar Cidade',
        'return_to_list' => 'Retornar à lista de cidades',
    ],
    'list' => [
        'manage_towns' => 'Gerenciar cidades',
        'new' => 'Nova cidade',
    ],
    'fields' => [
        'name' => 'Nome',
        'state' => 'Estado',
        'url' => 'Ident',
        'excerpt' => 'Resumo',
        'enabled' => 'Habilitada',
        'description' => 'Descrição',
    ],
];
