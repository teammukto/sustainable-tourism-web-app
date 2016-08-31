<?php

// global functions

function session($name){
    return Larubel\Libs\Services\Session::get($name);
}

function url($path){
    $prefix = Larubel\Libs\Services\Response::getBasePath();
    return $prefix . $path;
}