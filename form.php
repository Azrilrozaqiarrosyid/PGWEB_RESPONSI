<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content />
    <meta name="author" content />
    <title>MESEM</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.html">MESEM</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="form.php">Form</a></li>
                            <li class="nav-item"><a class="nav-link" href="data.php">Data</a></li>
                            <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                        </ul>
                    </div>
                </div>
        </nav>

        <!-- Page content-->
        <section class="py-5">
            <div class="container px-5">

                <!-- Contact form-->
                <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                    <div class="text-center mb-5">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                class="bi bi-envelope"></i></div>
                        <h1 class="fw-bolder">ISI SENTRA INDUSTRI</h1>
                        <p class="lead fw-normal text-muted mb-0"></p>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-3">
                            <form action="isi.php" onsubmit="return validateForm()" method="post">
                                <label for="Nama_Sentra">Nama Sentra:</label><br>
                                <input type="text" id="Nama_Sentra" name="Nama_Sentra" value=""><br>
                                <label for="Alamat">Alamat:</label><br>
                                <input type="text" id="Alamat" name="Alamat" value=""><br>
                                <label for="Kelompok_Cabang">Kelompok Cabang:</label><br>
                                <input type="text" id="Kelompok_Cabang" name="Kelompok_Cabang" value=""><br>
                                <label for="Tahun_Berdiri">Tahun Berdiri:</label><br>
                                <input type="text" id="Tahun_Berdiri" name="Tahun_Berdiri" value=""><br>
                                <label for="Latitude">Latitude:</label><br>
                                <input type="text" id="Latitude" name="Latitude" value=""><br><br>
                                <label for="Longitude">Longitude:</label><br>
                                <input type="text" id="Longitude" name="Longitude" value=""><br><br>
                                <input type="submit" value="Submit">
                            </form>
                            <p id="informasi"></p>
                            <script>
                                function validateForm() {
                                    let Tahun = document.getElementById("Tahun").value;
                                    let text = "";
                                    if (isNaN(Tahun) || Tahun < 1) {
                                        text = "Data tahun harus angka";
                                        // stop the form submission
                                        event.preventDefault();
                                    }
                                    document.getElementById("informasi").innerHTML = text;
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer-->
    <footer class="bg-dark py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0 text-white">Copyright &copy; MESEM SLEMAN 2023</div>
                </div>
                <div class="col-auto">
                    <a class="link-light small" href="slemankab.go.id">Privacy</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="slemankab.go.id">Address</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="slemankab.go.id">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>