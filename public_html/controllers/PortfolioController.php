<?php

    include_once ROOT. '/models/Display.php';
    include_once ROOT. '/models/Update.php';

    class PortfolioController
    {
        public function actionDisplay($type, $category)
        {

              $menusList = array();
              $menusList = Display::getMenus();

              $categoriesList = array();
              $categoriesList = Display::getCategories($type, $category);

              $itemsList = array();
              $itemsList = Display::getItems($type, $category);

              // echo '<pre>';
              // print_r($categoriesList);
              // echo '</pre>';

              // echo '<pre>';
              // print_r($itemsList);
              // echo '</pre>';

              require_once(ROOT . '/views/portfolio/index.php');

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
