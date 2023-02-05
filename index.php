<?php
    session_start();
    $auth = $_SESSION['auth'] ?? null;
    include('functions.php');
 ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>SPA Главная</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<header>
<div class="headWrapper">
    <div class="logo">
        <h1>Спа у дома</h1>
      </div>  
    <div class="headerDiv">
        <span>
            <img class="logoOut" src="assets/user-logo.png">
            <?php 
                if(!$auth){echo '<a href="login.php">войти на сайт</a>';}
                else {
                    echo $_SESSION['currentUser'];
                    echo '<a href="logout.php"><img class="logoOut" src="assets/exit-logo-white_bckgr.png"></a>';
                };
            ?>
        </span>
    </div>
</div>
</header>
    <div class="personalInfo">
    <?php
            $secsTillBirthDay = $_SESSION['dob'] - time();   

            if($auth && $secsTillBirthDay > 0 && $secsTillBirthDay < 2*24*60*60){
                echo '</br>До вашего дня рождения <strong>['.date("d.m.Y", $_SESSION['dob']).']</strong>: '.seconds2human($secsTillBirthDay, 1);
            }elseif($auth && date("md", time()) === date("md", $_SESSION['dob']) ){
                $deadline = $_SESSION['firstTime']+3600*24;
                
                $secs = $deadline - time();
                $h = (int)($secs/3600)%24;
                $m = (int)($secs/60) % 60;
                $s = $secs % 60;

                echo '<h3>Персональная скидка на все услуги 5%</h3>';
                echo '<p>До истечения персональной скидки осталось: <strong>'.$h.'</strong> часов, <strong>'.$m.'</strong> минут, <strong>'.$s.'</strong> секунд.</p>';
            }
        ?>
    </div>
    <div>
        <article>
            <h3>1. Тайский массаж</h2>
            <img src="assets/article1.png">
            <p>Как восстановить физическое и душевное равновесие, избавиться от недугов и зарядиться энергией? Приглашаем вас посетить сеанс оздоровительного массажа. Основанный на традиционных техниках и тысячелетнем опыте тайских мастеров, он оказывает целебное воздействие на организм, наполняет силой и дарит здоровье.</p>
            <span>15min. - 4000 т.р.</span>
        </article>
        </div>         
        <div>
            <article>
                <h3>2.Расслабляющий массаж всего тела</h2>
                <img src="assets/article2.png">
                <p>Классический массаж-это один из самых древних и любимых видов массажа. 
                    Этот массаж действует главным образом на тело-мышцы, суставы, сухожилия и другие ткани.
                    Этот массаж подходит для людей, которым нравится сильный, глубоко разминающий и растирающий массаж, 
                    а также людям, которые занимаются спортом.</p>
                <span>60min. - 5000 т.р.</span>
            </article>
        </div>
        <div>
            <article>
                <h3>3.Коррекция фигуры</h2>
                <img src="assets/article3.png">
                <p>Программы нашего салона, направленные на эффективную коррекцию фигуры, предлагают жительницам Воронежа избавиться от лишних сантиметров, обрести стройность и стать еще привлекательнее и красивее. </p>
                <span>•  60 мин. — 6000 т.р. €</span>
            </article>
        </div>

    </body>
</html>