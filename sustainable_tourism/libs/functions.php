<?php

// global functions

define('VIEW_PATH',  BASEPATH. '\\app\\views\\');

function sessionErase($name){
    $val = Larubel\Libs\Services\Session::get($name);
    Larubel\Libs\Services\Session::delete($name);
    return $val;
}

function session($name){
    return Larubel\Libs\Services\Session::get($name);
}

function url($path){
    $prefix = Larubel\Libs\Services\Response::getBasePath();
    return $prefix . $path;
}

function src($path){
    $prefix = str_replace('\\', '/', VIEW_PATH);
    return $prefix . $path;
}