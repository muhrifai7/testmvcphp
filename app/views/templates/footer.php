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
            location.href = "<?= base_url ?>checkout"

        });

        //   snap
        $("#bayar-modal").on("click", function(event) {
            const total = $("#total").val();
            const deskripsi = $("#deskripsi").val();
            const firstName = $("#firstName").val();
            const lastName = $("#lastName").val();
            const email = $("#email").val();
            const phone = $("#phoneNumber").val();
            console.log(total, deskripsi)
            $.ajax({
                url: "<?= base_url ?>snap/token",
                cache: false,
                data: {
                    gross_amount: total,
                    deskripsi: deskripsi,
                    email: email,
                    firstName: firstName,
                    lastName: lastName,
                    phone: phone
                },
                method: 'post',
                success: function(data) {
                    //location = data;
                    snap.pay(data, {
                        onSuccess: function(result) {
                            // $("#payment-form").submit();
                        },
                        onPending: function(result) {

                            console.warn('pending === ', data)
                            $.ajax({
                                url: "<?= base_url ?>snap/finish",
                                cache: false,
                                data: {
                                    transaksi: result
                                },
                                method: "post",
                                success: function(data) {
                                    console.log(data, 'datatat')
                                    // window.location.href("<?= base_url ?>snap/finish" + data)
                                }
                            })
                        },
                        onError: function(result) {
                            // changeResult("error", result);
                            // console.log(result.status_message);
                            // $("#payment-form").submit();
                        },
                    });
                },
            });
        });
    });
</script>
</body>

</html>