<?php

namespace App\Http\Controllers;

use App\Models\Itri_vehicule;
use App\Models\Itri_livreur_voiture;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    public function vehicule()
    {
        $vehicule = Itri_vehicule::get();
        return view('cars.vehicule', ['data' => $vehicule]);
    }
    public function addvehicule()
    {
        return view('cars.addvehicule');
    }

    public function add(Request $request)
    { {
            $data = [
                'mark' => $request->mark,
                'capacite' => $request->capacite,
                'charge' => $request->charge,
                'etat' => $request->etat,
            ];
            Itri_vehicule::create($data);
            return redirect()->route('vehicule');
        }
    }
    public function edit($id)
    {
        $vehicule = Itri_vehicule::find($id);

        return view('cars.addvehicule', ['vehicule' => $vehicule]);
    }
    public function update($id, Request $request)
    { {
            $vehicule = Itri_vehicule::find($id);
            $data = [
                'mark' => $request->mark,
                'capacite' => $request->capacite,
                'charge' => $request->charge,
                'etat' => $request->etat,
            ];
            $vehicule->update($data);
            return redirect()->route('vehicule');
        }
    }
    public function voiture($id)
    {
        // Retrieve the livreur by ID
        $voitures = Itri_vehicule::find($id);

        if (!$voitures) {
            // Handle the case where the livreur is not found
            return redirect()->route('vehicule')->with('error', 'Vehiucle n existe pas.');
        }

        // Retrieve the avis for the livreur with the corresponding livreur
        $voitures = Itri_livreur_voiture::with('livreur')->where('id_livreur', $id)->get();

        // Check if the livreur has any voitures
        if ($voitures->isEmpty()) {
            $errorMessage = 'Voiture n a pas conduit par aucun livreur.';
            return redirect()->route('livreur')->with('alert', $errorMessage);
        }

        // Pass the voitures$voitures data to the view
        return view('cars.voiture', ['voitures' => $voitures]);
    }
    
}
