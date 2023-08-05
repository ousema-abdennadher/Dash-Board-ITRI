<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    public function request()
    {
        // Retrieve the citoyen by ID
        $requests=DB::table('itri_request')
        ->join('itri_colis', 'itri_request.id', '=', 'itri_colis.id_request')
        ->join('itri_dechet', 'itri_colis.id_dechet', '=', 'itri_dechet.id')
        ->join('itri_citoyen', 'itri_request.id_client', '=', 'itri_citoyen.id')
        ->join('itri_livreur', 'itri_request.id_livreur', '=', 'itri_livreur.id')
        ->select( 'itri_request.date',
            'itri_request.point',
            'itri_request.status',
            'itri_request.created_at',
            'itri_colis.id_request',
            'itri_colis.poids_estimee',
            'itri_colis.poids_reel',
            'itri_citoyen.nom as citizen_nom',
            'itri_citoyen.prenom as citizen_prenom',
            'itri_livreur.nom as delivery_nom',
            'itri_livreur.prenom as delivery_prenom',
            'itri_dechet.type',
            'itri_dechet.sous_type',
            'itri_dechet.objet',
        )
        ->get();
            
            

        

        // Pass the avis data to the view
        return view('request', ['requests' => $requests]);
    }

}   
