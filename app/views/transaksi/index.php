<?php header("Access-Control-Allow-Origin: *");
header("Content-Type: text/event-stream");
header("Cache-Control: no-cache"); ?>
<!DOCTYPE html>
<html>

<body>

    <!--Main layout-->
    <main>
        <div class="container">

            <!--Navbar-->
            <nav class="navbar navbar-expand-lg navbar-dark mdb-color lighten-3 mt-3 mb-5">

            </nav>
            <!--/.Navbar-->

            <!--Section: Products v.3-->
            <section class="text-center mb-4">

                <!--Grid row-->
                <div class="row wow fadeIn">

                    <!--Grid column-->
                    <div class="">

                        <!--Card-->
                        <div class="card">

                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">no</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Pesan</th>
                                        <th scope="col">Transaksi id</th>
                                        <th scope="col">Order id</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($data["transaksi"] as $value) {
                                        $no++;
                                        echo "<tr>";
                                        echo "<td>" . $no . "</td>";
                                        echo "<td>" . $value['transaction_status'] . "</td>";
                                        echo "<td>" . $value['status_message'] . "</td>";
                                        echo "<td>" . $value['transaction_id'] . "</td>";
                                        echo "<td>" . $value['order_id'] . "</td>";
                                        echo "<td>" . $value['gross_amount'] . "</td>";
                                        echo "</tr>";
                                    }

                                    ?>

                                </tbody>
                            </table>

                        </div>
                        <!--Card-->

                    </div>
                    <!--Grid column-->


                </div>
            </section>
            <!--Section: Products v.3-->



        </div>
    </main>


</body>

</html>