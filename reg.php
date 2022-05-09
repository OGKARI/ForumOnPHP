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
    <header class="header">
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
    <section class="modal_registration">
        <div class="container">
            <div class="modal__content">
                <form action="registr.php" method="post">
                    <div class="modal__title">Ввидите ваши данные:</div>
                    <input required placeholder="Name" name="name" type="text" class="modal__input">
                    <input required placeholder="Login" name="login" type="login" class="modal__input">
                    <input required placeholder="Password" name="password" type="password" class="modal__input">
                    <button class="btn">Зарегистрироватся</button>
                </form>
            </div>
        </div>
        </div>
    </section>
    <div class="modal">
        <div class="modal__dialog">
            <div class="modal__content">
                <form action="#">
                    <div class="modal__close" data-close>&times;</div>
                    <div class="modal__title">Ввидите логин и пароль:</div>
                    <input required placeholder="Login" name="login" type="login" class="modal__input">
                    <input required placeholder="Password" name="password" type="password" class="modal__input">
                    <button class="btn">Войти</button>
                    <div class="modal__reg">Не зарегистрированы?</div>
                    <button class="btn">Регистрация</button>
                </form>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>