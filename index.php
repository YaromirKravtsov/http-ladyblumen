<?php 


$insta = 'https://www.instagram.com/direct/t/17842293899360548/';
// Получаем запрошенный URI
$request = $_SERVER['REQUEST_URI'];

// Удаляем начальный слеш для упрощения обработки
$request = trim($request, '/');

// Определение языка на основе URI
$language = 'de'; // Язык по умолчанию - немецкий
if ($request == 'ru') {
    $language = 'ru';
}

// Путь к JSON-файлу с переводами для выбранного языка
$translationFile = __DIR__ . "/translations/$language.json";

// Проверка, существует ли JSON-файл для выбранного языка
if (file_exists($translationFile)) {
    // Загружаем и декодируем JSON-файл в массив
    $translations = json_decode(file_get_contents($translationFile), true);
} else {
    // Если файл не найден, возвращаем ошибку 404
    http_response_code(404);
    echo "404 Страница не найдена";
    exit;
}


function getImage($url)
{
    /*     echo $url; */
    echo '/assets/images/' . $url . '.png'; // возвращаем URL, чтобы использовать его в теге <img>
}

?>
<!DOCTYPE html>
<html lang="<?= $language ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- fonts start -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;1,600&display=swap"
        rel="stylesheet">
    <!-- fonts end -->
    <title><?php  echo $translations['title'] ?></title>
    <meta name="robots" content="index, follow">
    <meta name="description" content="<?php  echo $translations['description'] ?>">
    <link rel="stylesheet" href="./assets/style.css">
</head>

