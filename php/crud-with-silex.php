<?php

    require_once __DIR__ . '/_libs/silex/vendor/autoload.php';
    $silex = new Silex\Application();
    require_once __DIR__ . '/_libs/twig/lib/Twig/Autoloader.php';
    Twig_Autoloader::register();
    $twig = new Twig_Environment(new Twig_Loader_Filesystem(__DIR__ . '/_templates'));

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Silex\Provider\MonologServiceProvider;
    

    $context = array();
    require_once(__DIR__ . '/_includes/config.php');
    require_once(__DIR__ . '/_includes/db_connect.php');





    // GET  /{resource}/    List
    $silex->get('/api/{resource}/', function ($resource) use ($silex) {
        $res = array();
        $q = mysql_query("SELECT * FROM $resource");
        while ($c = mysql_fetch_assoc($q)) { $res[] = $c; }
        return new Response(json_encode($res), 200, array('Content-Type' => 'application/json'));
    });

    // GET  /{resource}/{id}    Show
    $silex->get('/api/{resource}/{id}/', function ($resource, $id) use ($silex) {
        $res = array();
        $q = mysql_query("SELECT * FROM $resource WHERE id = '$id'");
        while ($c = mysql_fetch_assoc($q)) { $res[] = $c; }
        return new Response(json_encode($res), 200, array('Content-Type' => 'application/json'));
    });

    // POST     /{resource}     Create
    $silex->post('/api/{resource}/', function ($resource, Request $request) use ($silex) {
        parse_str($request->getContent(), $data);
        $query = "INSERT INTO $resource (" . implode(', ', array_keys($data)) . ") VALUES ('" . implode("', '", $data) . "')";
        mysql_query($query);
        return new Response(mysql_affected_rows(), 200);
    });

    // PUT  /{resource}/{id}    Update
    $silex->put('/api/{resource}/{id}/', function ($resource, $id, Request $request) use ($silex) {
        parse_str($request->getContent(), $data);
        $data_mod = array();
        foreach ($data as $key => $value) { $data_mod[] = "$key = '$value'"; }
        $query = "UPDATE $resource SET " . implode(', ', $data_mod) . " WHERE id = $id";
        mysql_query($query);
        return new Response(mysql_affected_rows(), 200);
    });

    // DELETE   /{resource}/{id}    Destroy
    $silex->delete('/api/{resource}/{id}/', function ($resource, $id) use ($silex) {
        $q = mysql_query("DELETE FROM $resource WHERE id = '$id'");
        return new Response(mysql_affected_rows(), 200);
    });



