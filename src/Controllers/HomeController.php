<?php

 namespace Lembarek\Core\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    /**
    * construct
    *
    * @return void
    */
    public function __construct()
    {
    }

    /**
     * redirect the users to the home page
     *
     * @return Response
     */
    public function home()
    {
        return view('home.index');
    }


}

