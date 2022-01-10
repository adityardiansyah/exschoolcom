<?php

return [
    'meta'      => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => " - Your All in One Event Partner Solution", // set false to total remove
            'description'  => 'Media Edukasi, Informasi dan Partnership Event Sekolah, Siapapun bisa uploud event di sekolahnya dengan GRATIS', // set false to total remove
            'separator'    => '',
            'keywords'     => ['media partner', 'media partnership sekolah','partner lomba','partner event','partnership sekolah','partnership event','informasi lomba', 'informasi lomba sekolah','informasi lomba sekolah 2018', 'motivasi diri', 'motivasi belajar','motivasi','motivasi pemimpin','qoute','kumpulan motivasi'],
            'canonical'    => null, // Set null for using Url::current(), set false to total remove
        ],

        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
        ],
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Your All in One Event Partner Solution', // set false to total remove
            'description' => 'Media Edukasi, Informasi dan Partner Event Dunia Sekolah dan Luar Sekolah, Tempat berkarya anak bangsa untuk membagikan ilmunya & Uploud Event secara GRATIS', // set false to total remove
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => 'website',
            'site_name'   => 'ex-school.com',
            'images'      => ['https://i.imgur.com/OhG5LI3.png'],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
          'card'        => 'summary',
          'site'        => '@exschoolcom',
        ],
    ],
];
