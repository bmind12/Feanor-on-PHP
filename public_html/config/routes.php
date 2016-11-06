<?php

    return array(

        'main' => 'main/index',

        'portfolio/update/([a-z]+)/([a-z]+)' => 'portfolio/update/$1/$2',
        'portfolio/update/([a-z]+)' => 'portfolio/update/$1',
        'portfolio/update' => 'portfolio/update',

        'portfolio/([a-z]+)/([a-z]+)' => 'portfolio/display/$1/$2', //moved up before portfolio

        'portfolio/photos' => 'portfolio/display/photos/portraits',
        'portfolio/paintings' => 'portfolio/display/paintings/oil',

        );

?>
