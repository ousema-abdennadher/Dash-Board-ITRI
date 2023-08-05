<?php

namespace App\Http\Controllers;

use App\Models\Itri_citoyen;
use App\Models\Itri_request;
use PHPUnit\Framework\Constraint\Count;
use Illuminate\Support\Facades\DB;


class ChartController extends Controller
{
    public function chart()
    {
        setlocale(LC_TIME, 'fr_FR.UTF-8');
        $demandes = Itri_request::selectRaw('MONTH(date) as month, COUNT(*) as count')
            ->whereYear('date', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        $users = Itri_citoyen::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();


        $label1 = [];
        $label2 = [];
        $data1 = [];
        $data2 = [];
        $colors = ['#FF6633', '#FFB399', '#FF33FF', '#FFFF99', '#00B3E6', '#E6B333', '#3366E6', '#999966', '#99FF99', '#B34D4D', '#80B300', '#809900'];
        $monthNames = [
            1 => 'janvier',
            2 => 'février',
            3 => 'mars',
            4 => 'avril',
            5 => 'mai',
            6 => 'juin',
            7 => 'juillet',
            8 => 'août',
            9 => 'septembre',
            10 => 'octobre',
            11 => 'novembre',
            12 => 'décembre'
        ];
        for ($i = 1; $i <= 12; $i++) {
            $month = $monthNames[$i];            
            $count = 0;

            foreach ($demandes as $request) {
                if ($request->month == $i) {
                    $count = $request->count;
                    break;
                }
            }

            array_push($label1, $month);
            array_push($data1, $count);
        }
        for ($i = 1; $i <= 12; $i++) {
            $month = $monthNames[$i];
            $count = 0;

            foreach ($users as $user) {
                if ($user->month == $i) {
                    $count = $user->count;
                    break;
                }
            }

            array_push($label2, $month);
            array_push($data2, $count);
        }



        $datasets1 = [
            [
                'label' => 'Demandes',
                'data' => $data1,
                'backgroundColor' => $colors
            ]
        ];
        $datasets2 = [
            [
                'label' => 'Nombre de Citoyen',
                'data' => $data2,
                'backgroundColor' => $colors
            ]
        ];

        $requests = DB::table('itri_request')
        ->join('itri_colis', 'itri_request.id', '=', 'itri_colis.id_request')
        ->join('itri_dechet', 'itri_colis.id_dechet', '=', 'itri_dechet.id')
        ->join('itri_citoyen', 'itri_request.id_client', '=', 'itri_citoyen.id')
        ->join('itri_livreur', 'itri_request.id_livreur', '=', 'itri_livreur.id')
        ->select(
            'itri_request.date',
            'itri_request.point',
            'itri_request.status',
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
            

        return view('dashboard', compact('datasets1', 'label1','datasets2', 'label2','requests'));
    }
    
}