<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fisher extends Model
{
    public function fishers()
    {
        return \DB::select('Select f.id, f.phone, f.name, g.type as gender, ft.type as fisher_type, f.bi as bi, f.birthday, f.email, f.photo, m.name as municipe, p.name as province from fishers f, fisher_types ft, genders g, provinces p, municipes m where f.fisher_type_id = ft.id and f.gender_id = g.id and f.municipe_id = m.id and m.province_id = p.id and f.status = 1');
    }
    public function getFisher($id)
    {
        return \DB::select('Select f.id, f.phone, f.name, g.type as gender, ft.type as fisher_type, f.bi as bi, f.birthday, f.email, f.photo, m.name as municipe, p.name as province, f.nif from fishers f, fisher_types ft, genders g, provinces p, municipes m where f.id = ? and f.fisher_type_id = ft.id and f.gender_id = g.id and f.municipe_id = m.id and m.province_id = p.id and f.status = 1', [$id]);
    }

    protected $fillable = [
        'name',
        'birthday',
        'bi',
        'phone',
        'email',
        'municipe_id',
        'fisher_type_id',
        'photo',
        'gender_id',
    ];
}
