<?php


class Transaksi extends Controller
{
    public function index($value = '')
    {

        $data["title"] = "Transaksi";
        $data['transaksi'] = $this->model('Transaksi_model')->getAll();
        $this->view("templates/header", $data);
        $this->view("transaksi/index", $data);
        $this->view("templates/footer");
    }
    public function page()
    {
        $this->view("transaksi/page");
    }
    // public function getAjax() {
    // 	$data = $this->model('Mahasiswa_model')->getAll();
    // 	echo json_encode($data);
    // }

    // public function addData() {	

    // 	$this->model('Mahasiswa_model')->addAjax($_POST);
    // }
    // public function delete($id) {
    // 	$this->model('Mahasiswa_model')->delete_mahasiswa($id);
    // }

}
