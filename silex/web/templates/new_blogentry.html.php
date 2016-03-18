<?php
/**
 * @var $empty
 * @var $author
 */
$view->extend('layout.html.php') ?>
<?php
/**
 * Created by PhpStorm.
 * User: Holtwerth
 * Date: 25.01.2016
 * Time: 22:07
 */
?>
<div class="row">
    <?php
    //If no one logged in
    if ($author == NULL) : ?>
        <div class="col-md-offset-5 col-xs-offset-1">
            <br/><br/>
            <a href="/login">
                <span class="btn btn-primary col-md-4 col-xs-10">Sign in</span>
            </a>
        </div>
    <?php else : ?>
        <?php
        //Error message
        if ($empty === false) : ?>
            <div class="col-lg-6 col-lg-offset-3 col-xs-8 col-xs-offset-2 alert alert-danger" role="alert">
                <strong>Error: </strong>Please fill in Title <strong>and</strong> Message!
            </div>
        <?php endif; ?>

        <div class="col-lg-6 col-lg-offset-3 col-xs-8 col-xs-offset-2">
            <form action="/new" method="post" name="new_entry">
                <label for="inputTitle" class="sr-only">Titel</label>
                <h4>Titel</h4>
                <input type="text" name="title" id="inputTitle" class="form-control" placeholder="Title"/>
                <label for="message" class="sr-only">Your Message</label>
                <br/><h4>Message:</h4>
                <textarea class="col-xs-12 form-control" rows="6" name="message" id="message"></textarea>

                <br/>
                <div class="col-lg-6 col-xs-8">
                    <div>
                        <br/>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    <?php endif; ?>
</div>