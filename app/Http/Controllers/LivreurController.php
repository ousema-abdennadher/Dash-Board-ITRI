<?php

namespace App\Http\Controllers;

use App\Models\Itri_avis_livreur;
use App\Models\Itri_livreur_location;
use Illuminate\Http\Request;
use App\Models\Itri_livreur;
use App\Models\Itri_livreur_voiture;

class LivreurController extends Controller
{
    public function livreur()
    {
        $livreur = Itri_livreur::get();
        return view('delivery.livreur', ['data' => $livreur]);
    }
    public function addlivreur()
    {
        return view('delivery.addlivreur');
    }

    public function add(Request $request)
    { {
            $data = [
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'tel' => $request->tel,
                'email' => $request->email,
                'password' => $request->password,
                'etat' => $request->etat,
            ];
            Itri_livreur::create($data);
            return redirect()->route('livreur');
        }
    }
    public function edit($id)
    {
        $livreur = Itri_livreur::find($id);

        return view('delivery.addlivreur', ['livreur' => $livreur]);
    }
    public function update($id, Request $request)
    { {
            $livreur = Itri_livreur::find($id);
            $data = [
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'tel' => $request->tel,
                'email' => $request->email,
                'password' => $request->password,
                'etat' => $request->etat,
            ];
            $livreur->update($data);
            return redirect()->route('livreur');
        }
    }

    public function avis($id)
    {
        // Retrieve the livreur by ID
        $livreur = Itri_livreur::find($id);

        if (!$livreur) {
            // Handle the case where the livreur is not found
            return redirect()->route('livreur')->with('error', 'Livreur n existe pas.');
        }

        // Retrieve the avis for the livreur with the corresponding livreur
        $avis = Itri_avis_livreur::with('citoyen')->where('id_livreur', $id)->get();

        // Check if the livreur has any avis
        if ($avis->isEmpty()) {
            $errorMessage = 'Livreur n a aucun avis.';
            return redirect()->route('livreur')->with('alert', $errorMessage);
        }

        // Pass the avis data to the view
        return view('delivery.avis', ['avis' => $avis]);
    }



    //function for locartion retrun data from database

    public function getLocation($id)
    {
        // Retrieve the location data using the Itri_livreur_location model
        $location = Itri_livreur_location::where('id_livreur', $id)->first();

        if (!$location) {
            return response()->json(['error' => 'Le livreur n a pas de localisation enregistrée.'], 404);
        }
        // Return the location data as a JSON response
        return response()->json([
            'latitude' => $location->latitude,
            'longitude' => $location->longitude
        ]);
    }
//function conge return conge from database
    public function conge($id)
    {
        // Retrieve the citoyen by ID
        $livreur = Itri_livreur::find($id);
        if (!$livreur) {
            // Handle the case where the livr$livreur is not found
            return redirect()->route('livreur')->with('error', 'Livreur n existe pas.');
        }

        $conges = $livreur->conge;

        // Check if the citoyen has any transfers
        if ($conges->isEmpty()) {
            $errorMessage = 'Livreur n\'a pas aucun Conges.';
            return redirect()->route('livreur')->withErrors($errorMessage);
        }

        // Pass the transfers data to the view
        return view('delivery.conge', ['conges' => $conges]);
    }
    public function voiture($id)
    {
        // Retrieve the livreur by ID
        $livreur = Itri_livreur::find($id);

        if (!$livreur) {
            // Handle the case where the livreur is not found
            return redirect()->route('livreur')->with('error', 'Livreur n existe pas.');
        }

        // Retrieve the avis for the livreur with the corresponding livreur
        $voitures = Itri_livreur_voiture::with('vehicule')->where('id_vehicule', $id)->get();

        // Check if the livreur has any voitures
        if ($voitures->isEmpty()) {
            $errorMessage = 'Livreur n a pas conduit aucun voitures.';
            return redirect()->route('livreur')->with('alert', $errorMessage);
        }

        // Pass the voitures$voitures data to the view
        return view('delivery.voiture', ['voitures' => $voitures]);
    }
}