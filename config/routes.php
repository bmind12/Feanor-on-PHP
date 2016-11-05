<?php

    return array(
        
        'main' => 'main/index',
        
        'portfolio/([a-z]+)/([a-z]+)' => 'portfolio/display/$1/$2', //moved up before portfolio
        'portfolio/photos' => 'portfolio/display/photos/portraits',
        'portfolio/paintings' => 'portfolio/display/paintings/oil',
        
        );

?>