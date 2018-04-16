<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function test()
    {

        $result= Modulo::whereNotIn('idmodulo', function ($query) {
            $query->selectRaw('idmodulo from moduloperfil where idperfil = 2');
        })->get();

        DB::table('users')
            ->whereNotIn(function ($query) {
                $query->select('id')
                    ->from('orders')
                    ->where('orders.user_id = users.id');
            })
            ->get();
    }
}

