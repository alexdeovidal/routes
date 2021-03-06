<?php

namespace Alexdeovidal\Route;
use JsonException;

/**
 * Class Middleware
 * Responsável por verificar autenticação do usuário.
 * Responsible for verifying user authentication.
 */
class Middleware
{
    use RouterTrait;

    /**
     * Check validation Authorization
     * @throws JsonException
     */
    public function checkAuth(): void
    {
        if (!isset(getallheaders()['Authorization'])) {
            exit(RouterTrait::response(401, "Authorization not found restricted area, login"));
        }
        $token = explode(" ", getallheaders()['Authorization']);

        if (!isset($token[1])) {
            exit(RouterTrait::response(401, "Invalid authorization"));
        }

        [$header, $payload, $sign] = explode(".", $token[1]);

        if (!isset($sign)) {
            exit(RouterTrait::response(401, "Invalid authorization"));
        }

        $data = $header . "." . $payload;
        $auth = hash_hmac('sha256', $data, TOKEN_JWT, true);
        $auth = base64_encode($auth);
        if ($sign !== $auth) {
            exit(RouterTrait::response(401, "Invalid authorization"));
        }
    }
}