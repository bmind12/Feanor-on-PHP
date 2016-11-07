<?php

    include_once ROOT. '/models/Display.php';
    include_once ROOT. '/models/Update.php';

    class PortfolioController
    {
        public function actionDisplay($type, $category)
        {

              $categoriesList = array();
              $categoriesList = Display::displayCategories($type);

              $itemsList = array();
              $itemsList = Display::displayItems($type, $category);

              echo '<pre>';
              print_r($categoriesList);
              echo '</pre>';

              echo '<pre>';
              print_r($itemsList);
              echo '</pre>';

              return true;
        }

        public function actionUpdate($type, $category)
        {

            // if ($type == false && $category == false)
            // {
            //     Update::updateAll();
            // }
            // elseif ($category == true && $type == false)
            // {
            //     Update::updateCategory($category);
            // }
            // else
            // {
                Update::updateType($type, $category);
            // }

            return true;
        }
    }
?>
