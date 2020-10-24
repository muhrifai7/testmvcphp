<?php

require_once dirname(__FILE__) . '../../vendor/autoload.php';


class Order extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data["title"] = "Order";
        $this->view("templates/header", $data);
        $this->view('order/index');
        $this->view("templates/footer");
    }
}
