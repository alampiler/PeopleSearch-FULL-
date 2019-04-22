<?php
$post_id = $_GET['post_id'];
$category_id = $_GET['post_id'];
if(!is_numeric($post_id)) exit();
session_start();
error_reporting(0);
?>

<?php
require_once "layouts/header.php";
?>

<main class="main_content row align-justify">
    <?php require_once "layouts/slider.php";?>
    <?php $post = get_post_by_id($post_id)?>
    <section class="main_info columns small-12 medium-7 large-8 row">
        <article class="column small-12 info_block">
            <header class="info_header row align-justify align-middle">
                <span class="post_date">Дата 00.00.0000</span>
                <?php if(!$_SESSION["admin"]):?>
                <div></div>
                <?php else: ?>
                <button class="delete_post" data-open="deleteRequest">&times;</button>
                <?php endif?>
            </header>
            <div class="info_content row small-12">
                <?php if (file_exists('assets/img/uploads/'.$post['photo'])): ?>
                    <img src="assets/img/uploads/<?=$post['photo']?>" alt="" class="info_img small-8 large-4">
                <?php else: ?>
                    <img src="assets/img/profile-default.jpg?>" alt="" class="info_img small-8 large-4">
                <?php endif?>
                <?php if($post['post_cat'] == 1): ?>
                <div class="info_basic column small-12 large-8">
                    <h4 class="initials" id="initials"><?=$post['surname']?> <?=$post['people_name']?> <?=$post['surname_2']?></h4>
                    <h5 class="birth_day_title">Дата народження:</h5>
                    <span class="birth_day" id="birth_day"><?= $sqldate=date('d.m.Y',strtotime($post['birthday']))?></span>
                    <h5 class="last_see_city_title">Місце зникнення:</h5>
                    <span class="last_see_city" id="last_see_city"><?=$post['last_see_city']?></span>
                    <h5 class="last_see_title">Дата і час останньої контакту:</h5>
                    <span class="last_see_date" id="last_see_date"><?=$sqldate=date('d.m.Y',strtotime($post['last_see_date']))?></span>
                    <span class="last_see_time" id="last_see_time"><?=$post['last_see_time']?></span>
                    <h5 class="sex_title">Стать:</h5>
                    <span class="sex" id="sex"><?=$post['sex']?></span>
                    <h5 class="contacts_tel_title">Контактний телефон:</h5>
                    <span class="contacts_tel" id="contacts_tel"><?=$post['tel']?></span>
                </div>
                <?php else:?>
                <div class="info_basic column small-12 large-8">
                    <h4 class="model_name" id="modelName"><?=$post['model_name']?></h4>
                    <h5 class="type_title">Тип:</h5>
                    <span class="type" id="type"><?=$post['type']?></span>
                    <h5 class="last_see_city_title">Місце зникнення:</h5>
                    <span class="last_see_city" id="last_see_city_material"><?= $sqldate=date('d.m.Y',strtotime($post['birthday']))?></span>
                    <h5 class="last_see_title">Дата і час останньої контакту:</h5>
                    <span class="last_see_date" id="last_see_date"><?=$sqldate=date('d.m.Y',strtotime($post['last_see_date']))?></span>
                    <span class="last_see_time" id="last_see_time"><?=$post['last_see_time']?></span>
                    <h5 class="contacts_tel_title">Контактний телефон:</h5>
                    <span class="contacts_tel" id="contacts_tel"><?=$post['tel']?></span>
                </div>
               <?php endif?>
                <div class="info_text columns small-12">
                    <h5 class="spec_features">Особливі прикмети:</h5>
                    <p class="spec_features-text" id="spec_features"><?=$post['signs_text']?></p>
                    <h5 class="last_place_to_stay">Останнє місце перебування:</h5>
                    <p class="last_place_to_stay-text" id="last_place_to_stay"><?=$post['last_see_text']?></p>
                </div>
            </div>
            <footer class="info_footer row align-justify">
                <div class="row tags small-12 large-8">
                    <span class="tag_list small-2 medium-2 large-2">Мітки:</span>
                    <a href="category.php?id=<?=$post['post_cat']?>" class="small-6 tag medium-5 large-4"><?= get_category_title($post['post_cat']);?></a>
                    <a href="subcategory.php?id=<?=$post['post_subcat']?>" class="small-4 tag"><?= get_subcategory_title($post['post_subcat']);?></a>
                </div>
            </footer>
        </article>
    </section>
    <?php require_once "layouts/aside.php"?>

</main>
<div class="reveal row requestModal align-spaced" id="deleteRequest" data-reveal>
    <h4 class="requestModal_title small-12 text-center">Підтвердіть видалення</h4>
    <a href="functions/add_del.php?del_id=<?=$post['p_id']?>" class="button primary small-12 medium-5">Видалити</a>
    <button class="button primary small-12 medium-5" data-close>Відмінити</button>
    <button class="close-button" data-close aria-label="Close reveal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!--<a href="functions/add_del.php?del_id=<?=$post['p_id']?>"></a>-->
<?php require_once "layouts/footer.php"?>
