<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
      return view('admin.Home') ;
    }

    // =====  Formateur    =====
      // view all formateur
    public function index_formateur(){
      return view("admin.Afomateur.AllFormateurPage") ;
    }

      // view formaulaire to add Prof
    public function create_formateur(){
      return view("admin.Afomateur.createFomateurPage") ;
    }

      // to store prof in DB
    public function store_formateur(){
      return "test" ;
    }










        // ===== end  Formateur    =====
}
