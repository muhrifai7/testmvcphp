<!--Footer-->
<footer class="page-footer text-center font-small mt-4 wow fadeIn">

    <!--Copyright-->
    <div class="footer-copyright py-3">
        <pre><div id="result-json">JSON result will appear here after payment:<br></div></pre>

        <a href="https://kodetr.com/" target="_blank"> Siakad </a>
        © 2019
    </div>
    <!--/.Copyright-->

</footer>
<!--/.Footer-->

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="<?= base_url ?>js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="<?= base_url ?>js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="<?= base_url ?>js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="<?= base_url ?>js/mdb.min.js"></script>
<!-- Initializations -->
<script type="text/javascript">
    // Animations initialization
    // console.log('oke')
    new WOW().init();
</script>


<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<!-- Bootstrap core CSS -->
<link href="<?= base_url ?>css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="<?= base_url ?>css/mdb.min.css" rel="stylesheet">
<!-- Your custom styles (optional) -->
<!-- <link href="<?= base_url ?>css/style.min.css" rel="stylesheet"> -->
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
            const firstName = "rifai";
            const lastName = "muh";
            const email = "muhrifai554@gmail.com";
            const phone = "082122597253";
            $.ajax({
                url: "<?= base_url ?>snap/token",
                cache: false,
                data: {
                    gross_amount: total,
                    deskripsi: "pembayaran spp",
                    email: email,
                    firstName: firstName,
                    lastName: lastName,
                    phone: phone
                },
                method: 'post',
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
                            // $("#payment-form").submit();
                            console.log('okekeke,process pendiing')
                            $.ajax({
                                url: "<?= base_url ?>snap/finish",
                                cache: false,
                                data: {
                                    transaksi: result
                                },
                                method: "post",
                                success: function(data) {
                                    console.log(data, 'datatata')
                                }
                            })
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