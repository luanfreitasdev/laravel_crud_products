<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $breadcumb = array();

    protected function setBreadcumb($item = null) {
        setlocale(LC_ALL, 'pt_BR.UTF-8');
        if(!is_null($item)) {

            $this->breadcumb[] = $item;
        }

        View::share('breadcumbItens', $this->breadcumb);
    }

    protected function denies () {
        return view('template.404');
    }
}
