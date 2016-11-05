<?php

    include_once ROOT. '/models/Categories.php';
    include_once ROOT. '/models/Items.php';

    class PortfolioController
    {
        public function actionDisplay($type, $category)
        {
            
            $photosList = array();
            $photosList = Categories::displayCategories($type);
            
            $photosList = array();
            $photosList = Items::displayItems($type, $category);
            
            echo '<pre>';
            print_r($photosList);
            echo '</pre>';
            
            return true;
        }
    }
?>