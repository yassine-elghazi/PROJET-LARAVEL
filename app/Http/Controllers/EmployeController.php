<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;

class EmployeController extends Controller
{

    public function liste_employe()
    {
        $employees = Employe::paginate(4);
        return view('employe.liste', compact('employees'));
    }

    public function ajouter_employe()
    {
        return view('employe.ajouter');
    }

    public function ajouter_employe_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'grade' => 'required',
        ]);
        $employe = new Employe();
        $employe->nom = $request->nom;
        $employe->prenom = $request->prenom;
        $employe->grade = $request->grade;
        $employe->save();

        return redirect('/ajouter')->with('status', 'L\'employe a bien été ajouté avec succes.');
    }

    public function update_employe($id)
    {
        $employes = Employe::find($id);

        return view('employe.update', compact('employes'));
    }

    public function update_employe_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'grade' => 'required',
        ]);
        $employe = Employe::find($request->id);
        $employe->nom = $request->nom;
        $employe->prenom = $request->prenom;
        $employe->grade = $request->grade;
        $employe->update();
        return redirect('/Employe')->with('status', 'L\'employe a bien été modifié avec succes.');
    }

    public function delete_employe($id)
    {
        $employe = Employe::find($id);
        $employe->delete();
        return redirect('/Employe')->with('status', 'L\'employe a bien été supprimé avec succes.');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        $employees = Employe::where('nom', 'LIKE', "%{$query}%")
            ->orWhere('prenom', 'LIKE', "%{$query}%")
            ->paginate(10);

        return view('employe.liste', compact('employees'));
    }
}
