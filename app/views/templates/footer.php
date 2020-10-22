<?php

require_once dirname(__FILE__) . '../../../vendor/autoload.php';

Veritrans_Config::$serverKey = "SB-Mid-server-gxOdmq1-eNsrN5ZBiu6SRYpt";
Veritrans_Config::$isSanitized = true;
Veritrans_Config::$isProduction = false;
Veritrans_Config::$is3ds = true;
// Required
$transaction_details = array(
    'order_id' => rand(),
    'gross_amount' => 10000, // no decimal allowed for creditcard
);

// Optional
$item1_details = array(
    'id' => 'a1',
    'price' => 10000,
    'quantity' => 1,
    'name' => "Pembayaran Sks"
);

// Optional
$item_details = array($item1_details);

// Optional
$billing_address = array(
    // 'first_name'    => "Andri",
    // 'last_name'     => "Litani",
    // 'address'       => "Mangga 20",
    // 'city'          => "Jakarta",
    // 'postal_code'   => "16602",
    // 'phone'         => "081122334455",
    // 'country_code'  => 'IDN'
);

// Optional
$shipping_address = array(
    // 'first_name'    => "Obet",
    // 'last_name'     => "Supriadi",
    // 'address'       => "Manggis 90",
    // 'city'          => "Jakarta",
    // 'postal_code'   => "16601",
    // 'phone'         => "08113366345",
    // 'country_code'  => 'IDN'
);

// Optional
$customer_details = array(
    'first_name'    => "Mahasiswa",
    'last_name'     => "Litani",
    'email'         => "muhrifai554@gmail.com",
    'phone'         => "081122334455",
    // 'billing_address'  => $billing_address,
    // 'shipping_address' => $shipping_address
);

// Optional, remove this to display all available payment methods
// $enable_payments = array('credit_card', 'cimb_clicks', 'mandiri_clickpay', 'echannel');

// Fill transaction details
$transaction = array(
    // 'enabled_payments' => $enable_payments,
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
);

$snapToken = Veritrans_Snap::getSnapToken($transaction);
echo "snapToken = " . $snapToken;

?>

<!--Footer-->
<footer class="page-footer text-center font-small mt-4 wow fadeIn">

    <!--Copyright-->
    <div class="footer-copyright py-3">
        <a href="https://kodetr.com/" target="_blank"> Siakad </a>
        © 2019
    </div>
    <!--/.Copyright-->

</footer>
<!--/.Footer-->

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="http://localhost/siakadPayment/public/js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="http://localhost/siakadPayment/public/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="http://localhost/siakadPayment/public/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="http://localhost/siakadPayment/public/js/mdb.min.js"></script>
<!-- Initializations -->
<script type="text/javascript">
    // Animations initialization
    // console.log('oke')
    new WOW().init();
</script>


<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<!-- Bootstrap core CSS -->
<link href="http://localhost/siakadPayment/public/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="http://localhost/siakadPayment/public/css/mdb.min.css" rel="stylesheet">
<!-- Your custom styles (optional) -->
<!-- <link href="http://localhost/siakadPayment/public/css/style.min.css" rel="stylesheet"> -->
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-Qn-opZodkJstvvC8"></script>

<script type="text/javascript">
    // $(function() {
    //     $("#chekout-button").on("click", function() {
    //         location.href = "http://localhost/siakadPayment/public/checkout"

    //     });

    //     //   snap
    //     $("#bayar-modal").on("click", function(event) {
    //         const total = $("#total").val();
    //         const deskripsi = $("#deskripsi").val();

    //         $.ajax({
    //             url: "http://localhost/siakadPayment/public/snap/token",
    //             cache: false,
    //             // data: {
    //             //     gross_amount: total,
    //             //     deskripsi: deskripsi,
    //             // },
    //             // method: 'post',
    //             success: function('<?= $snapToken ?>') {
    //                 //location = data;
    //                 console.warn('dddddd === ', data)
    //                 var resultType = document.getElementById("result-type");
    //                 var resultData = document.getElementById("result-data");

    //                 function changeResult(type, data) {
    //                     $("#result-type").val(type);
    //                     $("#result-data").val(JSON.stringify(data));
    //                     //resultType.innerHTML = type;
    //                     //resultData.innerHTML = JSON.stringify(data);
    //                 }
    //                 snap.pay(data, {
    //                     onSuccess: function(result) {
    //                         changeResult("success", result);
    //                         console.log(result.status_message);
    //                         console.log(result);
    //                         $("#payment-form").submit();
    //                     },
    //                     onPending: function(result) {
    //                         changeResult("pending", result);
    //                         console.log(result.status_message);
    //                         $("#payment-form").submit();
    //                     },
    //                     onError: function(result) {
    //                         changeResult("error", result);
    //                         console.log(result.status_message);
    //                         $("#payment-form").submit();
    //                     },
    //                 });
    //             },
    //         });
    //     });
    // });
    var checkoutBtn = document.getElementById("bayar-modal");

    checkoutBtn.onclick = function() {
        // Open Snap popup with defined callbacks.
        snap.pay('<?= $snapToken ?>', {

            // Optional
            onSuccess: function(result) {
                console.log('okekeke,process')
                /* You may add your own js here, this is just example */
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            // Optional
            onPending: function(result) {
                console.log('okekeke,process pendiing')
                $.ajax({
                    url: "http://localhost/siakadPayment/public/notification",
                    cache: false,
                    success: function(data) {
                        console.log(data, 'datatata')
                    }
                })
                /* create or post data to database table request transaksi
                    Handle HTTP Notification
                */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            // Optional
            onError: function(result) {
                /* show error*/
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            }
        });
        // For more advanced use, refer to: https://snap-docs.midtrans.com/#snap-js

    }
</script>
</body>

</html>