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

        $result = $_POST['transaksi'];
        // craete ke database
        $this->model('Transaksi_model')->addDataTransaction($_POST["transaksi"]);
        $data["title"] = "Pembayaran Anda";
        $this->view("templates/header", $data);
        $this->view('checkout/konfirmasi');
        $this->view("templates/footer");
        header("Location: http://localhost/siakadPayment/checkout/konfirmasi");
    }
}

// mandiri
//  ["status_code"]=>
//   string(3) "201"
//   ["status_message"]=>
//   string(25) "Transaksi sedang diproses"
//   ["transaction_id"]=>
//   string(36) "dd06c68d-5642-462a-98be-852a323e82a0"
//   ["order_id"]=>
//   string(10) "2036393442"
//   ["gross_amount"]=>
//   string(8) "10000.00"
//   ["payment_type"]=>
//   string(8) "echannel"
//   ["transaction_time"]=>
//   string(19) "2020-10-24 11:04:11"
//   ["transaction_status"]=>
//   string(7) "pending"
//   ["fraud_status"]=>
//   string(6) "accept"
//   ["bill_key"]=>
//   string(11) "47201510147"
//   ["biller_code"]=>
//   string(5) "70012"
//   ["pdf_url"]=>
//   string(94) "https://app.sandbox.midtrans.com/snap/v1/transactions/7f6f9fa7-9612-4b4f-bd22-241ecb4494aa/pdf"
//   ["finish_redirect_url"]=>
//   string(88) "http://example.com/finish?order_id=2036393442&status_code=201&transaction_status=pending"
