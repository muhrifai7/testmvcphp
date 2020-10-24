<?php

require_once dirname(__FILE__) . '../../vendor/autoload.php';

class Notification extends Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -  
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */


    public function __construct()
    {
        // parent::__construct();
        Veritrans_Config::$serverKey = "SB-Mid-server-gxOdmq1-eNsrN5ZBiu6SRYpt";
        Veritrans_Config::$isSanitized = true;
        Veritrans_Config::$isProduction = false;
        Veritrans_Config::$is3ds = true;
    }

    public function index()
    {
        $notif = json_decode(file_get_contents('php://input'), true);

        $transaction = $notif["transaction_status"];
        $type = $notif["payment_type"];
        $order_id = $notif["order_id"];
        $status_code = $notif["status_code"];
        $fraud = $notif["fraud_status"];
        $gross_amount = $notif["gross_amount"];
        // handle signature
        /*
        $validSignatureKey = hash("sha512", $order_id, $status_code, $gross_amount, "SB-Mid-server-gxOdmq1-eNsrN5ZBiu6SRYpt");
        echo $validSignatureKey;
        if($notif["signature_key"] !== $validSignatureKey){
            return "error";
            exit();
        }
        */
        // handle signature
        $va_number = null;
        $vendorName = null;
        if (!empty($notif["va_number"])) {
            $va_number = $notif["va_number"];
            $vendorName = $notif["vendorName"];
        };
        $notif["vendorName"] = $vendorName;
        $notif["va_number"] = $va_number;

        $transaction_status = "pending";
        if ($transaction == 'capture') {
        } else if ($transaction == 'settlement') {
            $transaction_status = "settlement";
        } else if ($transaction == 'pending') {
            $transaction_status = "pending";
        } else if ($transaction == 'deny') {
            $transaction_status = "deny";
        } else if ($transaction == 'expire') {
            $transaction_status = "expire";
        } else if ($transaction == 'cancel') {
            $transaction_status = "cancel";
        };

        $paymentParams = [
            "order_id" => $order_id,
            "va_numbers" => $notif["va_number"],
            "transaction_time" => $notif["transaction_time"],
            "gross_amount" => $notif["gross_amount"],
            "order_id" => $notif["order_id"],
            "payment_type" => $notif["payment_type"],
            "signature_key" => $notif["signature_key"],
            "status_code" => $notif["status_code"],
            "transaction_id" => $notif["transaction_id"],
            "transaction_status" => $transaction_status,
            "fraud_status" => $notif["fraud_status"],
            "status_message" => $notif["status_message"],
        ];

        $this->model('Notification_model')->handlePayment($paymentParams);
    }

    public function finish()
    {
        echo "finish";
    }

    public function unfinish()
    {
        echo "unfinish";
    }
    public function error()
    {
        echo "erororro";
    }
}
