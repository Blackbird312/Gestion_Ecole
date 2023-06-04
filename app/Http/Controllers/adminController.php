<?php

namespace App\Http\Controllers;

use App\Models\Formateur;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
  public function index()
  {
    return view('admin.Home');
  }

  // =====  Formateur    =====
  // view all formateur
  public function index_formateur()
  {
    $formateurs = Formateur::all();
    return view("admin.Afomateur.AllFormateurPage", compact("formateurs"));
  }
  // delete formateur
  public function delete_formateur($id)
  {
    $formateur = Formateur::findOrFail($id);
    $formateur->delete();

    return redirect()->route("formateurs")->with("success", 'formateur deleted Successfully.');
  }
  // view formaulaire to add Prof
  public function create_formateur()
  {
    return view("admin.Afomateur.createFomateurPage");
  }

  // create formateur
  public function store_formateur(Request $request)
  {

    $request->validate([
      "nom" => ['required'],
      "prenom" => ['required'],
      "email" => ['required','unique:formateurs','email'],
      "pass" => ['required'],
    ]) ;


    Formateur::create([
      "nom" => $request->nom,
      "prenom" => $request->prenom,
      "email" => $request->email ,
      "pass" => Hash::make($request->password)
    ]);

    return redirect()->route("formateurs")->with("success" , "Formateur created Successfully");
  }

  // edit Formateur
  public function edit_formateur($id){

      $formateur = Formateur::findOrFail($id) ;

    return view('admin.Afomateur.editFomateurPage' , compact("formateur")) ;
  }

  public function update_formateur(Request $request){


    $request->validate([
      "nom" => ['required'],
      "prenom" => ['required'],
      "email" => ['required','email'],

    ]) ;



    $formateur = Formateur::findOrFail($request->id) ;

    if($request->password == "") {
      $pass = $formateur->pass ;
    }else{
      $pass = $request->password ;
    }

    if($formateur){
      $formateur->fill([
        "nom" => $request->nom,
        "prenom" => $request->prenom,
        "email" => $request->email ,
        "pass" =>Hash::make($pass ),
      ])->save() ;
    };

    return redirect()->route('formateurs')->with('success' , "Formateur updated Successfully") ;
  }



  // ===== end  Formateur    =====


    // ===== start  Eleve    =====
  // view all eleves
  public function index_eleve()
  {
    return view("admin.eleves.AfficherEleve");
  }

  // view eleves to add eleve
  public function create_eleve()
  {
    return view("admin.eleves.AjouterEleve");
  }

    // ===== end  eleve    =====

      // ===== start  Groupe    =====

  // view all groupes
  public function index_groupes()
  {
    return view("admin.groupes.AfficherGroupes");
  }

  // view groupes to add groupe
  public function create_groupe()
  {
    return view("admin.groupes.AjouterGroupe");
  }

    // ===== end  Groupe    =====


      // ===== start  Module    =====

  // view all modules
  public function index_modules()
  {


    $modules = DB::table('modules')
    ->join('formateurs', 'modules.formateur_id', '=', 'formateurs.id')
    ->select('modules.*', 'formateurs.nom as nomF' , 'formateurs.prenom as prenomF')
    ->get();




    return view("admin.module.AfficherModules" , compact("modules") );
  }

  // view modules to add module
  public function create_module()
  {
    $formateurs = Formateur::all();
    return view("admin.module.AjouterModule", compact("formateurs"));
  }

  // store module
  public function store_module(Request $request)
  {

    $request->validate([
      "nom" => ['required'] ,
      "cof" => ['required' , "numeric" , "min:1" , "max:5"] ,
      "formateur" => ['required']
    ]) ;

    Module::create([
      "nom" => $request->nom ,
      "coef" => $request->cof ,
      "formateur_id" =>$request->formateur
    ]);

    return redirect()->route('modules')->with('success' , "your module created Successfully");
  }

    // ===== end  module    =====


      // ===== start  notes    =====
  // view all notes
  public function index_notes()
  {
    return view("admin.notes.AfficherNotes");
  }

  // view note to add note
  public function create_note()
  {
    return view("admin.notes.AjouterNote");
  }


    // ===== end  note    =====
}
