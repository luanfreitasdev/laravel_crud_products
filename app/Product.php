<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{

    protected $table = 'products';

    protected $fillable = [
        'title','image','status'
    ];

    public static function getStatusPermission()
    {
        $status = [];
        (Auth::user()->can('resource', 'product.status_pending')) ? $status[] = array('id' => 0, 'value' => 'Pendente'): null;
        (Auth::user()->can('resource', 'product.status_under_analysis')) ? $status[] = array('id' => 1, 'value' => 'Em Analise'): null;
        (Auth::user()->can('resource', 'product.status_okay')) ? $status[] = array('id' => 2, 'value' => 'Aprovado'): null;
        (Auth::user()->can('resource', 'product.status_disapproved')) ? $status[] = array('id' => 3, 'value' => 'Reprovado'): null;

        return $status;
    }

    public function getStatus () {
        $status = [
            '<span class="badge outline-badge-warning badge-pill">Pendente</span>',
            '<span class="badge outline-badge-primary badge-pill">Em analise</span>',
            '<span class="badge outline-badge-success badge-pill">Aprovado</span>',
            '<span class="badge outline-badge-danger badge-pill">Reprovado</span>'
        ];
        return $status[$this->status];
    }
}
