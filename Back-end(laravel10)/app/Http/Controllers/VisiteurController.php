<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visiteur;

class VisiteurController extends Controller
{
    public function visiteur(){
        $visiteurs = Visiteur::all();
        // return view('visiteur', compact('visiteurs'));
        return response()->json(
            [
                'visiteur' =>$visiteurs
            ]
        );

    }
    public function ajouter_visiteur(){
        return view('ajouter');
    }

    public function ajouter_visiteur_traitement(Request $request){
        $request->validate([
            'numero_visiteur'=>"required",
            'nom'=>"required",
            'nombre_jour'=>"required",
            'tarif'=>"required",
        ]);

        $visiteur = new Visiteur();
        $visiteur->numero_visiteur= $request->numero_visiteur;
        $visiteur->nom= $request->nom;
        $visiteur->nombre_jour= $request->nombre_jour;
        $visiteur->tarif= $request->tarif;
        $visiteur->tarif_total= ($request->tarif * $request->nombre_jour);
        $visiteur->save();

        // return redirect('/ajouter')->with('status', 'La visiteur a bien été ajouté avec succes.');
        return response()->json(
            [
                'message' => "Ajout avec success."
            ]
        );
    }

    public function update_visiteur($id){
        $visiteur = Visiteur::find($id);
        // return view('update', compact('visiteurs'));
        return response()->json($visiteur);
    }
    

    public function update_visiteur_traitement(Request $request){

        $request->validate([
            'numero_visiteur'=>"required",
            'nom'=>"required",
            'nombre_jour'=>"required",
            'tarif'=>"required",
        ]);

        $visiteur = Visiteur::find($request->id);
        $visiteur->numero_visiteur= $request->numero_visiteur;
        $visiteur->nom= $request->nom;
        $visiteur->nombre_jour= $request->nombre_jour;
        $visiteur->tarif= $request->tarif;
        $visiteur->tarif_total= ($request->tarif * $request->nombre_jour);
        $visiteur->update();
        // return redirect('/visiteur')->with('status', 'La visiteur a bien été modifié avec succes.');

        return response()->json([
            'message' => "La visiteur a bien été modifié avec succes."
        ]);
    }

    public function delete_visiteur($id){
        $visiteurs = Visiteur::find($id);
        $visiteurs->delete();
        // return redirect('/visiteur')->with('status', 'La visiteur a bien été supprimé avec succes.');

        return response()->json([
            'message' => "La visiteur a bien été supprimé avec succes."
        ]);
    }


    public function somme()
    {
        $res=Visiteur::sum("tarif");
        return response()->json($res);
    }

    public function minim()
    {
        $res=Visiteur::min("tarif");
        return response()->json($res);
    }

    public function maxim()
    {
        $res=Visiteur::max("tarif");
        return response()->json($res);
    }

}
