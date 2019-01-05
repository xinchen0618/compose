<?php
/**
 * Local variables
 * @var \Phalcon\Mvc\Micro $app
 */

/**
 * Add your routes here
 */
$app->get('/', function () use($app) {
    echo '<pre>';

    echo "mysql test: \n";
    $sql = 'SELECT * FROM users';
    $users = $app->db->fetchAll($sql);
    var_export($users);
    echo "\n\n";

    echo "date test: \n";
    echo date('Y-m-d H:i:s');
    echo "\n\n";

    echo "redis test: \n";
    $app->redis->set('aaa', 123);
    var_export($app->redis->get('aaa'));

});

$app->get('/phpinfo', function () {
    phpinfo();
});

/**
 * Not found handler
 */
$app->notFound(function () use($app) {
    $app->response->setStatusCode(404, "Not Found")->sendHeaders();
    echo $app['view']->render('404');
});
