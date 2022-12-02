<?php

namespace App\Models;

class Basket 
{

    public function penniesToPrice($pennies){

        return number_format($pennies / 1, 2);

    }

    public static function unitPrice($item){

        return (new self)->penniesToPrice($item['product']['price']) * $item['quantity'];

    }

    public static function Amount(){
        $total = 0;
        if(session()->has('basket')){
            foreach(session('basket') as $item) {
                $total += self::unitPrice($item);
            }
        }
        return $total;
    }
}
