<?php
    $slider_limit = 10;
    $slider_posts = get_slider($slider_limit);
?>


<div class="slider small-12">
    <?php foreach ($slider_posts as $slider_post): ?>
         <?php if ($slider_post['post_cat'] == 1 && $slider_post['add_post'] == true): ?>
            <a href="../post.php?post_id=<?=$slider_post['p_id']?>" class="slide_1">
                <?php if (file_exists('assets/img/uploads/'.$post['photo'])): ?>
                    <img src="assets/img/uploads/<?=$slider_post['photo']?>" alt="<?=$slider_post['surname']?> <?=$slider_post['people_name']?>">
                <?php else: ?>
                    <img src="../assets/img/profile-default.jpg?>" alt="no_image">
                <?php endif?>
            </a>
        <?php endif?>
    <?php endforeach?>
</div>
