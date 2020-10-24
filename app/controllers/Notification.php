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

        if ($transaction == 'capture') {
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    // TODO set payment status in merchant's database to 'Challenge by FDS'
                    // TODO merchant should decide whether this transaction is authorized or not in MAP
                    echo "Transaction order_id: " . $order_id . " is challenged by FDS";
                } else {
                    // TODO set payment status in merchant's database to 'Success'
                    echo "Transaction order_id: " . $order_id . " successfully captured using " . $type;
                }
            }
        } else if ($transaction == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            $this->model('Notification_model')->handleSettlement($notif);
            echo "Transaction order_id: " . $order_id . " successfully transfered using " . $type;
        } else if ($transaction == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            $this->model('Notification_model')->handlePending($notif);
            echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
        } else if ($transaction == 'deny') {
            // TODO set payment status in merchant's database to 'Denied'
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
        } else if ($transaction == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is expired.";
        } else if ($transaction == 'cancel') {
            // TODO set payment status in merchant's database to 'Denied'
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is canceled.";
        }
    }
}
