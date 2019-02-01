<?php session_start(); ?>
<?php require_once 'controlers/controler_show_news.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Gamebomb</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style/style_first_site.css" >
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
   <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <a href="#"><img src="icon/gamebomb.png" id="logo"></a>
        <input type="text" id="search" placeholder="Найти что-нибудь..."/>
        
        <div id="tab_reg">
            <?php if($_SESSION['vhod_check'] == false) : ?>
            <a href="view/register.php" class='reg'>Регистрация</a>
            <a href="view/vhod.php" class='reg'>Вход</a>
            <?php else: ?>
            <a href="http://localhost/myBigProject/view/personal_page_user.php?id=<?=$_SESSION['user_id'];?>" class='reg'><?=$_COOKIE['login']?></a>
            <a href='controlers/controler_close_user.php' class="reg">Выйти</a>
             <?php endif; ?>
        </div>
        <div id="table_div" >
            <a href="<?= $_SERVER['SCRIPT_NAME'] . '?tems=Все'; ?>" class="table">Все</a>
            <a href="<?= $_SERVER['SCRIPT_NAME'] . '?tems=Спорт'; ?>" class="table">Спорт</a>
            <a href="<?= $_SERVER['SCRIPT_NAME'] . '?tems=Животные'; ?>" class="table">Животные</a>
            <a href="<?= $_SERVER['SCRIPT_NAME'] . '?tems=Политика'; ?>" class="table">Политика</a>
            <a href="<?= $_SERVER['SCRIPT_NAME'] . '?tems=Технологии'; ?>" class="table">Технологии</a>
        </div>
    </header>


<div id="News">
    <h2 id='title_block_news'>Последние новости</h2>
    <?php
        if($arr_news !== false){
            foreach ($arr_news as $v) {
                echo <<<END
                    <div class="news_content">
                        <img src='{$v['image_puth']}' alt="Картинка"  class="img_news">
                        <p class="date_news">{$v['pub_date']}</p>
                        <a href="http://localhost/myBigProject/view/news_page.php?id_news={$v['id']}" class="name_news" >{$v['news_name']}</a>
                        <p class="title_news" >{$v['news_body']}</p>
                        <span>
                            <i class="fa fa-eye" aria-hidden="true"> {$v['views']}</i>
                            <i class="fa fa-comment-o" aria-hidden="true"> {$v['count_comment']}</i>
                        </span>
                    </div>
END;
            }
        }
        ?>
</div>
</body>
</html>