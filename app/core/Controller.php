<?php

class Controller
{
    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . ".php";
    }
    public function model($model)
    {
        require_once "../app/models/" . $model . ".php";

        return new $model;
    }

    public function midtrans($model)
    {
        require_once "../app/libraries/" . $model . ".php";
        return new $model;
    }
}
