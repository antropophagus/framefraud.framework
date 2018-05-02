<? use application\core\Views; ?>

<html>
  <head>
    <meta charset="utf-8">
    <title><? echo $title; ?></title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="/application/stylesheets/default.css">
    <link rel="stylesheet" href="/application/stylesheets/buttons.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
  </head>
  <body>
    <header id="header">
      <div class="row">
        <div class="logo"><h1>Blog</h1></div>
        <div class="account"><a href="/account/login">Авторизация</a> | <a href="/account/register">Регистрация</a></div>
      </div>
    </header>
    <nav id="nav">
      <div class="row">
        <ul id="main_menu">
          <li><a href="/">Главная</a></li>
          <li value="states"><a href="/cat/all">Статьи</a></li>
          <li><a href="about">О сайте</a></li>
        </ul>
      </div>
    </nav>
    <div id="wrapper">
      <div class="row">
        <? echo $content;?>
      </div>
    </div>
    <footer id="footer">
        <p>Все права защищены! &copy; <? echo date (Y) ?></p>
    </footer>
  </body>
</html>
