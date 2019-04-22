<?php include 'database/db.php';?>
<?php include 'functions/functions.php'; ?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <title>PeopleSearch</title>
    <meta charset="UTF-8">
    <meta name="description" content="Описания">
    <meta name="theme-color" content="#BD744E">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/ico" href="#">
    <link rel="stylesheet" href="assets/css/libs.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
<header class="header">
    <div class="header_top_menu row align-justify align-middle">
        <div class="row small-12 medium-7 large-6 telephones align-justify">
            <span class="tel_img column medium-1 large-1"></span>
            <span class="tel column small-12 medium-5 large-5">+38 (096) 580 76 15</span>
            <span class="tel column small-12 medium-5 large-5">+38 (096) 580 76 15</span>
        </div>
        <?php if($_SESSION["admin"]):?>
        <div class="admin-check small-12 medium-1 text-center">
        <a href="peoplesearch?action=admin_panel" style="color: #fff;">ADMIN</a>
        </div>
        <?php endif?>
        <div class="row small-12 medium-5 large-5 social_icons align-right">
            <a href="#" class="social_fb social" title="facebook"></a>
            <a href="#" class="social_tl social" title="telegram"></a>
            <a href="#" class="social_tw social" title="twitter"></a>
            <a href="#" class="social_vb social" title="viber"></a>
        </div>
    </div>
    <div class="header_middle row align-justify align-middle">
        <div class="column logo_block small-12 medium-6 large-6">
            <div class="logo small-6 medium-6 large-4">
                <img src="assets/img/logo.png" alt="logo" title="logo">
            </div>
        </div>
        <div class="column request small-12 medium-3 large-2 text-right">
            <button class="button primary request_btn" data-open="requestModal">Подати заявку</button>
        </div>
    </div>
    <nav class="header_menu row align-center">
        <form class="row small-12 medium-12 large-12 search_form" method="post" action="peoplesearch?action=search">
            <?php $search_f=$_POST['search'];?>
            <input type="search" placeholder="Пошук" name="search" id="search" class="search column small-9 medium-10 large-11">
            <button class="button search_btn column small-3 medium-2 large-1" type="submit">Пошук</button>
        </form>
        <div class="column small-12 medium-12 large-12 main_menu">
            <ul class="dropdown medium-vertical large-horizontal menu" data-responsive-menu="accordion large-dropdown">
                <li class="is-active">
                    <a href="peoplesearch?action=main" class="home">Головна</a>
                </li>
                <?php
                $categories = get_categories();
                $subcategories = get_sub_categories();
                ?>
                <?php if (count($categories) === 0): ?>
                    <li>
                        <a href="#" class="search_p">Добавити категорію</a>
                    </li>
                <?php else:?>
                    <?php foreach($categories as $category): ?>
                    <?php if($category["cat_id"] == 1):?>
                        <li>
                            <a href="/category.php?id=<?=$category["cat_id"]?>" class="search_p"><?=$category["cat_title"]?></a>
                            <ul class="vertical menu">
                                <li><a href="/subcategory.php?id=<?=15?>">Дорослі</a></li>
                                <li><a href="/subcategory.php?id=<?=16?>">Діти</a></li>
                                <li><a href="/subcategory.php?id=<?=17?>">Зона ООС</a></li>
                            </ul>
                    <?php elseif($category["cat_id"] == 4): ?>
                            <li>
                            <a href="/category.php?id=<?=$category["cat_id"]?>" class="search_p"><?=$category["cat_title"]?></a>
                            <ul class="vertical menu">
                                <li><a href="/subcategory.php?id=<?=18?>">Транспортні засоби</a></li>
                                <li><a href="/subcategory.php?id=<?=19?>">Коштовності</a></li>
                                <li><a href="/subcategory.php?id=<?=20?>">Мобільні телефони</a></li>
                                <li><a href="/subcategory.php?id=<?=21?>">Зброя</a></li>
                            </ul>
                        </li>
                    <?php endif;?>
                    </li>

                <?php endforeach; ?>


                <?php endif; ?>

                <li>
                    <a href="peoplesearch?action=about" class="about">Про нас</a>
                </li>
                <li>
                    <a href="peoplesearch?action=faq" class="faq">Запитання і відповіді</a>
                </li>
            </ul>
        </div>
    </nav>
</header>


