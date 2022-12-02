<?php

namespace App\Http\Controllers;

use App\Models\Colour;
use Illuminate\Http\Request;

class ColourForProductController extends Controller
{
    // index

    public function makeColour( ){
        $colours = Colour::all();
        return view('admin.pages.colours.main',['colours'=> $colours]);
    }

    public function storeColour(Request $request){
        
        
        $request->validate([
            'name' => 'required|unique:colours|max:255',
            'code' => 'required|max:255'

        ]);
       
        $colour = new Colour();
        $colour->name = $request->name;
        $colour->code = $request->code;
        $colour->save();

        
        return back()->with('success', 'Colours accepted into the Database');
    }

    public function destroy($id){
        Colour::findOrFail($id)->delete();
        return back()->with('success', 'Colour removed from the system');
    }
}
