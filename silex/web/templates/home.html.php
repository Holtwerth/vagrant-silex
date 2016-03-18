<?php $view->extend('layout.html.php') ?>

<?php
/**
 * Created by PhpStorm.
 * User: Holtwerth
 * Date: 20.01.2016
 * Time: 15:11
 *
 * @var $post
 */
?>
<!-- Heading -->
<div class="row">
    <div class="col-xs-10 col-xs-offset-1">
        <div class="jumbotron text-center">
            <h1>Welcome to my Blog</h1>
        </div>
    </div>

    <!-- Contentbox -->
    <div class="col-md-6 col-md-offset-1 col-xs-10 col-xs-offset-1">
        <div class="well">
            <h2>What is a Blog?</h2>
            <p class="text-justify">
                A blog (a truncation of the expression weblog) is a discussion or informational site published on
                the World Wide Web consisting of discrete entries ("posts") typically displayed in reverse chronological
                order (the most recent post appears first). Until 2009, blogs were usually the work of a single
                individual, occasionally of a small group, and often covered a single subject. More
                recently, "multi-author blogs" (MABs) have developed, with posts written by large numbers of authors
                and professionally edited. MABs from newspapers, other media outlets, universities, think tanks,
                advocacy groups, and similar institutions account for an increasing quantity of blog traffic. The rise
                of Twitter and other "microblogging" systems helps integrate MABs and single-author blogs into societal
                newstreams. Blog can also be used as a verb, meaning to maintain or add content to a blog.<br/><br/>

                The emergence and growth of blogs in the late 1990s coincided with the advent of web publishing tools
                that
                facilitated the posting of content by non-technical users. (Previously, a knowledge of such technologies
                as
                HTML and FTP had been required to publish content on the Web.)<br/><br/>

                A majority are interactive, allowing visitors to leave comments and even message each other via GUI
                widgets
                on the blogs, and it is this interactivity that distinguishes them from other static websites. In that
                sense, blogging can be seen as a form of social networking service. Indeed, bloggers do not only produce
                content to post on their blogs, but also build social relations with their readers and other bloggers.
                However, there are high-readership blogs which do not allow comments, such as Daring Fireball.<br/><br/>

                Many blogs provide commentary on a particular subject; others function as more personal online diaries;
                others function more as online brand advertising of a particular individual or company. A typical blog
                combines text, images, and links to other blogs, Web pages, and other media related to its topic. The
                ability of readers to leave comments in an interactive format is an important contribution to the
                popularity
                of many blogs. Most blogs are primarily textual, although some focus on art (art blogs), photographs
                (photoblogs), videos (video blogs or "vlogs"), music (MP3 blogs), and audio (podcasts). Microblogging is
                another type of blogging, featuring very short posts. In education, blogs can be used as instructional
                resources. These blogs are referred to as edublogs.<br/><br/>

                On 16 February 2011, there were over 156 million public blogs in existence. On 20 February 2014, there
                were
                around 172 million Tumblr and 75.8 million WordPress blogs in existence worldwide. According to critics
                and
                other bloggers, Blogger is the most popular blogging service used today. However, Blogger does not offer
                public statistics. Technorati has 1.3 million blogs as of February 22, 2014.<br/>
            </p>

            <a href="https://en.wikipedia.org/wiki/Blog"><i class="pull-right text-muted">Wikipedia</i></a>
            <br/><br/><br/>

            <p class="text-muted text-info">
                Dieser Block wurde für das Webengineering Projekt gemacht.
                Viel Spaß beim bloggen!
            </p>
        </div>
    </div>

    <!-- Latest Entries -->
    <div class="col-sm-4 hidden-xs hidden-sm">
        <div class="list-group">
            <p class="list-group-item active">
                Latest Entries
            </p>
            <?php foreach ($post as $value) { ?>
                <a href="/blog/<?= $value['id'] ?>" class="list-group-item"><?= $value['title'] ?></a>
            <?php } ?>
        </div>
    </div>
</div>