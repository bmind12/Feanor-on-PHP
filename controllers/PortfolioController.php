<?php

    include_once ROOT. '/models/Categories.php';
    include_once ROOT. '/models/Items.php';

    class PortfolioController
    {
        public function actionDisplay($type, $category)
        {

            $categoriesList = array();
            $categoriesList = Categories::displayCategories($type);

            // $itemsList = array();
            // $itemsList = Items::displayItems($type, $category);

            echo '<pre>';
            print_r($categoriesList);
            echo '</pre>';

            return true;
        }
    }
?>
