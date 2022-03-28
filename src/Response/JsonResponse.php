<?php

namespace CalisiaCore\Response;

if (!defined('ABSPATH')) {
    exit();
}



class JsonResponse
{
    public static function fail($data, $code)
    {
        wp_send_json_error($data, $code);
    }

    public static function success($data)
    {
        wp_send_json_success($data, 200);
    }
}
