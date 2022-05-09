<?php
    require "Database.php";
    $qry = "SELECT * FROM topic WHERE id_section = :id_section";
    $Database = new Database();
    $parm = array(
        "id_section" => $_GET["id_section"],
    );
    $topic = $Database->getAll($qry,$parm);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AuthotForum</title>
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    
    <link rel="stylesheet" href="css/style.min.css">
</head>
<body>
    <header class="header forum_header">
        <div class="container">
            <div class="header_container">
                <div class="header_logo_container">
                    <a href="index.php"><img src="img/logo.png" alt="logo"></a> 
                </div>
                <div class="header_nav_container">
                    <div class="header_text ">
                        <button class="header_btn" onclick="window.location.href='forum.php'">Разделы</button>
                    </div>
                    <div class="header_text" >
                        <button class="header_btn" onclick="window.location.href='req.php'">Контакты</button>
                    </div>
                    <div class="header_text">
                        <?php
                            if (isset($_SESSION["user"]))
                                echo '<button class="header_btn_log_unset" onclick="window.location.href=`logout.php`" >',$_SESSION["user"],'</button>';
                            else
                                echo '<button class="header_btn_log">Войти/Зарегистрироватся</button>'; 
                        ?>
                    </div>
                    <?php if($_SESSION['rule'] == 100):?>
                        <div class="header_text ">
                            <button class="header_btn" onclick="window.location.href='panel.php'">Панель управление</button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>   
        </div>
    </header>
    <section class="forum_thems">
        <div class="container">
            <div class="forum_thems_title">Темы</div>
            <Button class="forum_thems_addSec"onclick="window.location.href='/addThems.php?id_section=<?=$_GET['id_section']?>'">Добавить тему</Button>
           
            <div class="forum_thems_container">
                <?php foreach($topic as $item):
                     $_GET["id_topic"] = $item['id_topic'];
                ?> 
                <div class="forum_thems_them" onclick="window.location.href='topic.php?id_topic=<?=$_GET['id_topic']?>'">
                    <h2><?=$item["title_topic"]?></h2>
                    <p><?=$item["content_topic"]?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <div class="modal">
        <div class="modal__dialog">
            <div class="modal__content">
                <form action="login.php" method="post">
                    <div class="modal__close" data-close>&times;</div>
                    <div class="modal__title">Ввидите логин и пароль</div>
                    <input required placeholder="login" name="login" type="login" class="modal__input">
                    <input required placeholder="password" name="password" type="password" class="modal__input">
                    <button class="btn">Войти</button>
                    <div class="modal__reg">Не зарегистрированы?</div>
                    <button class="btn" onclick="window.location.href='reg.php'">Регистрация</button>
                </form>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>