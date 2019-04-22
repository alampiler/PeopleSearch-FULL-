<?php
$title="Пошук людей";

?>

<?php $search_posts = search($search_f)?>

<main class="main_content row align-justify">
    <section class="main_info columns small-12 medium-7 large-8 row">
        <div class="search_info row small-12 align-justify">
            <?php if($search_posts == false): ?>
                <h3 class="text-center small-12 large-12">За вашим запитом нічого не знайдено!</h3>
            <?php else: ?>
            <?php foreach ($search_posts as $search_post) :?>

                <?php if($search_post['post_cat'] == 1 && $search_post['add_post'] == true):?>
                    <a href="../post.php?post_id=<?=$search_post['p_id']?>" class="search_block small-10 medium-5 large-3 column align-middle">
                        <?php if (file_exists('assets/img/uploads/'.$search_post['photo'])): ?>
                            <img src="assets/img/uploads/<?=$search_post['photo']?>" alt="" class="small-12">
                        <?php else: ?>
                            <img src="../assets/img/profile-default.jpg?>" alt="" class="small-12">
                        <?php endif?>
                        <h4 class="initials small-12 text-center" id="initials"><?=$search_post['surname']?> <?=$search_post['people_name']?> <?=$search_post['surname_2']?></h4>
                    </a>
                <?php elseif($search_post['post_cat'] == 4 && $search_post['add_post'] == true):?>
                    <a href="../post.php?post_id=<?=$search_post['p_id']?>" class="search_block small-10 medium-5 large-3 column align-middle">
                        <?php if (file_exists('assets/img/uploads/'.$search_post['photo'])): ?>
                            <img src="assets/img/uploads/<?=$search_post['photo']?>" alt="" class="small-12">
                        <?php else: ?>
                            <img src="../assets/img/profile-default.jpg?>" alt="" class="small-12">
                        <?php endif?>
                        <h4 class="initials small-12 text-center" id="initials"><?=$search_post['model_name']?><br><?=$search_post['type']?></h4>
                    </a>
                <?php endif?>
            <?php endforeach?>
            <? endif?>
        </div>
    </section>
    <?php require_once "layouts/aside.php"?>

</main>
