<?php

    include_once ROOT. '/models/Categories.php';
    include_once ROOT. '/models/Update.php';
    include_once ROOT. '/models/Items.php';

    class PortfolioController
    {
        public function actionDisplay($category, $type)
        {

              $categoriesList = array();
              $categoriesList = Categories::displayCategories($type);

              // $itemsList = array();
              // $itemsList = Items::displayItems($category, $type);

              echo '<pre>';
              print_r($categoriesList);
              echo '</pre>';

              return true;
        }

        public function actionUpdate($category, $type)
        {
            if ($type == false && $category == false)
            {
                Update::updateAll();
            }
            elseif ($category == true && $type == false)
            {
                Update::updateCategory($category);
            }
            else
            {
                Update::updateType($category, $type);
            }

            return true;
        }
    }
?>
