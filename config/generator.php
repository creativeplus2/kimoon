<?php

return [
    /**
     * If any input file(image) as default will used options below.
     */
    'image' => [
        /**
         * Path for store the image.
         *
         * avaiable options:
         * 1. public
         * 2. storage
         */
        'path' => 'storage',

        /**
         * Will used if image is nullable and default value is null.
         */
        'default' => 'https://via.placeholder.com/350?text=No+Image+Avaiable',

        /**
         * Crop the uploaded image using intervention image.
         */
        'crop' => true,

        /**
         * When set to true the uploaded image aspect ratio will still original.
         */
        'aspect_ratio' => true,

        /**
         * Crop image size.
         */
        'width' => 500,
        'height' => 500,
    ],

    'format' => [
        /**
         * Will used to first year on select, if any column type year.
         */
        'first_year' => 1900,

        /**
         * If any date column type will cast and display used this format, but for input date still will used Y-m-d format.
         *
         * another most common format:
         * - M d Y
         * - d F Y
         * - Y m d
         */
        'date' => 'd/m/Y',

        /**
         * If any input type month will cast and display used this format.
         */
        'month' => 'm/Y',

        /**
         * If any input type time will cast and display used this format.
         */
        'time' => 'H:i',

        /**
         * If any datetime column type or datetime-local on input, will cast and display used this format.
         */
        'datetime' => 'd/m/Y H:i',

        /**
         * Limit string on index view for any column type text or longtext.
         */
        'limit_text' => 100,
    ],

    /**
     * It will used for generator to manage and showing menus on sidebar views.
     *
     * Example:
     * [
     *   'header' => 'Main',
     *
     *   // All permissions in menus[] and submenus[]
     *   'permissions' => ['test view'],
     *
     *   menus' => [
     *       [
     *          'title' => 'Main Data',
     *          'icon' => '<i class="bi bi-collection-fill"></i>',
     *          'route' => null,
     *
     *          // permission always null when isset submenus
     *
     *
     *          // All permissions on submenus[] and will empty[] when submenus equals to []
     *          'permissions' => ['test view'],
     *
     *          'submenus' => [
     *                 [
     *                     'title' => 'Tests',
     *                     'route' => '/tests',
     *                     'permission' => 'test view'
     *                  ]
     *               ],
     *           ],
     *       ],
     *  ],
     *
     * This code below always changes when you use a generator and maybe you must lint or format the code.
     */
    'sidebars' => [
        [
            'header' => 'Members',
            'permissions' => [
                'member view'
            ],
            'menus' => [
                [
                    'title' => 'Members',
                    'icon' => '<i data-feather="users"></i>',
                    'route' => '/members',
                    'permission' => 'member view',
                    'permissions' => [],
                    'submenus' => []
                ]
            ]
        ],
        [
            'header' => 'Products',
            'permissions' => [
                'product view'
            ],
            'menus' => [
                [
                    'title' => 'Products',
                    'icon' => '<i data-feather="box"></i>',
                    'route' => '/products',
                    'permission' => 'product view',
                    'permissions' => [],
                    'submenus' => []
                ]
            ]
        ],
        [
            'header' => 'Master',
            'permissions' => [
                'setting view',
                'role & permission view',
                'user view',
                'setting app view',
                'campus view',
                'ruang kelas view',
                'asrama view',
                'kompetensi view',
                'bank view',
                'account bank view',
                'product category view',
                'product unit view',
                'sub category view'
            ],
            'menus' => [
                [
                    'title' => 'Master Data',
                    'icon' => '<i data-feather="list"></i>',
                    'route' => null,
                    'uri' => [
                        'bank*',
                        'account-banks*',
                        'product-categories*',
                        'sub-categories*',
                        'product-unit*'
                    ],
                    'permissions' => [
                        'bank view',
                        'account bank view',
                        'product category view',
                        'product unit view',
                        'sub category view'
                    ],
                    'submenus' => [
                        [
                            'title' => 'Bank',
                            'route' => '/banks',
                            'permission' => 'bank view'
                        ],
                        [
                            'title' => 'Account Bank',
                            'route' => '/account-banks',
                            'permission' => 'account bank view'
                        ],
                        [
                            'title' => 'Categories',
                            'route' => '/product-categories',
                            'permission' => 'product category view'
                        ],
                        [
                            'title' => 'Sub Categories',
                            'route' => '/sub-categories',
                            'permission' => 'sub category view'
                        ],
                        [
                            'title' => 'Units',
                            'route' => '/product-units',
                            'permission' => 'product unit view'
                        ]
                    ]
                ]
            ]
        ],
        [
            'header' => 'Wilayah',
            'permissions' => [
                'province view',
                'kabkot view',
                'kecamatan view',
                'kelurahan view'
            ],
            'menus' => [
                [
                    'title' => 'Data Wilayah',
                    'icon' => '<i data-feather="map"></i>',
                    'route' => null,
                    'uri' => [
                        'province*',
                        'kabkot*',
                        'kecamatan*',
                        'kelurahan*'
                    ],
                    'permission' => null,
                    'permissions' => [
                        'province view',
                        'kabkot view',
                        'kecamatan view',
                        'kelurahan view'
                    ],
                    'submenus' => [
                        [
                            'title' => 'Provinsi',
                            'route' => '/provinces',
                            'permission' => 'province view'
                        ],
                        [
                            'title' => 'Kabupaten/Kota',
                            'route' => '/kabkots',
                            'permission' => 'kabkot view'
                        ],
                        [
                            'title' => 'Kecamatan',
                            'route' => '/kecamatans',
                            'permission' => 'kecamatan view'
                        ],
                        [
                            'title' => 'Kelurahan',
                            'route' => '/kelurahans',
                            'permission' => 'kelurahan view'
                        ]
                    ]
                ]
            ]
        ],
        [
            'header' => 'Utilities',
            'permissions' => [
                'setting view',
                'role & permission view',
                'user view',
                'setting app view'
            ],
            'menus' => [
                [
                    'title' => 'Utilities',
                    'icon' => '<i data-feather="settings"></i>',
                    'route' => null,
                    'uri' => [
                        'settings*',
                        'users*',
                        'roles*',
                        'setting-apps*'
                    ],
                    'permissions' => [
                        'setting view',
                        'role & permission view',
                        'user view',
                        'setting app view'
                    ],
                    'submenus' => [
                        [
                            'title' => 'Settings App',
                            'route' => '/settings',
                            'permission' => 'setting view'
                        ],
                        [
                            'title' => 'Users',
                            'route' => '/users',
                            'permission' => 'user view'
                        ],
                        [
                            'title' => 'Roles & permissions',
                            'route' => '/roles',
                            'permission' => 'role & permission view'
                        ],
                        [
                            'title' => 'Setting Apps',
                            'route' => '/setting-apps',
                            'permission' => 'setting app view'
                        ]
                    ]
                ]
            ]
        ]
    ]
];
