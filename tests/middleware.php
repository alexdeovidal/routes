<?php

use Alexdeovidal\Route\Router;
include "../vendor/autoload.php";
//define namespace
Router::group('Alexdeovidal\Route\Controllers\Api');
//routes key jwt login
//const TOKEN_JWT = 'KEY_JWT';
const TOKEN_JWT = 'RxKaBOi@qjH$';
//eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjMzIiwiZW1haWwiOiJkamFsZXh2aWRhbEBob3RtYWlsLmNvbSJ9.3sINBq4M6u2Rx7bKcSp9jzyIWkfis6M3xmJt5A5yAOQ=
//routes
Router::get("/", "Controller@admin", true);
Router::post("/news","Controller@admin", true);
Router::put("/users/{id}","Controller@admin", true);
Router::delete("/users/{id}","Controller@admin", true);
//send routes
try {
    Router::exec();
} catch (Exception $e) {
    die($e);
}