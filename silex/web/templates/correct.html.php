<?php $view->extend('layout.html.php') ?>
<?php
/**
 * Created by PhpStorm.
 * User: Holtwerth
 * Date: 01.02.2016
 * Time: 15:31
 *
 * @var $title
 * @var $message
 */
?>

<div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3">
        <div class="alert alert-success" role="alert">
            <strong>Der Blogeintrag wurde erfolgreich erstellt!</strong>
        </div>

        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title"><?= $title ?></h3>
            </div>
            <div class="panel-body">
                <?= $message ?>
                <br/><br/>
                <a href="/new">
                    <span class="glyphicon glyphicon-arrow-left btn btn-default pull-right" aria-hidden=true></span>
                </a>
            </div>

        </div>
    </div>
</div>