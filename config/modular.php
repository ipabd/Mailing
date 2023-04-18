<?php
return [
    'path' => base_path() . '/app/Modules',  ///полный путь к директории с модулями
    'base_namespace' => 'App\Modules',  ///базовое пространство имен
    'groupWithoutPrefix' => 'Pub',  ///префикс публичной части

    'groupMidleware' => [   ///посредники добавляемые к маршрутам
        'Admin' => [
            'web' => [''],  ///auth
              'api' => [''] ,  ///auth:api
        ]
    ],

    'modules' => [  ///модули все которые надо обойти
        'Admin' => [
        ],

        'Pub' => [
            'Contact',
            'Home',
        ],
    ]
];