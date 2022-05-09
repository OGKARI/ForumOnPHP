<?php
    require "Database.php";

    $qry = "SELECT * FROM sections";
    $Database = new Database();
    $sectons = $Database->getAll($qry);
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
            <div class="forum_thems_title">Разделы</div>
            <?php if($_SESSION['rule'] == 100):?>
            <Button class="forum_thems_addSec" onclick="window.location.href='add.php'">Добавить раздел</Button>
            <?php endif; ?>  
            <div class="forum_thems_container">
            <?php foreach($sectons as $item): ?>
                <div class="forum_thems_them" onclick="window.location.href='/section.php?id_section=<?=$item["id_sections"]?>'">
                    <h2><?=$item["section_name"]?></h2>
                    <p><?=$item["section_content"]?></p>
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