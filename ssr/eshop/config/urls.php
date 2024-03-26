<?php
return [
    'homepage' => [
        'url' => '/',
        'title' => 'Domov'
    ],

    'shop' =>
    [
        'url' => '/obchod',
        'title' => 'Obchod'
    ],

    'product_detail' => [
        'getPathBuilder' => function ($productId) {
            return "/produkt/$productId";
        },
        'url' => '/produkt/{productId}',
        'title' => 'REPLACE WITH PRODUCT NAME'
    ],

    'about' => [
        'url' => '/o-nas',
        'title' => 'O nás'
    ],

    'log_in' => [
        'url' => '/prihlasit-sa',
        'title' => 'Prihlásiť sa'
    ],

    'register' => [
        'url' => '/vytvorit-ucet',
        'title' => 'Vytvoriť účet'
    ],

    'search_results' => [
        'url' => '/hladat',
        'title' => 'Hľadať'
    ],

    'cart' => [
        'url' => '/kosik',
        'title' => 'Košík'
    ],

    'checkout' => [
        'url' => '/objednat',
        'title' => 'Objednať produkty'
    ],

    'admin_view_products' => [
        'url' => '/admin/produkty',
        'title' => 'Všetky produkty'
    ],

    'admin_new_product' => [
        'url' => '/admin/novy-produkt',
        'title' => 'Vytvoriť produkt'
    ],

    'admin_edit_product' => [
        'getPathBuilder' => function ($productId) {
            return "/admin/upravit-produkt/$productId";
        },
        'url' => '/admin/upravit-produkt/{productId}',
        'title' => 'Upraviť produkt'
    ],
];
