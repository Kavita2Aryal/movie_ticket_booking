<?php
namespace App\Traits;
use Illuminate\Support\Facades\Config;

trait General
{

    public $data=[];

    public function data($key,$value=null)
    {
        return $this->data[$key]= $value;
    }

    public  function title($back,$separator=' :: ',$front=null)
    {
        if(!isset($front)){
            $front = Config::get('title.title-name');
        }

        return $front.$separator.$back;
    }
}