<?php


class Checkout extends Controller
{
    public function index($value = '')
    {
        $data["title"] = "Checkout";
        $this->view("templates/header", $data);
        $this->view("checkout/index");
        $this->view("templates/footer");
    }
}
