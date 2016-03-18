<?php $view->extend('layout.html.php') ?>
<?php
/**
 * Created by PhpStorm.
 * User: Holtwerth
 * Date: 24.01.2016
 * Time: 20:40
 *
 * @var $specific_post
 * @var $post
 */
?>


<div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3">
        <h1>All Blog Entries</h1>
        <hr/>
        <?php foreach ($post as $value) { ?>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= $value['title'] ?></h3>
                </div>

                <div class="panel-body">
                    <?php
                    //differentiate between all posts and a specific post
                    if ($specific_post) : ?>
                        <p><?= $value['text'] ?></p>

                    <?php else : ?>
                        <p><?= substr($value['text'], 0, 150) ?>
                            <i><a href="blog/<?= $value['id'] ?>">[more]</a></i>
                        </p>
                    <?php endif; ?>

                    <br/>

                    <!-- Date and Author -->
                    <i class="pull-right">
                        <?= $value['created_at'] . ' von ' . $value['author'] ?>
                    </i>

                    <!-- back to all posts -->
                    <?php if ($specific_post) : ?>
                        <a href="/blog">
                            <br/>
                            <span class="glyphicon glyphicon-arrow-left btn btn-default pull-right"
                                  aria-hidden=true></span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

        <?php } ?>
    </div>
</div>