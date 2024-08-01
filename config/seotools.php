<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults' => [
            'title' => config('app.name'),
            'titleBefore' => false,
            'description' => 'Welcome to the Awoostria archive! Here you can find all the information about our events that have taken place in the past.',
            'separator' => ' - ',
            'keywords' => [
                'awoostria',
                'awoostria history',
                'awoostria archive',
                'archive',
                'austria',
                'furry con',
                'furry convention',
                'convention',
                'furry',
                'austria furries',
                'austrian furries',
                'furries',
                'event',
                'events',
                'furry events',
                'furwalk',
                'fursuit walk',
            ],
            'canonical' => 'full',
            'robots' => 'all',
        ],

        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google' => null,
            'bing' => null,
            'alexa' => null,
            'pinterest' => null,
            'yandex' => null,
            'norton' => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title' => config('app.name'),
            'description' => config('seotools.meta.defaults.description'),
            'url' => null, // Set null for using Url::current(), set false to total remove
            'type' => 'website',
            'site_name' => config('app.name'),
            'locale' => 'en_US',
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card' => 'summary_large_image',
            'site' => '@Awoostria',
            'creator' => '@Awoostria',
            'title' => config('app.name'),
            'description' => config('seotools.meta.defaults.description'),
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title' => config('app.name'),
            'name' => config('app.name'),
            'description' => config('seotools.meta.defaults.description'),
            'url' => 'full',
            'type' => 'WebPage',
            'logo' => 'https://awoostria.at/images/logos/vertical/logo-primary.png',
            'sameAs' => [
                'https://twitter.com/Awoostria',
                'https://t.me/awoostriaannouncements',
                'https://t.me/awoostria',
                'https://youtube.com/@awoostria',
                'https://instagram.com/awoostria',
                'https://ko-fi.com/awoostria',
            ],
        ],
    ],
];
