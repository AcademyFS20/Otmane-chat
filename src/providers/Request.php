<?php
namespace Provider;
class Request
{
    // public static function sanitizeStr($input)
    // {
    //     return trim(strip_tags($input));
    // }
    public static function Route($route)
    {
        return BASE_URL.$route;
    }
    public static function post($key)
    {
        // if(isset($_POST[key]) && !empty($_POST[$key]))
        return isset($_POST[$key]) && !empty($_POST[$key]) ? true:false;
    }
    public static function setPost($key)
    {
        return $_POST[$key];
    }
}