<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Formateur;
use App\Models\Groupe;
use App\Models\Module;
use App\Models\Note;
use App\Models\seance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PHPUnit\TextUI\XmlConfiguration\Group;

class adminController extends Controller
{
  public function index()
  {
    $formateurs = Formateur::all() ;
    $eleves = Eleve::all() ;
    $groupes = Groupe::all() ;
    $modules = Module::all() ;

    return view('admin.Home' , compact("formateurs" , "eleves" , "groupes" , "modules"));
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
      "email" => ['required', 'unique:formateurs', 'email'],
      "pass" => ['required'],
    ]);


    Formateur::create([
      "nom" => $request->nom,
      "prenom" => $request->prenom,
      "email" => $request->email,
      "pass" => Hash::make($request->password)
    ]);

    return redirect()->route("formateurs")->with("success", "Formateur created Successfully");
  }

  // edit Formateur
  public function edit_formateur($id)
  {

    $formateur = Formateur::findOrFail($id);

    return view('admin.Afomateur.editFomateurPage', compact("formateur"));
  }

  public function update_formateur(Request $request)
  {


    $request->validate([
      "nom" => ['required'],
      "prenom" => ['required'],
      "email" => ['required', 'email'],

    ]);



    $formateur = Formateur::findOrFail($request->id);

    if ($request->password == "") {
      $pass = $formateur->pass;
    } else {
      $pass = $request->password;
    }

    if ($formateur) {
      $formateur->fill([
        "nom" => $request->nom,
        "prenom" => $request->prenom,
        "email" => $request->email,
        "pass" => Hash::make($pass),
      ])->save();
    };

    return redirect()->route('formateurs')->with('success', "Formateur updated Successfully");
  }



  // ===== end  Formateur    =====


  // ===== start  Eleve    =====
  // view all eleves
  public function index_eleve()
  {


    $eleves = DB::table('eleves')
      ->join('groupes', 'eleves.groupe_id', '=', 'groupes.id')
      ->select('eleves.*', 'groupes.nom as nomG')
      ->get();



    return view("admin.eleves.AfficherEleve", compact('eleves'));
  }

  // view eleves to add eleve
  public function create_eleve()
  {
    $groupes = Groupe::all();

    return view("admin.eleves.AjouterEleve", compact('groupes'));
  }

  // store eleve
  public function store_eleve(Request $request)
  {

    $request->validate([
      "nom" => ["required"],
      "prenom" => ["required"],
      "email" => ["required", "email"],
      "groupe" => ['required']
    ]);



    Eleve::create([
      'nom' => $request->nom,
      'prenom' => $request->prenom,
      'email' => $request->email,
      'groupe_id' => $request->groupe,
    ]);




    return redirect()->route("eleves")->with('success', "eleve created Successfully");
  }

  // delete eleve

  public function delete_eleve($id)
  {
    $eleve = Eleve::findOrFail($id);

    $eleve->delete();

    return redirect()->route("eleves")->with('success', 'eleve deleted Successfully');
  }


  // edit eleve
  public function edit_eleve($id)
  {
    $eleve = Eleve::findOrFail($id);

    $groupes = Groupe::all();

    return view('admin.eleves.editEleve', compact("eleve", "groupes"));
  }

  // update eleve

  public function update_eleve(Request $request)
  {

    $request->validate([
      "nom" => ["required"],
      "prenom" => ["required"],
      "email" => ["required", "email"],
      "groupe" => ['required']
    ]);

    $eleve = Eleve::findOrFail($request->id);

    $eleve->fill([
      "nom" => $request->nom,
      "prenom" => $request->prenom,
      "email" => $request->email,
      "groupe_id" => $request->groupe
    ])->save();




    return redirect()->route("eleves")->with("success", "eleve update successfully");
  }
  // ===== end  eleve    =====

  // ===== start  Groupe    =====

  // view all groupes
  public function index_groupes()
  {
    $groupes = Groupe::all();
    return view("admin.groupes.AfficherGroupes", compact('groupes'));
  }

  // view groupes to add groupe
  public function create_groupe()
  {
    return view("admin.groupes.AjouterGroupe");
  }

  // store Groupe
  public function store_groupe(Request $request)
  {

    $request->validate([
      "nom" => ['required', "min:2"]
    ]);

    Groupe::create([
      "nom" => $request->nom
    ]);

    return redirect()->route("groupes")->with("success", "Groupe Create Successfully");
  }

  // delete groupe
  public function delete_groupe($id)
  {
    $groupe = Groupe::findOrFail($id);

    $groupe->delete();

    return redirect()->route("groupes")->with('success', "groupe Has Deleted Successfully");
  }

  // ===== end  Groupe    =====


  // ===== start  Module    =====

  // view all modules
  public function index_modules()
  {


    $modules = DB::table('modules')
      ->join('formateurs', 'modules.formateur_id', '=', 'formateurs.id')
      ->select('modules.*', 'formateurs.nom as nomF', 'formateurs.prenom as prenomF')
      ->get();




    return view("admin.module.AfficherModules", compact("modules"));
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
      "nom" => ['required'],
      "cof" => ['required', "numeric", "min:1", "max:5"],
      "formateur" => ['required']
    ]);

    Module::create([
      "nom" => $request->nom,
      "coef" => $request->cof,
      "formateur_id" => $request->formateur
    ]);

    return redirect()->route('modules')->with('success', "your module created Successfully");
  }

  // delete module
  public function destroy_module($id)
  {

    $module = Module::findOrFail($id);
    $module->delete();

    return redirect()->route('modules')->with('success', "Module Has deleted Successfully");
  }

  // update module
  public function edit_module($id)
  {
    $module = Module::findOrFail($id);

    $formateurs = Formateur::all();


    return view("admin.module.editModule", compact('module', "formateurs"));
  }
  // update module
  public function update_module(Request $request)
  {
    $request->validate([
      "nom" => ['required'],
      "cof" => ['required'],
      "formateur" => ['required'],
    ]);



    $module = Module::findOrFail($request->id);



    if ($module) {
      $module->fill([
        "nom" => $request->nom,
        "coef" => $request->cof,
        "formateur_id" => $request->formateur,
      ])->save();
    };

    return redirect()->route('modules')->with('success', "Moduel updated Successfully");
  }


  // ===== end  module    =====


  // ===== start  notes    =====
  // view all notes
  public function index_notes()
  {

    $eleves = Eleve::all();

    return view("admin.notes.AfficherNotes" , compact("eleves"));
  }

  // view note to add note
  public function create_note()
  {
    $modules = Module::all();
    $eleves = Eleve::all();
    return view("admin.notes.AjouterNote", compact("modules", "eleves"));
  }

  // store note
  public function store_note(Request $request)
  {



    $request->validate([
      "eleve" => ['required'],
      "module" => ['required'],
      "note" => ['required', "numeric", "min:0", "max:20"]
    ]);


  Note::create([
      "eleve_id" => $request->eleve,
      "module_id" => $request->module,
      "note" => $request->note
    ]);


    return redirect()->route("notes")->with('success', "Note Created Successfully ");
  }


  // afficher un note d'un eleve
  public function note($id){

    $eleve = Eleve::findOrFail($id);

    $notes = DB::table('notes')
    ->join('modules' , "notes.module_id" , "=" , "modules.id")
    ->select("notes.*" , "modules.nom as nomM" , "modules.coef as coef")
                ->where('eleve_id', $id)
                ->get() ;

    return view('admin.notes.eleveNote' , compact("eleve" ,"notes")) ;
  }

  // delete note

  public function  delete_note($id){

    $note = Note::findOrFail($id) ;

    $note->delete() ;

    return redirect()->back();
  }


  // ===== end  note    =====


    // ===== start  seance    =====

    public function seance_index(){

      $seancess = DB::table('seances')
      ->join('groupes' , "seances.id_groupe" , "=" , "groupes.id")
      ->join('formateurs' , "seances.id_formateur" , "=" , "formateurs.id")
      ->join('modules' , "seances.id_module" , "=" , "modules.id")
      ->select("seances.id" , "groupes.nom as nomG" , "formateurs.nom as nomF" , "formateurs.prenom" , "modules.nom" )
      ->get();




      return view("admin.seance.seances" , compact("seancess"));
    }


    public function delete_seance($id){

      $seances = seance::findOrFail($id);


      $seances->delete();


      return redirect()->route('seances')->with('success' , "seance deleted successfully");
    }
      // ===== end  seance    =====

}
