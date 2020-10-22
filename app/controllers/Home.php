<?php


class Home extends Controller
{
    public function index($value = '')
    {
        $data["title"] = "Home";
        $this->view("templates/header", $data);
        $this->view("home/index");
        $this->view("templates/footer");

        // $data['title'] = 'Admin Page';
        // $data['mahasiswa'] = $this->model('Mahasiswa_model')->getAll();

        // $this->view('templates/header', $data);
        // $this->view('templates/topbar',$data);
        // $this->view('templates/sidebar',$data);
        // $this->view('admin/index', $data);
        // $this->view('templates/footer',$data);
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