<body>
    <header>
        <div class="container">
            <div class="header__row">

                <div class="logo">Lady Blumen Hannover</div>
                <nav class="header__main">
                    <ul>
                        <li class="header__item"><a
                                href="#<?php  echo $translations['home'] ?>"><?php  echo $translations['home'] ?></a></li>
                        <li class="header__item"><a
                                href="#<?php  echo $translations['aboutMe'] ?>"><?php  echo $translations['aboutMe'] ?></a>
                        </li>
                        <li class="header__item"><a
                                href="#<?php  echo $translations['services'] ?>"><?php  echo $translations['services'] ?></a>
                        </li>
                        <li class="header__item"><a
                                href="#<?php  echo $translations['orderProcess'] ?>"><?php  echo $translations['orderProcess'] ?></a>
                        </li>
                        <li>
                            <a class="header-mobile--sale-btn btn text"
                                href="<?php  echo $insta ?>"><?php  echo $translations['poster']['btn1-txt']; ?></a>
                        </li>
                    </ul>
                </nav>

                <div class="header__len">

                    <img class="header__len-flag" src="<?php  getImage('flags/' . $language); ?>" alt="flag">

                    <svg class="header__len-arrow" #1E2532width="10" height="6" viewBox="0 0 10 6" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 1.375L5 5.375L1 1.375" stroke="#1E2532" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <a class="header__len-option" href="<?php  echo '/' . (($language == 'de') ? 'ru' : '') ?>"
                        hreflang="<?php  echo $language ?>">
                        <img src="<?php  echo getImage('flags/' . (($language == 'de') ? 'ru' : 'de')); ?>" alt="Флаг">
                    </a>

                </div>
                <button class="burger-icon">
                    <svg class="burger-icon-close" width="20" height="16" viewBox="0 0 20 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <line y1="1" x2="20" y2="1" stroke="black" />
                        <line y1="8" x2="20" y2="8" stroke="black" />
                        <line y1="15" x2="20" y2="15" stroke="black" />
                    </svg>
                    <svg class="burger-icon-open" width="17" height="16" viewBox="0 0 17 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <line x1="0.646447" y1="15.6464" x2="15.6464" y2="0.646447" stroke="black" />
                        <line x1="1.35355" y1="0.646447" x2="16.3536" y2="15.6464" stroke="black" />
                    </svg>

                </button>

            </div>
        </div>
    </header>
    <section class="poster" id="<?php  echo $translations['home'] ?>">
        <div class="container">
            <img src="<?php  getImage('poster/flower-l'); ?>" alt="" class="poster-left-img">
            <div class="poster__main-row">
                <h1 class="title"><?php  echo $translations['poster']['title']; ?></h1>
                <h2 class="text"><?php  echo $translations['poster']['text']; ?></h2>
                <a class="poster__main--sale-btn btn text"
                    href="<?php  echo $insta ?>"><?php  echo $translations['poster']['btn1-txt']; ?></a>
                <a class="poster__main--services-btn btn text"
                    href="#<?php  echo $translations['services'] ?>"><?php  echo $translations['poster']['btn2-txt']; ?></a>
            </div>
            <img src="<?php  getImage('poster/flower-r'); ?>" alt="" class="poster-right-img">
        </div>
    </section>
    <section class="about-us" id="<?php  echo $translations['aboutMe'] ?>">
        <div class="container">
            <div class="about-us__row">
                <div class="about-us__column">
                    <h2 class="title"><?php  echo $translations['about-me']['h2']; ?></h2>
                    <h3 class="title"><?php  echo $translations['about-me']['h3']; ?></h3>
                    <p class="text"><?php  echo $translations['about-me']['text']; ?></p>
                    <a href="<?php  echo $insta ?>"
                        class=" about-us-btn btn text"><?php  echo $translations['about-me']['contact-btn']; ?></a>
                </div>
                <img src="<?php  getImage('about-me'); ?>" alt="">
            </div>
        </div>
    </section>
    <section class="services" id="<?php  echo $translations['services'] ?>">
        <img src="<?php  echo getImage(url: 'services/bg1'); ?>" alt="" class="bg-l">
        <div class="container">
            <div class="services__row">
                <h2 class="title">
                    <?php  echo $translations['services-sel']['title']; ?>
                </h2>
                <div class="services-block__row">
                    <?php 
                    foreach ($translations['services-sel']['blocks'] as $key => $block) {
                        ?>
                        <div class="services__block">
                            <img src="<?php  echo getImage(url: 'services/' . $block['img']); ?>"
                                alt="<?php  echo $block['title']; ?>">
                            <h3 class="title"><?php  echo $block['title']; ?></h3>
                            <p class="text"><?php  echo $block['text']; ?></p>
                        </div>
                        <?php 
                    }
                    ?>


                </div>
            </div>
        </div>
        <img src="<?php  echo getImage(url: 'services/bg2'); ?>" alt="" class="bg-r">
    </section>
    <section class="orderProcess" id="<?php  echo $translations['orderProcess'] ?>">
        <div class="container">
            <div class="orderProcess__row">
                <h2 class="title"><?php  echo $translations['orderProcess-sel']['h2']; ?></h2>
                <h3 class="title"><?php  echo $translations['orderProcess-sel']['h3']; ?></h3>
                <div class="orderProcess__main-row">
                    <img src="<?php  getImage(url: 'orderProcess/orderProcess'); ?>" alt="">
                    <div class="orderProcess__process-column">
                        <?php 
                        foreach ($translations['orderProcess-sel']['processes'] as $key => $process) {
                            ?>
                            <div class="orderProcess__process">
                                <img src="<?php   getImage($process['img']) ?> " alt="">
                                <div class="orderProcess__content">
                                    <h4 class="title"><?php   echo $process['title'] ?> </h4>
                                    <p class="text"><?php   echo $process['text'] ?></p>
                                </div>
                            </div>
                            <?php 
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <footer>
        <div class="container">
            <div class="footer__row">
                <div class="footer__sale-row">
                    <div class="logo">Lady Blumen Hannover</div>
                    <a class="poster__main--sale-btn btn text"
                        href="<?php  echo $insta ?>"><?php  echo $translations['footer']['sale']; ?></a>
                </div>
                <nav>
                    <ul>
                        <li class="header__item"><a
                                href="#<?php  echo $translations['home'] ?>"><?php  echo $translations['home'] ?></a></li>
                        <li class="header__item"><a
                                href="#<?php  echo $translations['aboutMe'] ?>"><?php  echo $translations['aboutMe'] ?></a>
                        </li>
                        <li class="header__item"><a
                                href="#<?php  echo $translations['services'] ?>"><?php  echo $translations['services'] ?></a>
                        </li>
                        <li class="header__item"><a
                                href="#<?php  echo $translations['orderProcess'] ?>"><?php  echo $translations['orderProcess'] ?></a>
                        </li>
                       
                    </ul>
                </nav>
                <div class="footer__line"></div>
                <div class="text footer__rights ">
                    <?php  echo $translations['footer']['last']; ?>
                </div>
            </div>
        </div>
    </footer>
    <script src="./assets/index.js"></script>
</body>

</html>