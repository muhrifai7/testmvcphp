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
    $(function() {
        $("#chekout-button").on("click", function() {
            location.href = "http://localhost/siakadPayment/public/checkout"

        });

        //   snap
        $("#bayar-modal").on("click", function(event) {
            const total = $("#total").val();
            const deskripsi = $("#deskripsi").val();

            $.ajax({
                url: "http://localhost/siakadPayment/public/snap/token",
                cache: false,
                // data: {
                //     gross_amount: total,
                //     deskripsi: deskripsi,
                // },
                // method: 'post',
                success: function(data) {
                    //location = data;
                    console.warn('dddddd === ', data)
                    var resultType = document.getElementById("result-type");
                    var resultData = document.getElementById("result-data");

                    function changeResult(type, data) {
                        $("#result-type").val(type);
                        $("#result-data").val(JSON.stringify(data));
                        //resultType.innerHTML = type;
                        //resultData.innerHTML = JSON.stringify(data);
                    }
                    snap.pay(data, {
                        onSuccess: function(result) {
                            changeResult("success", result);
                            console.log(result.status_message);
                            console.log(result);
                            $("#payment-form").submit();
                        },
                        onPending: function(result) {
                            changeResult("pending", result);
                            console.log(result.status_message);
                            $("#payment-form").submit();
                        },
                        onError: function(result) {
                            changeResult("error", result);
                            console.log(result.status_message);
                            $("#payment-form").submit();
                        },
                    });
                },
            });
        });
    });
</script>
</body>

</html>