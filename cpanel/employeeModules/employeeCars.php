<?php
session_start();

    if(!isset($_SESSION['id'])){
    header("Location: /index.php");
    }

    if(isset($_SESSION["rodzaj_konta"])){
        if($_SESSION["rodzaj_konta"] != 3 && $_SESSION["rodzaj_konta"] != 4)
          header("Location: ../index.php");
    }
    else{
        header("Location: ../index.php");
    }

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Car4You - Panel klienta</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Zmienić link do pliku jak nie działa -->
    <link rel="stylesheet" type="text/css" href="../css/dashboardstyles.css">


    <!-- Boxicons -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">



    <!-- Deafult Bootstrap theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Flatly Bootstrap theme -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/flatly/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-yrfSO0DBjS56u5M+SjWTyAHujrkiYVtRYh2dtB3yLQtUz3bodOeialO59u5lUCFF" crossorigin="anonymous"> -->
    <!-- Darkly Bootstrap theme -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/darkly/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rCA2D+D9QXuP2TomtQwd+uP50EHjpafN+wruul0sXZzX/Da7Txn4tB9aLMZV4DZm" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Nunito|Quicksand&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
    <!-- Zmienić link do pliku jak nie działa -->
    <script src="../js/collapse.js"></script>
    <script src="/cpanel/js/logout.js"></script>
    <script src="js/employeeModules.js"></script>
    <!-- Skrypty do modułów -->
</head>

<body>
    <!-- Nagłówek Navbar -->
    <section id="header">
        <?php
            include("../headerContent.php");
        ?>
    </section>
    <div class="container-fluid">
        <!-- Alert -->
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/alert.php';?>
        <div class="row" style="height: 100%;">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-lg-block bg-light sidebar position-fixed">
                <div class="sidebar-sticky">
                    <?php
                        include("../sidebarContent.php");
                    ?>

                </div>
            </nav>
            <!-- Breadcrumb -->
            <div class="col-lg-10 ml-sm-auto col-lg-10">
                <div class="row" style="z-index:2; margin-bottom: 80px;">
                    <nav class="position-fixed breadcrumbStyleFixed" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="index.php">Panel pracownika</a></li>
                            <li class="breadcrumb-item active">Pojazdy</li>
                            <li class="breadcrumb-item active" aria-current="page">Status Wypożyczeń</li>
                        </ol>
                    </nav>
                </div>
                <!-- CONTENT for webiste -->
                <div class="row px-4 pb-3">
                    <div class="col">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2
                            mb-3 border-bottom px-2">
                            <h1>Status wypożyczeń</h1>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-3">
                                <h3 class="ml-2">Filtruj</h3>
                                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-3 border-bottom px-2"></div>
                                <form class="statusPojazdowDane">
                                    <div class="form-group d-flex">
                                        <div class="mr-3">
                                            <label for="" class="col-form-label">Od:</label>
                                        </div>
                                        <div class="flex-grow-1">
                                            <?php
                                            $d=strtotime("-1 Months");
                                            $data = date("Y-m-d", $d); 
                                            ?>
                                            <input class="form-control" type="date" id="dataOd" name="dataOd"
                                                value=<?php echo '"'.$data.'"' ?> placeholder="Data Wynajmu Od" />
                                        </div>

                                    </div>
                                    <div class="form-group d-flex">
                                        <div class="mr-3">
                                            <label for="" class="col-form-label">Do:</label>
                                        </div>
                                        <div class="flex-grow-1">
                                            <input class="form-control" type="date" id="dataDo" name="dataDo"
                                                value=<?php echo '"'.date('Y-m-d').'"' ?>
                                                placeholder="Data Wynajmu Do" />
                                        </div>
                                    </div>
                                </form>
                                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center my-3 border-bottom px-2"></div>
                            </div>
                        </div>
                        <div class="statusContent table-responsive">
                            <table class="table table-striped table-hover text-center align-items-center border">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Imie</th>
                                        <th scope="col">Nazwisko</th>
                                        <th scope="col">Pojazd</th>
                                        <th scope="col">Status Przyjecia</th>
                                        <th scope="col">Status Płatności</th>
                                        <th scope="col">Status Realizacji</th>
                                    </tr>
                                </thead>
                                <tbody id="tabelaStatus">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</body>
<script>
    zaladujStatus();
</script>

</html>



<!-- Statusy Pojazdów - Pracownik -->