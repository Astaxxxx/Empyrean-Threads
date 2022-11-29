<?php

namespace App\Models;

class Cart 
{

    public function penniesToPrice($pennies){

        return number_format($pennies / 100, 2);

    }

    public static function unitPrice($item){

        return (new self)->penniesToPrice($item['product']['price']) * $item['quantity'];

    }

    public static function totalAmount(){
        $total = 0;
        if(session()->has('cart')){
            foreach(session('cart') as $item) {
                $total += self::unitPrice($item);
            }
        }
        return $total;
    }
}
