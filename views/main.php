<?php
$title="Пошук людей";
require_once "layouts/header.php";
?>
    <main class="main_content row align-justify">
    <?php require_once "layouts/slider.php";?>
    <section class="main_info column small-12 medium-7 large-8 row">
        <?php
        $page = isset($_GET['page']) ? $_GET['page']: 1;
        $limit = 5;
        $offset = $limit * ($page) - 5;
        $posts = get_posts($limit, $offset);
        ?>


        <?php foreach ($posts as $post): ?>
        <?php if ($post['post_cat'] == 1 && $post['add_post'] == true):?>
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
                    <span class="birth_day" id="birthday"><?= $sqldate=date('d.m.Y',strtotime($post['birthday']))?></span>
                    <h5 class="last_see_city_title">Місце зникнення:</h5>
                    <span class="last_see_city" id="last_see_city"><?=$post['last_see_city']?></span>
                </div>
            </div>
             <footer class="info_footer row align-justify">
                 <div class="row tags small-9 large-8">
                     <span class="tag_list small-3 medium-3 large-2">Мітки:</span>
                     <a href="category.php?id=<?=$post['post_cat']?>" class="small-4 tag"><?= get_category_title($post['post_cat']);?></a>
                     <a href="subcategory.php?id=<?=$post['post_subcat']?>" class="small-4 tag"><?= get_subcategory_title($post['post_subcat']);?></a>
                 </div>
                 <a class="read_more small-3 large-4" href="../post.php?post_id=<?=$post['p_id']?>">Читати більше</a>
             </footer>
         </article>
            <?php
                elseif(($post['post_cat'] == 4 && $post['add_post'] == true)) :
            ?>
            <article class="column small-12 info_block">
               <header class="info_header row align-justify align-middle">
                 <span class="post_date">Дата <?=date($post['post_date'])?></span>
                 <!--<button class="delete_post">&times;</button>-->
               </header>
                 <div class="info_content row small-12 ">
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
                            <span class="last_see_city" id="last_see_city_material"><?=$post['last_see_city']?></span>
                        </div>
                    </div>
                   <footer class="info_footer row align-justify">
                       <div class="row tags small-9 large-8">
                           <span class="tag_list small-3 medium-3 large-2">Мітки:</span>
                           <a href="category.php?id=<?=$post['post_cat']?>" class="small-4 tag"><?= get_category_title($post['post_cat']);?></a>
                           <a href="subcategory.php?id=<?=$post['post_subcat']?>" class="small-4 tag"><?= get_subcategory_title($post['post_subcat']);?></a>
                       </div>
                       <a class="read_more small-3 large-4" href="../post.php?post_id=<?=$post['p_id']?>">Читати більше</a>
                   </footer>
            </article>
            <?php endif?>
       <?php endforeach ?>
        <nav aria-label="Pagination">
            <ul class="pagination text-center">
                <li class="active" ><a href="#" aria-label="Page 1">1</a></li>
                <li><a href="#" aria-label="Page 2">2</a></li>
                <li><a href="#" aria-label="Page 3">3</a></li>
            </ul>
        </nav>
    </section>
    <?php require "layouts/aside.php"?>

</main>
<?php require "layouts/footer.php"?>