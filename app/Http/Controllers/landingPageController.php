<?php

namespace App\Http\Controllers;

use App\Models\Tips;
use Illuminate\Http\Request;

class landingPageController extends Controller
{
    //
    public function index (){
        $tips=Tips::latest();
        return view('landingpage',[
            'tittle'=>"Home",
            'Tips'=>$tips->get()
        ]);
    }
}
