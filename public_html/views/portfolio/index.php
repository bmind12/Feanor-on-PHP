
    <?php include_once(ROOT . '/views/header.php') ?>

        <div id="top">
            <div id="menu-bar">
                <ul>
                    <?php foreach ($menusList as $menu):?>
                        <li>
                            <a href="http://feanor.cz/<?=$menu['path']?>/">
                                <?= $menu['name'] ?></a>
                        </li>
                    <?php endforeach;?>
                    <!-- <li id="selected"><a href="http://feanor.cz/portfolio/portraits-photo">Photo</a></li> -->
                </ul>
            </div>
        </div>
        <div id="albums-bar-shape">
                <div class="albums-bar">
                    <ul>
                        <?php foreach ($categoriesList as $category):?>
                            <li>
                                <a href="http://feanor.cz/portfolio/<?=$category['type']?>/<?=$category['name']?>"
                                    id="<?=$category['selected']?>">
                                    <?= $category['description'] ?></a>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </div>
        </div>
        <div id="album">
            <?php foreach ($itemsList as $jpg):?>
                <?php if (strpos($jpg['name'], 't')):?>
                    <div class="img-crop">
                        <a class="fancybox" rel="group" href="<?= str_replace('t.jpg', '.jpg', $jpg['path']) ?>">
                            <img class="<?=$jpg['crop']?>" src="<?= $jpg['path'] ?>"
                                alt="image <?= $jpg['name'] ?>" width="300"
                                height="200">
                        </a>
                    </div>
                <?php endif;?>
            <?php endforeach;?>
        </div>
    </body>
</html>
