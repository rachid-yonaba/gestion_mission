<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    //
     public function personnel()
    {
        return view('personnels.personnels'); 
    }
}
