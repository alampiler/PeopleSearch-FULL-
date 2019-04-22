
<?php
include 'database/db.php';

if(!$_SESSION["admin"]){
    die ('Доступ заборонено');
    session_destroy();
}


else session_start();
?>

<?php
    $page = isset($_GET['page']) ? $_GET['page']: 1;
    $limit = 100;
    $offset = $limit * ($page) - 100;
    $posts = get_posts($limit, $offset);



?>

<header class="admin_header small-12 text-center">
    <a href="?action=main">Головна</a>
    <span style="color: #fff">|</span>
    <a href="../functions/logout.php">Вихід</a>
</header>
<main class="admin_panel">
    <div class="admin_menu row align-center small-12 ">
        <button class="admin_people small-5 text-center active">Люди</button>
        <button class="admin_material small-5 text-center">Матеріальні цінності</button>
    </div>
    <div class="admin_content column small-12 medium-8">
        <div class="admin_people_content row small-12 align-center active">
            <?php foreach ($posts as $post): ?>
                <?php if ($post['post_cat'] == 1 && $post['add_post'] == false):?>
                <article class="column small-12 info_block">
                    <header class="info_header row align-justify align-middle">
                        <span class="post_date">Дата <?=date($post['post_date'])?></span>
                        <!--<button class="delete_post">&times;</button>-->
                    </header>
                        <div class="info_content row small-12">
                            <?php if (file_exists('assets/img/uploads/'.$post['photo'])): ?>
                                <img src="assets/img/uploads/<?=$post['photo']?>" alt="" class="info_img small-8 large-4">
                            <?php else: ?>
                                <img src="assets/img/profile-default.jpg?>" alt="" class="info_img small-8 large-4">
                            <?php endif?>
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
                            <div class="info_text columns small-12">
                                <h5 class="spec_features">Особливі прикмети:</h5>
                                <p class="spec_features-text" id="spec_features"><?=$post['signs_text']?></p>
                                <h5 class="last_place_to_stay">Останнє місце перебування:</h5>
                                <p class="last_place_to_stay-text" id="last_place_to_stay"><?=$post['last_see_text']?></p>
                            </div>
                        </div>
                    <footer class="info_footer row align-justify">
                        <div class="row tags small-9 large-8">
                            <span class="tag_list small-2 medium-3 large-2">Мітки:</span>
                            <a href="category.php?id=<?=$post['post_cat']?>" class="small-4 tag"><?= get_category_title($post['post_cat']);?></a>
                            <a href="subcategory.php?id=<?=$post['post_subcat']?>" class="small-4 tag"><?= get_subcategory_title($post['post_subcat']);?></a>
                        </div>
                        <div class="admin_buttons small-12 row" >
                            <button  class="good small-6 text-center" data-open="addRequest">Приняти</button >
                            <button class="bad small-6 text-center"  data-open="deleteRequest"> Відхилити</button >
                        </div >
                    </footer>
                </article>
                <?php endif?>
            <?php endforeach ?>
        </div >
        <div class="admin_material_content row small-12 align-center" >
            <?php foreach ($posts as $post): ?>
                <?php if ($post['post_cat'] == 4 && $post['add_post'] == false):?>
                <article class="column small-12 info_block">
                    <header class="info_header row align-justify align-middle">
                        <span class="post_date">Дата <?=date($post['post_date'])?></span>
                        <!--<button class="delete_post">&times;</button>-->
                    </header>
                        <div class="info_content row small-12">
                            <?php if (file_exists('assets/img/uploads/'.$post['photo'])): ?>
                                <img src="assets/img/uploads/<?=$post['photo']?>" alt="" class="info_img small-8 large-4">
                            <?php else: ?>
                                <img src="assets/img/profile-default.jpg?>" alt="" class="info_img small-8 large-4">
                            <?php endif?>
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
                            <div class="info_text columns small-12">
                                <h5 class="spec_features">Особливі прикмети:</h5>
                                <p class="spec_features-text" id="spec_features"><?=$post['signs_text']?></p>
                                <h5 class="last_place_to_stay">Останнє місце перебування:</h5>
                                <p class="last_place_to_stay-text" id="last_place_to_stay"><?=$post['last_see_text']?></p>
                            </div>
                        </div>
                    <footer class="info_footer row align-justify">
                        <div class="row tags small-9 large-8">
                            <span class="tag_list small-2 medium-3 large-2">Мітки:</span>
                            <a href="category.php?id=<?=$post['post_cat']?>" class="small-4 tag"><?= get_category_title($post['post_cat']);?></a>
                            <a href="subcategory.php?id=<?=$post['post_subcat']?>" class="small-4 tag"><?= get_subcategory_title($post['post_subcat']);?></a>
                        </div>
                        <div class="admin_buttons small-12 row" >
                            <button  class="good small-6 text-center" data-open="addRequest">Приняти</button >
                            <button class="bad small-6 text-center"  data-open="deleteRequest"> Відхилити</button >
                        </div >
                    </footer>
                </article>
                <?php endif?>
                <div class="reveal row requestModal adminModal align-spaced" id="addRequest" data-reveal>
                    <h4 class="requestModal_title small-12 text-center">Підтвердіть додавання</h4>
                    <form method="post" action="../functions/add_del.php" class="small-12 medium-5 center" >
                        <a href="../functions/add_del.php?red_id=<?=$post['p_id']?>" name="add" class="button primary" >Додати</a>
                    </form >
                    <button class="button primary small-12 medium-5" data-close>Відмінити</button>
                    <button class="close-button" data-close aria-label="Close reveal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="reveal row requestModal adminModal align-spaced" id="deleteRequest" data-reveal>
                    <h4 class="requestModal_title small-12 text-center">Підтвердіть видалення</h4>
                    <form method="post" action="../functions/add_del.php" class="small-12 medium-5 text-center"  >
                        <a href="../functions/add_del.php?del_id=<?=$post['p_id']?>" name="del" class="button primary" >Видалити</a>
                    </form  class="small-12 medium-5 ">
                    <div class=" small-12 medium-5 text-center">
                        <button class="button primary" data-close>Відмінити</button>
                    </div>

                    <button class="close-button" data-close aria-label="Close reveal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


            <?php endforeach ?>
        </div>
    </div>
</main>

