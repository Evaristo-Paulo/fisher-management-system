<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    public function RolesFromUser ( $id ){
        return \DB::select('SELECT r.type, r.id FROM roles r, role_users rs, users s Where rs.user_id = ? and rs.role_id = r.id Group by r.type, r.id', [$id]);
    }
}
