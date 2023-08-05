<?php

namespace App\Http\Controllers;

use App\Models\Itri_citoyen;
use App\Models\Itri_avis_citoyen;
use Illuminate\Http\Request;

class CitoyenController extends Controller
{
    public function citoyen(){
        $citoyen=Itri_citoyen::get();
        return view('citoyens.citoyen',['data'=>$citoyen]);
    }



    //methode pour afficher les transfert
    public function transfert($id)
    {
        // Retrieve the citoyen by ID
        $citoyen = Itri_citoyen::find($id);
        if (!$citoyen) {
            // Handle the case where the citoyen is not found
            return redirect()->route('citoyen')->with('error', 'Citoyen n\'existe pas.');
        }

        $transferts = $citoyen->transfert;

        // Check if the citoyen has any transfers
        if ($transferts->isEmpty()) {
            $errorMessage = 'Citoyen n a pas aucun transfert.';
            return redirect()->route('citoyen')->with('alert', $errorMessage);
        }
        // Pass the transfers data to the view
        return view('citoyens.transfert', ['transferts' => $transferts]);
    
    }




    //methode pour afficher les messages

    public function message($id)
    {
        // Retrieve the citoyen by ID
        $citoyen = Itri_citoyen::find($id);
        if (!$citoyen) {
            // Handle the case where the citoyen is not found
            return redirect()->route('citoyen')->with('error', 'Citoyen n\'existe pas.');
        }

        $messages = $citoyen->message;

        // Check if the citoyen has any transfers
        if ($messages->isEmpty()) {
            $errorMessage = 'Citoyen n a pas aucun Message.';
            return redirect()->route('citoyen')->with('alert', $errorMessage);
        }
        // Pass the transfers data to the view
        return view('citoyens.message', ['messages' => $messages]);
    }

    //methode pour afficher les avis
    public function avis($id)
    {
        // Retrieve the citoyen by ID
        $citoyen = Itri_citoyen::find($id);

        if (!$citoyen) {
            // Handle the case where the citoyen is not found
            return redirect()->route('citoyen')->with('error', 'Citoyen n\'existe pas.');
        }

        // Retrieve the avis for the citoyen with the corresponding livreur
        $avis = Itri_avis_citoyen::with('livreur')->where('id_citoyen', $id)->get();

        // Check if the citoyen has any avis
        if ($avis->isEmpty()) {
            $errorMessage = 'Citoyen n\'a aucun avis.';
            return redirect()->route('citoyen')->with('alert', $errorMessage);
        }

        // Pass the avis data to the view
        return view('citoyens.avis', ['avis' => $avis]);
    }


    //methode pour afficher les location

    public function location($id)
    {
        // Retrieve the citoyen by ID
        $citoyen = Itri_citoyen::find($id);
        if (!$citoyen) {
            // Handle the case where the citoyen is not found
            return redirect()->route('citoyen')->with('error', 'Citoyen n\'existe pas.');
        }

        $locations = $citoyen->location;

        // Check if the citoyen has any transfers
        if ($locations->isEmpty()) {
            $errorMessage = 'Citoyen n a pas aucun Message.';
            return redirect()->route('citoyen')->with('alert', $errorMessage);
        }
        // Pass the transfers data to the view
        return view('citoyens.location', ['locations' => $locations]);
    }

    
}
