<!--Main layout-->
<main>
    <div class="container">

        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark mdb-color lighten-3 mt-3 mb-5">

        </nav>
        <!--/.Navbar-->

        <!--Section: Products v.3-->
        <section class="text-center mb-4">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Cicilan ke</th>
                        <th scope="col">jatuh Tempo</th>
                        <th scope="col">Wajib Bayar</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $colors = array("red", "green", "blue", "yellow");
                    $no = 0;
                    foreach ($colors as $value) {
                        $no++;
                        echo "<tr>";
                        echo "<td>" . $no . "</td>";
                        echo "<td>2020-12-02</td>";
                        echo "<td>Rp 10,000</td>";
                        echo '<td>
                               <a href="' . base_url . 'order" ">
                                <span class="badge badge-success">Detail</span>
                            </a>
                                </td>';
                        echo "</tr>";
                    }

                    ?>

                </tbody>
            </table>



        </section>
        <!--Section: Products v.3-->



    </div>
</main>
<!--Main layout-->