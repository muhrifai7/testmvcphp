<?php

require_once dirname(__FILE__) . '../../vendor/autoload.php';


class Snap extends Controller
{
    public function __construct()
    {

        Veritrans_Config::$serverKey = "SB-Mid-server-gxOdmq1-eNsrN5ZBiu6SRYpt";
        Veritrans_Config::$isSanitized = true;
        Veritrans_Config::$isProduction = false;
        Veritrans_Config::$is3ds = true;
        // $params = array('server_key' => 'SB-Mid-server-gxOdmq1-eNsrN5ZBiu6SRYpt', 'production' => false);
        // // $this->load->library('midtrans');
        // $this->midtrans("Midtrans")->config($params);
    }

    public function index()
    {
        $data["title"] = "Checkout";
        $this->view("templates/header", $data);
        $this->view('checkout/index');
        $this->view("templates/footer");
    }

    public function token()
    {

        $gross_amount = $_POST["gross_amount"];
        $deskripsi = $_POST["deskripsi"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        // Requied
        $transaction_details = array(
            'order_id' => rand(),
            'gross_amount' => $gross_amount, // no decimal allowed for creditcard
        );

        // Optional
        $item1_details = array(
            'id' => 'a1',
            'price' => 10000,
            'quantity' => 1,
            'name' => $deskripsi
        );

        // Optional
        $item_details = array($item1_details);



        // Optional
        $customer_details = array(
            'first_name'    => $firstName,
            'last_name'     => $lastName,
            'email'         => $email,
            'phone'         => $phone,

        );

        // Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;


        $transaction = array(
            'transaction_details' => $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
        );

        $snapToken = Veritrans_Snap::getSnapToken($transaction);
        echo $snapToken;
    }

    public function finish()
    {
        $result = json_decode($_POST['result-data']);
        // $result = $_POST['transaksi'];s

        echo 'RESULT <br><pre>';
        var_dump($result);
        echo '</pre>';
        $data["title"] = "Pembayaran Anda";
        $this->view("templates/header", $data);
        $this->view('checkout/konfirmasi');
        $this->view("templates/footer");
    }
}
