<main>
    <div class="container">

        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark mdb-color lighten-3 mt-3 mb-5">

        </nav>
        <!--/.Navbar-->

        <!--Section: Products v.3-->
        <section class="mb-4">
            <div class="jumbotron">
                <?php

                $payload["order_id"] = "213212132144";
                $payload["status_message"] = "Pembayaran Sedang Di Proses";
                $payload["va_numbers"] = "213212132144";
                $payload["transaction_time"] = "2020-10-14";
                ?>
                <h4 class="display-4">Order Id <?= $payload["order_id"] ?></h4>
                <h5 class="lead">Status : <?= $payload["status_message"] ?></h5>

                <hr class="my-4">
                <h5 class="lead">Dear Mahasiswa</h5>
                <p class="lead">Anda telah memilih untuk membayar menggunakan bank transfer. Silakan menyelesaikan pembayaran:</p>
                <hr class="my-4">
                <h5 class="lead">Transfer Ke</h5>
                <p>Bank : BCA</p>
                <p>Virtual Account Number : <?= $payload["va_numbers"] ?></p>
                <p>Batas Pembayaran : <?= $payload["transaction_time"] ?> Asia/Jakarta</p>
                <hr class="my-4">
                <p>Kami juga telah mengirimkan Kode pembayaran ke email @example.com</p>

            </div>
        </section>
    </div>
</main>