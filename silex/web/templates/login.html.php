<?php $view->extend('layout.html.php') ?>

<?php
/**
 * Created by PhpStorm.
 * User: Holtwerth
 * Date: 13.03.2016
 * Time: 20:47
 *
 * @var $empty
 * @var $author
 *
 */
?>
<div class="row">
    <?php
    //Error message
    if ($empty === false) : ?>
        <div class="col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2 alert alert-danger" role="alert">
            <strong>Error: </strong>Please fill in your Name!
        </div>
    <?php endif; ?>

    <?php
    //if nobody is logged in
    if ($author == NULL) : ?>
        <br/>
        <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4">
            <h1>Sign in!</h1>
            <hr/>
            <br/><br/>

            <form action="/login" method="post">
                <div>
                    <input type="text" name="author" placeholder="Author" class="form-control">
                </div>
                <br/>
                <button type="submit" class="btn btn-success"> Sign in</button>
            </form>
        </div>
    <?php

    //success message
    else : ?>
        <div class="col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h1 class="panel-title">Success</h1>
                </div>
                <div class="panel-body">
                    <h1>Welcome <?= $author ?></h1>
                </div>
            </div>
            <a href="/new"><span class="btn btn-primary col-xs-5">New Entry</span></a>
        </div>
    <?php endif; ?>
</div>