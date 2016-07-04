<?php
use Silex\Application;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

require_once __DIR__ . '/vendor/autoload.php';



$app = new Application();
$app->get('/', function ()
{
    return 'hi';
});

/*//um banco de dados
 * $app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'dbname' => 'silex2',
        'user' => 'root',
        'password' => 'mestre',
        'host' => 'localhost',
        'driver' => 'pdo_mysql',
    ),
));*/

//dois bancos de dados
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'dbs.options' => array(
        'mysql_1' => array(
            'dbname' => 'silex',
            'user' => 'root',
            'password' => 'mestre',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
        ),
        'mysql_2' => array(
            'dbname' => 'silex2',
            'user' => 'root',
            'password' => 'mestre',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
        ),
        'mysql_3' => array(
            'dbname' => 'silex',
            'user' => 'root',
            'password' => 'mestre',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
        ),
    ),
));

$app->get('/user/{id}', function ($id) use ($app) {
    $sql = "SELECT * FROM user WHERE idUser = ?";
    $user = $app['dbs']['mysql_1']->fetchAssoc($sql, array((int) $id));
    //$sql = "UPDATE user SET value = ? WHERE id = ?";
   // $app['dbs']['mysql_3']->update($sql, array('newValue', (int) $id));
    if (!$user)
    {
        return new Response (json_encode('Não encontrado'), 404);
    }

    //return new Response (json_encode("<h1>{$user['nome']}</h1>.<h2>{$user['apellido']}</h2>"), 200);
    return new Response (json_encode($user), 200);

})->value('id', null);

$app->get('/produtos/', function ()
{
    return new Response(json_encode('as boas-vindas aos produtos'), 200);
});

$app->get('/produtos/{id}', function ($id) use ($app)
{
    if ($id == null)
    {
        $sql = "SELECT * FROM silex2.produtos";
        //$produto = $app['db']->fetAll($sql);
        $produto = $app['dbs']['mysql_2']->fetchAll($sql);

        return new Response ($produto, 200);
    }

    $sql = "SELECT * FROM silex2.produtos WHERE produtos.nome = ?";
    //$produto = $app['db']->fetchAssoc($sql, array($id));
    $produto = $app['dbs']['mysql_2']->fetchAssoc($sql, array($id));
    if (!$produto)
    {
        return new Response (json_encode('Não encontrado'), 404);
    }

    return new Response (json_encode($produto), 200);

})->value('id', null);

$app->post('/produtos', function (Request $request) use ($app)
{
        //pega os dados
    if (!$data = $request->post('produtos'))
    {
        return new Response('Faltam parâmetros', 400);
    }

    //$app['db']->insert('produtos', array('nome' => $data['nome'], 'calidade' => $data['calidade']));
    $app['dbs']['mysql_2']->insert('produtos', array('nome' => $data['nome']));

    //redireciona para a novo produto
    return $app->redirect('/produtos/'.$data['nome'], 201);
});

$app->put('/produtos/{id}', function (Request $request, $id) use ($app)
{
    //pega os dados
    if (!$data = $request->get('produto'))
    {
        return new Response('Faltam parâmetros', 400);
    }

    $sql = "SELECT * FROM silex2.produtos WHERE nome = ?";
    //$produto = $app['db']->fetchAssoc($sql, array($id));
    $produto = $app['dbs']['mysql_2']->fetchAssoc($sql, array($id));
    if (!$produto )
    {
        return new Response (json_encode('Não encontrado'), 404);
    }

    //Persiste no banco de dados
    //$app['db']->update('produtos', array('nome' => $data['nome'], 'calidade' => $data['calidade']),array('id' => $produto['id']));
    $app['dbs']['mysql_2']->update('produtos', array('nome' => $data['nome'], 'calidade' => $data['calidade']),array('id' => $produto['id']));
    return new Response('Produto atualizado', 200);
});

$app->delete('/produtos/{id}', function (Request $request, $id) use ($app)
{
    //busca da base de dados
    $sql = "SELECT * FROM silex2.produtos WHERE produtos.nome = ?";
    //$produto = $app['db']->fetchAssoc($sql, array($id));
    $produto = $app['db']['mysql_2']->fetchAssoc($sql, array($id));
    if (!$produto )
    {
        return new Response (json_encode('Não encontrado'), 404);
    }

    //$app['db']->delete('produtos', array('id' => $produto['id']));
    $app['dbs']['mysql_2']->delete('produtos', array('id' => $produto['id']));

    return new Response('Produto removido', 200);
});

$app->after(function (Request $request, Response $response) {
    $response->headers->set('Content-Type', 'text/json');
});

/*$app->before(function (Request $request) use ($app)
{
    if( ! $request->headers->has('authorization'))
    {
        return new Response('Unauthorized', 401);
    }

    require_once 'configs/clients.php';
    if (!in_array($request->headers->get('authorization'), array_keys($clients)))
    {
        return new Response('Unauthorized', 401);
    }
});*/

$app['debug'] = true;

$app->run();