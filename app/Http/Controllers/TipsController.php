<?php

namespace App\Http\Controllers;

use App\Models\Tips;
use Illuminate\Http\Request;

class TipsController extends Controller
{
    public function index(){

        $tips=Tips::latest();

        if(request('cari')){
            $tips->where('tittle','like','%'.request('cari') .'%')
                ->orWhere('excerpt','like','%'.request('cari') .'%')
                ->orWhere('body','like','%'.request('cari') .'%');
        }

        return view('tips',[
            'tittle'=>"Tips",
            'Tips'=>$tips->get()
        ]);
    }

    public function show($slug)
    {
        $tip = Tips::where('slug', $slug)->first();

        return view('tip', [
            'tittle' => "Tips",
            'tip' => $tip
        ]);
    }

}
