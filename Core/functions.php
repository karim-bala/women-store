<?php

 function dd($var)
{
    echo ("<pre>");
    var_dump($var);
    echo ("</pre>");
}

function base_path($path){
     return  BASE_PATH.$path;
}

function view($view_path, $params=[])
{
    extract($params);
    require base_path('views/'.$view_path);
}
function abort(int $code)
{
    http_response_code($code);
    require (base_path("views/{$code}.php"));
    die();
}
function urlIs($uri){
     return parse_url($_SERVER['REQUEST_URI'])['path']==$uri;
}
function authorize($condition,$code= Response::NOT_FOUND)
{
    if (!$condition){
        abort($code);
    }
    return true;
}