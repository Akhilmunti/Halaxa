<?php

class Constants
{
    const JSON = 1;
    const XML = 2;
    const GET = 1;
    const POST = 2;
    const HTTP_SUCCESS = 200;
    const HTTP_CREATED = 201;
    const HTTP_VALIDATION_ERROR = 400;
    const HTTP_NOT_FOUND = 404;
    const HTTP_UNAUTHORIZED = 401;
    const HTTP_FORBIDDEN = 403;
    const USER_NAME = "appKey";//appKey
    const MSG_NOT_EMPTY_USER_AUTH = "Username or Auth key cannot be empty";
    const MSG_MUST_SET_USER_AUTH = "Username and Auth key must be set before calling APIs";
}
?>
