<?php

use Alexdeovidal\Route\Router;
include "../vendor/autoload.php";
//define namespace
Router::group('Alexdeovidal\Route\Controllers\Api');
//routes
Router::get("/", "Controller@admin");
Router::post("/news","Controller@admin");
Router::put("/users/{id}","Controller@admin");
Router::delete("/users/{id}","Controller@admin");
//send routes
try {
    Router::exec();
} catch (Exception $e) {
     die($e);
}