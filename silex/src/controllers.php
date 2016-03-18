<?php
use Symfony\Component\HttpFoundation\Request;

/**
 * @var $app Silex\Application
 * @var $dbConnection Doctrine\DBAL\Connection
 * @var $template Symfony\Component\Templating\DelegatingEngine
 */


$dbConnection = $app['db'];
$template = $app['templating'];
$session = $app['session'];


$app->match('/home', function () use ($template, $session, $dbConnection) {

    //session handling
    $author = $session->get('user')['username'];

    //For the 5 latest Entries section
    $query = "SELECT id, title FROM blog_post ORDER BY id DESC LIMIT 5";
    $post = $dbConnection->fetchAll($query);

    return $template->render(
        'home.html.php',
        array(
            'active' => 'Home',
            'post' => $post,
            'author' => $author
        )
    );
});

//all blog entries
$app->get('/blog', function () use ($template, $dbConnection, $session) {

    $query = "SELECT * FROM blog_post";
    $post = $dbConnection->fetchAll($query);
    $specific_post = false;
    $author = $session->get('user')['username'];

    $post = array_reverse($post);

    return $template->render(
        'blog.html.php',
        array(
            'specific_post' => $specific_post,
            'post' => $post,
            'active' => 'Blog',
            'author' => $author
        )
    );
});


//specific blog eintry
$app->get('/blog/{id}', function ($id) use ($template, $dbConnection, $session) {

    //session handling
    $author = $session->get('user')['username'];

    $query = "SELECT * FROM blog_post WHERE id = ?";
    $post = $dbConnection->fetchAll($query, array((int)$id));
    $specific_post = true;



    return $template->render(
        'blog.html.php',
        array(
            'specific_post' => $specific_post,
            'post' => $post,
            'active' => 'Blog',
            'author' => $author
        )
    );
});

//
$app->match('/new', function (Request $request) use ($app, $template, $dbConnection, $session) {

    //session handling
    $author = $session->get('user')['username'];

    $page = 'new_blogentry.html.php';
    $empty = NULL;
    $title = $request->get('title');
    $message = $request->get('message');

    //return formular
    if ($request->isMethod('GET')) {
        return $template->render(
            $page,
            array(
                'active' => 'New Entry',
                'empty' => $empty,
                'author' => $author
            )
        );
    }

    //save data in database
    //return success message
    if ($request->isMethod('POST')) {

        //Error handling: when $title and $message NULL -> Error message
        if ($title == NULL || $message == NULL) {
            $empty = false;
        } else {
            $dbConnection->insert(
                'blog_post',
                array(
                    'title' => $title,
                    'text' => $message,
                    'author' => $author,
                    'created_at' => date("Y-m-d H:i:s", time())
                )
            );
            $empty = true;
            $page = "correct.html.php";
        }

        return $template->render(
            $page,
            array(
                'active' => 'New Entry',
                'empty' => $empty,
                'title' => $title,
                'message' => $message,
                'author' => $author
            )
        );

    } else {
        $app->abort(405);
    }
});


//Login
$app->match('/login', function (Request $request) use ($template, $session) {

    $empty = NULL;

    if ($request->isMethod('POST')) {
        $author = $request->get('author');

        //set cookie
        $session->set('user', array('username' => $author));

        //Error handling: if $author NULL -> Error message
        if ($author == NULL) {
            $empty = false;
        } else {
            $empty = true;
        }
    }

    if ($request->isMethod('GET')) {

        //session handling
        $author = $session->get('user')['username'];
    }


    return $template->render(
        'login.html.php',
        array(
            'active' => 'Login',
            'author' => $author,
            'empty' => $empty
        )
    );
});

//logout
//return to login page
$app->get('/logout', function() use ($session, $app){

    //delete cookie
    $session->clear();
    return $app->redirect('/login');
});

