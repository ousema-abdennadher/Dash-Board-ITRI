<?php

namespace App\Http\Controllers;

use App\Models\Itri_dechet;
use Illuminate\Http\Request;

class DechetController extends Controller
{

    public function dechet()
    {
        $dechet = Itri_dechet::get();
        return view('garbage.dechet', ['data' => $dechet]);
    }
    public function ajout_dechet()
    {
        return view('garbage.ajout_dechet');
    }

    public function add(Request $request)
    { {
            $data = [
                'poids' => $request->poids,
                'type' => $request->type,
                'tel' => $request->tel,
                'sous_type' => $request->sous_type,
                'objet' => $request->objet,
                'point_kg' => $request->point_kg,
            ];
            Itri_dechet::create($data);
            return redirect()->route('dechet');
        }
    }
    public function edit($id)
    {
        $dechet = Itri_dechet::find($id);

        return view('garbage.ajout_dechet', ['dechet' => $dechet]);
    }
    public function update($id, Request $request)
    { {
            $dechet = Itri_dechet::find($id);
            $data = [
                'poids' => $request->poids,
                'type' => $request->type,
                'tel' => $request->tel,
                'sous_type' => $request->sous_type,
                'objet' => $request->objet,
                'point_kg' => $request->point_kg,
            ];
            $dechet->update($data);
            return redirect()->route('dechet');
        }
    }
}
