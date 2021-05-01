<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Freight extends Model
{
    protected $fillable = [
        'fisher_id',
        'weight',
        'fishing_date',
        'resource_id',
        'fish_state_id',
    ];
    
    public function freights()
    {
        return \DB::select('Select f.name, sp.name as specie, r.name as resource, fs.state, fr.weight, fr.fishing_date as date from fishers f, freights fr, resources r, species sp, fish_states fs where fr.fisher_id = f.id and fr.fish_state_id = fs.id and fr.resource_id = r.id and r.specie_id = sp.id and f.status = 1');
    }

    public function relatoryCaptureByFishers()
    {
        $data = \DB::select('Select f.id, f.name , sum(fr.weight) as weight from freights fr, fishers f where f.id = fr.fisher_id and f.status = 1 group by f.id, f.name');
        $fishers = \DB::select('Select f.id, f.name from fishers f where f.status = 1');

        $names = [];
        $weights = [];
        foreach ($fishers as $fisher) {
            $weight = 0;
            foreach ($data as $dt) {
                if ($fisher->id  == $dt->id) {
                    $weight = $dt->weight;
                }
            }
            array_push($names, $fisher->name);
            array_push($weights, $weight);
        }

        $data = [
            'names' => $names,
            'weights' => $weights,
        ];

        return $data;
    }


    public function relatoryCaptureByFishersFilter($year, $month)
    {
        $data = \DB::select('Select f.id, f.name , sum(fr.weight) as weight from freights fr, fishers f where f.id = fr.fisher_id and f.status = 1 and extract(YEAR from fr.fishing_date ) = ? and extract(MONTH from fr.fishing_date ) = ? group by f.id, f.name', [$year, $month]);
        $fishers = \DB::select('Select f.id, f.name from fishers f where f.status = 1');

        $names = [];
        $weights = [];
        foreach ($fishers as $fisher) {
            $weight = 0;
            foreach ($data as $dt) {
                if ($fisher->id  == $dt->id) {
                    $weight = $dt->weight;
                }
            }
            array_push($names, $fisher->name);
            array_push($weights, $weight);
        }

        $data = [
            'names' => $names,
            'weights' => $weights,
        ];

        return $data;
    }

    public function relatoryCaptureBySpecie()
    {
        $data = \DB::select('Select sp.id, sum(fr.weight) as weight from freights fr, fishers f, resources r, species sp where f.id = fr.fisher_id and f.status = 1 and fr.resource_id = r.id and r.specie_id = sp.id group by sp.id');
        $resources = \DB::select('select sp.id, sp.name from species sp');

        $names = [];
        $weights = [];
        foreach ($resources as $resource) {
            $weight = 0;
            foreach ($data as $dt) {
                if ($resource->id  == $dt->id) {
                    $weight = $dt->weight;
                }
            }
            array_push($names, $resource->name);
            array_push($weights, $weight);
        }
        $crustaceo = $molusco = $pelagico = $demersal = [];

        foreach ($names as $key => $name) {
            if ($name == 'Crustáceo') {
                $crustaceo = [
                    $name => $weights[$key]
                ];
            }
            if ($name == 'Molusco') {
                $molusco = [
                    $name => $weights[$key]
                ];
            }
            if ($name == 'Pelágico') {
                $pelagico = [
                    $name => $weights[$key]
                ];
            }
            if ($name == 'Demersal') {
                $demersal = [
                    $name => $weights[$key]
                ];
            }
        }

        $data = [
            'crustaceo' => $crustaceo,
            'demersal' => $demersal,
            'molusco' => $molusco,
            'pelagico' => $pelagico,
        ];

        return $data;
    }
}
