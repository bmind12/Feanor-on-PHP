<?php

    include_once ROOT. '/models/Categories.php';
    include_once ROOT. '/models/Update.php';
    include_once ROOT. '/models/Items.php';

    class PortfolioController
    {
        public function actionDisplay($type, $category)
        {

              echo '<br>category: ' . $category;
              echo '<br>type: ' . $type;

              $categoriesList = array();
              $categoriesList = Categories::displayCategories($type);

              $itemsList = array();
              $itemsList = Items::displayItems($type, $category);

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
                Update::updateType($type, $category);
            }

            return true;
        }
    }
?>
