
<?php

    $limit = 3;
    $last_limit = 2;

    $imp_posts = get_important_post($limit);
    $last_posts = get_last_post($last_limit);
?>
<aside class="r_menu small-12 column medium-4 large-3 row">
    <h3 class="important_title column">Важливо</h3>
    <section class="important column">
        <?php foreach ($imp_posts as $imp_post): ?>
        <article class="imp_block row align-middle small-12">
            <?php if ($imp_post['post_cat'] == 1 && $imp_post['add_post'] == true) :?>
                <?php if (file_exists('assets/img/uploads/'.$imp_post['photo'])): ?>
                    <img src="assets/img/uploads/<?=$imp_post['photo']?>" alt="" class="small-8 medium-4 large-4">
                <?php else: ?>
                    <img src="assets/img/profile-default.jpg?>" alt="" class="small-8 medium-4 large-4">
                <?php endif?>
            <div class="imp_content column small-12 medium-8 large-8 text-center">
                <h6 class="initials"><?=$imp_post['surname']?> <?=$imp_post['people_name']?> <?=$imp_post['surname_2']?></h6>
                <span class="year"><?= $sqldate=date('d.m.Y',strtotime($imp_post['birthday']))?></span>
            </div>
            <?php endif?>
            <footer class="r_menu_block_footer column small-12">
                <a href="../post.php?post_id=<?=$imp_post['p_id']?>" class="read_more text-right small-12">Читати більше</a>
            </footer>
        </article>
        <?php endforeach?>
    </section>
    <h3 class="column last_title">Останні</h3>
    <section class="last column">
        <?php foreach ($last_posts as $last_post): ?>
            <?php if ($last_post['post_cat'] == 1 && $last_post['add_post'] == true):?>
        <article class="last_block row align-middle small-12 medium-12 large-12">
                <?php if (file_exists('assets/img/uploads/'.$last_post['photo'])): ?>
                    <img src="assets/img/uploads/<?=$last_post['photo']?>" alt="" class="small-8 medium-4 large-4">
                <?php else: ?>
                    <img src="assets/img/profile-default.jpg?>" alt="" class="small-8 medium-4 large-4">
                <?php endif?>
            <div class="last_content column small-12 medium-8 large-8 text-center">
                <h6 class="initials"><?=$last_post['surname']?> <?=$last_post['people_name']?> <?=$last_post['surname_2']?></h6>
                <span class="year"><?= $sqldate=date('d.m.Y',strtotime($last_post['birthday']))?></span>
            </div>
            <footer class="r_menu_block_footer column small-12">
                <a href="../post.php?post_id=<?=$last_post['p_id']?>" class="read_more text-right small-12">Читати більше</a>
            </footer>
        </article>
            <?php elseif ($last_post['post_cat'] == 4 && $last_post['add_post'] == true):?>
                <article class="last_block row align-middle small-12 medium-12 large-12">
                <?php if (file_exists('assets/img/uploads/'.$last_post['photo'])): ?>
                    <img src="assets/img/uploads/<?=$last_post['photo']?>" alt="" class="small-8 medium-4 large-4">
                <?php else: ?>
                    <img src="assets/img/profile-default.jpg?>" alt="" class="small-8 medium-4 large-4">
                <?php endif?>
                <div class="last_content column small-12 medium-8 large-8 text-center">
                    <h6 class="initials"><?=$last_post['type'].": ".$last_post['model_name']?></h6>
                </div>

            <footer class="r_menu_block_footer column small-12">
                <a href="../post.php?post_id=<?=$last_post['p_id']?>" class="read_more text-right small-12">Читати більше</a>
            </footer>
        </article>
            <?php elseif($last_post['add_post'] == true):?>
            <div></div>
            <?php endif?>
        <?php endforeach?>
    </section>
</aside>
<a class="scrollUp small-12">↑</a>
<section class="feedback small-12 medium-8 column align-middle">
    <h5 class="feedback_title small-12 text-center">Зворотній зв'язок</h5>
    <div class="feedback_error column small-12 text-center">Не всі поля заповнені вірно!</div>
    <form action="../functions/feedback.php" method="post" class="feedback_form row align-justify" id="feedback_form">
        <input type="text" class="feedback_name small-12 medium-5" placeholder="Ім'я" name="feedback_name" required>
        <input type="tel" class="feedback_tel small-12 medium-5" placeholder="Телефон" name="feedback_tel" required>
        <input type="email" class="feedback_email small-12" placeholder="Електронна адреса" name="feedback_email" required>
        <textarea class="feedback_text small-12" name="feedback_text" id="feedback_text" cols="10" rows="10" placeholder="Текст" required></textarea>
        <button class="feedback_button button alert small-12" type="submit">Відправити</button>
    </form>
</section>