<?php
/**
 * @var $slots \Symfony\Component\Templating\Helper\SlotsHelper
 * @var $active
 * @var $author
 */
$slots = $view['slots'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

        <!-- don´t run with this files
            <link rel="stylesheet" href="vendor/bootstrap/dist/css/bootstrap.min.css"/>
            <link rel="stylesheet" href="vendor/jquery/dist/jquery.min.js"/>
            <link rel="stylesheet" href="vendor/bootstrap/dist/js/bootstrap.min.js"/>
        -->

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
          integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <title><?= $active ?></title>
</head>

<body>
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php if ($author != NULL) : ?>
                <div class="navbar-brand visible-xs">Welcome <?= $author ?></div>
            <?php endif; ?>
        </div>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li <?= $active == 'Home' ? 'class = "active"' : ''; ?> ><a href="/home"><span
                            class="glyphicon glyphicon-home" aria-hidden=true></span> Home</a></li>
                <li <?= $active == 'New Entry' ? 'class = "active"' : ''; ?> ><a href="/new"><span
                            class="glyphicon glyphicon-envelope" aria-hidden=true></span> New Entry</a></li>
                <li <?= $active == 'Blog' ? 'class = "active"' : ''; ?> ><a href="/blog"><span
                            class="glyphicon glyphicon-list-alt" aria-hidden=true></span> Blog</a></li>
            </ul>
            <?php
            //Logout Button
            if ($author != NULL) : ?>
                <a href="/logout">
                   <span class="btn btn-danger navbar-right navbar-btn">Log out</span>
                </a>
                <div class="navbar-brand pull-right hidden-xs">Welcome <?= $author ?></div>
            <?php endif; ?>
        </div>
    </div>
</nav>
<?php $slots->output('_content') ?>

</body>
</html>