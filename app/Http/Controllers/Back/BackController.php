<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackController extends Controller
{
    protected $pagePath = 'back/';
    protected $pages;

    public function __construct()
    {
        $this->data('title',$this->title('welcome'));
        $this->data('appType',$this->pagePath);
        $this->pages = $this->pagePath.'/';
    }
}
