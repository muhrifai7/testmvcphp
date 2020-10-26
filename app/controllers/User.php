<?php


class User extends Controller
{
    public function index($value = '')
    {
        $data = $this->model('Transaksi_model')->getAllTodo();
        $out = array_values($data);
        $result = json_encode($out);
        echo $result;
    }

    public function update()
    {
        // $id = $_GET['id'];
        // echo $id;
        $data = json_decode(file_get_contents('php://input'), true);
        $data = $this->model('Transaksi_model')->updateTodo($data);
        echo $data;
    }

    public function addData()
    {

        $data = json_decode(file_get_contents('php://input'), true);
        $result = $this->model('Transaksi_model')->addTodo($data);
        echo $result;
    }
    public function delete()
    {
        $parts = explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

        $result = $this->model('Transaksi_model')->deleteTodo($parts[5]);
        echo $result;
    }
}
