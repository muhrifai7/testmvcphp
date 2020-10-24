<main>
    <div class="container">

        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark mdb-color lighten-3 mt-3 mb-5">

        </nav>
        <!--/.Navbar-->

        <!--Section: Products v.3-->
        <section class="">
            <div class="card" style="width: 38rem;">
                <div class="card-body">
                    <h5 class="card-title">Checkout</h5>
                    <div class="d-flex flex-row bd-highlight mb-3">
                        <div class="p-2 bd-highlight">
                            <div class="form-group">
                                <label for="total">Total</label>
                                <input type="numer" class="form-control" id="total" value="10000">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <input type="text" class="form-control" id="deskripsi" placeholder="Pemabayaran sks">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" value="muhrifai2111@gmail.com">
                            </div>
                            <div class="form-group">
                                <label for="phoneNumber">No Telepon</label>
                                <input type="text" class="form-control" id="phoneNumber" value="082122597253">
                            </div>
                        </div>
                        <div class="p-2 bd-highlight">
                            <div class="form-group">
                                <label for="deskripsi">Nama Depan</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Nama" value="Doe">
                            </div>
                            <div class="form-group">
                                <label for="lastName">Nama Belakang</label>
                                <input type="text" class="form-control" id="lastName" value="10000" value="John">
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <button id="bayar-modal" class="btn btn-primary">bayar!</button>
                        </div>

                    </div>

                    <form id="payment-form" method="post" action="/snap/finish">
                        <input type="hidden" name="result_type" id="result-type" value="">
                </div>
                <input type="hidden" name="result_data" id="result-data" value="">
            </div>
            </form>


    </div>
    </div>
    <!--Grid row-->
    <div class="row wow fadeIn">

    </div>
    </section>
    </div>
</main>