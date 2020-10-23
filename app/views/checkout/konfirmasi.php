<main>
    <div class="container">

        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark mdb-color lighten-3 mt-3 mb-5">

        </nav>
        <!--/.Navbar-->

        <!--Section: Products v.3-->
        <section class="text-center mb-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Checkout</h5>
                    <form>
                        <div class="form-group">
                            <label for="total">Total</label>
                            <input type="numer" class="form-control" id="total" value="10000">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" placeholder="Pemabayaran sks">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <form id="payment-form" method="post" action="/snap/finish">
                        <input type="hidden" name="result_type" id="result-type" value="">
                </div>
                <input type="hidden" name="result_data" id="result-data" value="">
            </div>
            </form>

            <button id="bayar-modal">bayar!</button>
    </div>
    </div>
    <!--Grid row-->
    <div class="row wow fadeIn">

    </div>
    </section>
    </div>
</main>