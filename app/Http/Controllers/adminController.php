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

     // view all eleves
     public function index_eleve(){
      return view("admin.eleves.AfficherEleve") ;
    }

      // view eleves to add eleve
    public function create_eleve(){
      return view("admin.eleves.AjouterEleve") ;
    }

    // view all groupes
    public function index_groupes(){
    return view("admin.groupes.AfficherGroupes") ;
    }

    // view groupes to add groupe
  public function create_groupe(){
    return view("admin.groupes.AjouterGroupe") ;
    }

    // view all modules
    public function index_modules(){
      return view("admin.module.AfficherModules") ;
    }

      // view modules to add module
    public function create_module(){
      return view("admin.module.AjouterModule") ;
    }

    // view all modules
    public function index_notes(){
      return view("admin.notes.AfficherNotes") ;
    }

      // view modules to add module
    public function create_note(){
      return view("admin.notes.AjouterNote") ;
    }









}
