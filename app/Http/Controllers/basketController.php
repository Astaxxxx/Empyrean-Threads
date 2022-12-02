<?php

namespace App\Http\Controllers;

use App\Models\Colour;
use App\Models\Product;
use Illuminate\Http\Request;

class basketController extends Controller
{
    public function addTobasket(Request $request, $id){
        $product = Product::findOrFail($id);
        $colour = Colour::findOrFail($request->colour);

        $item = [
            'product' => $product,
            'quantity' => $request->quantity,
            'colour' => $colour
            
        ];

        if(session()->has('basket')){

            $basket = session()->get('basket');
            $key = $this->checkItemInbasket($item);

            if($key != -1){
                $basket[$key]['quantity'] += $request->quantity;
                session()->put('basket', $basket);
            }else{
                session()->push('basket', $item);
            }


        }else{
            session()->push('basket', $item);
        }

        return back()->with('addedTobasket', 'Success! Product  has been added to basket');

    }

    public function CheckItemInbasket($item){
        foreach(session()->get('basket') as $key => $val){
            if($val['product']['id'] == $item['product']['id'] && $val['colour']['id'] == $item['colour']['id']){
                return $key;
            }
        }
        return -1;
    }

    public function removeFrombasket($key){
        if (session()->has('basket')){
            $basket = session()->get('basket');
            array_splice($basket, $key, 1);
            session()->put('basket', $basket);
            return back()->with('success', 'product has been removed');
        }
        return back();
    }
}
