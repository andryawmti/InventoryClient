<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 12/16/18
 * Time: 5:33 PM
 */

namespace App\Classes;


class MyHttpResponse
{
    public static function storeResponse(bool $success, $message, $route)
    {
        $return = [
            'success' => $success,
            'title' => 'Created',
            'message' => $message
        ];

        return redirect()->route($route)->with($return);
    }

    public static function updateResponse(bool $success, $message, $route, $id = 1)
    {
        $return = [
            'success' => $success,
            'title' => 'Updated',
            'message' => $message
        ];

        return redirect()->route($route, ['id' => $id])->with($return);
    }

    public static function deleteResponse(bool $success, $message, $route, $id = 1)
    {
        $return = [
            'success' => $success,
            'title' => 'Deleted',
            'message' => $message
        ];

        return redirect()->route($route, ['id' => $id])->with($return);
    }
}