<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 12/16/18
 * Time: 2:54 PM
 */

namespace App\Classes;


class Inventory
{
    public static function api()
    {
        return (new InventoryApi());
    }
}