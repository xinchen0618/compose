<?php
/**
 * Local variables
 * @var \Phalcon\Mvc\Micro $app
 */

/**
 * Add your routes here
 */
$app->get('/', function () use($app) {
    $sql = 'SELECT * FROM users';
    $users = $app->db->fetchAll($sql);
    
    echo '<pre>';
    var_export($users);
    echo "\n" . date('Y-m-d H:i:s');
});

/**
 * Not found handler
 */
$app->notFound(function () use($app) {
    $app->response->setStatusCode(404, "Not Found")->sendHeaders();
    echo $app['view']->render('404');
});
