<?php

namespace App\Http\Controllers;

use App\Models\Month;
use App\Models\Fisher;
use App\Models\Specie;
use App\models\Freight;
use App\models\FishStates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\FreightCaptureByFishersFilterRequest;

class CaptureController extends Controller
{

    public function captureBySpecies()
    {
        if (Auth::check()) {
            $function = new Fisher();
            $fishers = $function->fishers();
            $species = Specie::all();
            $fish_states = FishStates::all();

            $function = new Freight();
            $data = $function->relatoryCaptureBySpecie();

            $crustaceo = $data['crustaceo'];
            $molusco = $data['molusco'];
            $demersal = $data['demersal'];
            $pelagico = $data['pelagico'];

            return view('painel.relatories.capture-by-species', compact('fishers', 'species', 'fish_states'))
                ->with(
                    'crustaceo',
                    json_encode($crustaceo, JSON_NUMERIC_CHECK)
                )->with(
                    'molusco',
                    json_encode($molusco, JSON_NUMERIC_CHECK)
                )->with(
                    'demersal',
                    json_encode($demersal, JSON_NUMERIC_CHECK)
                )->with(
                    'pelagico',
                    json_encode($pelagico, JSON_NUMERIC_CHECK)
                )->with(
                    'data',
                    json_encode($data, JSON_NUMERIC_CHECK)
                );
        }
        return redirect()->route('login.form')->with('error', 'Precisa estar autenticado, por favor faça o login');
    }

    public function captureByFishers()
    {
        if (Auth::check()) {
            $function = new Fisher();
            $fishers = $function->fishers();
            $species = Specie::all();
            $fish_states = FishStates::all();

            $function = new Freight();
            $data = $function->relatoryCaptureByFishers();
            $names = $data['names'];
            $weights = $data['weights'];
            return view('painel.relatories.capture-by-fishers', compact('fishers', 'species', 'fish_states'))->with(
                'names',
                json_encode($names, JSON_NUMERIC_CHECK)
            )->with(
                'weights',
                json_encode($weights, JSON_NUMERIC_CHECK)
            );
        }
        return redirect()->route('login.form')->with('error', 'Precisa estar autenticado, por favor faça o login');
    }

    public function captureByFishersFilter(FreightCaptureByFishersFilterRequest $request)
    {
        if (Auth::check()) {
            $function = new Fisher();
            $fishers = $function->fishers();
            $species = Specie::all();
            $fish_states = FishStates::all();

            $function = new Freight();
            $data = $function->relatoryCaptureByFishersFilter($request->input('year'), $request->input('month'));
            $names = $data['names'];
            $weights = $data['weights'];

            $month = Month::where('id', $request->input('month'))->first()->name;
            $year = $request->input('year');
            return view('painel.relatories.capture-by-fishers-filter', compact('fishers', 'species', 'fish_states'))
                ->with(
                    'names',
                    json_encode($names, JSON_NUMERIC_CHECK)
                )->with(
                    'weights',
                    json_encode($weights, JSON_NUMERIC_CHECK)
                )->with(
                    'month',
                    json_encode($month, JSON_NUMERIC_CHECK)
                )->with(
                    'year',
                    json_encode($year, JSON_NUMERIC_CHECK)
                );
        }
        return redirect()->route('login.form')->with('error', 'Precisa estar autenticado, por favor faça o login');
    }
}
