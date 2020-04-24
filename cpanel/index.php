<!-- Index file for Client pannel 
W divach "komunikat" musi być miejsce na wyświetlanie tekstu do walidacji jak w rejestracji.
W spanach są umieszczone nazwy zakładek do menu z lewej strony.
Opis samochodu fajnie żeby miał większe okno.
Przy VIN i NR tablicy można by było zrobić dymek z informacja dalczego o to pytamy(dla bezpeiczensta,ubezpeiczenai itd.)
Przejście do edycji samochodu ma być w statusie nie róbcie go w menu(tylko front niego).
-->
<?php
session_start();

    if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
    }

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/cpanel/include/include.php';?>
    <script src="./js/index.js"></script>
    <script src="js/collapse.js"></script>
    <script src="/cpanel/js/logout.js"></script>
</head>

<body>
    <!-- Nagłówek Navbar -->
    <section id="header">
        <?php
            include("headerContent.php");
        ?>
    </section>
    <div class="container-fluid">
        <!-- Alert -->
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/alert.php';?>
        <div class="row">
            <nav class="col-md-2 d-none d-lg-block bg-light sidebar position-fixed">
                <div class="sidebar-sticky">

                    <!-- Sidebar -->
                    <?php
                        include("sidebarContent.php");
                    ?>

                </div>
            </nav>
            <!-- Main Dashboard -->
            <div class="col-lg-10 ml-sm-auto col-lg-10">
                <div class="row" style="z-index:2; margin-bottom: 80px;" >
                    <nav class="position-fixed breadcrumbStyleFixed" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="index.php">Panel klienta</a></li>
                        </ol>
                    </nav>
                </div>
                <!-- <div class="row px-4 mb-2">
                    <div class="col">
                        <input class="form-control form-control-sm w-100" type="text" placeholder="Szukaj"
                            aria-label="Search">
                    </div>
                </div> -->
                <div class="row px-4">
                    <div class="col">
                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom px-2">
                            <h1>
                                <?php
                                    echo 'Witaj, '.$_SESSION["imie"]. ' '.$_SESSION["nazwisko"];
                                ?>
                            </h1>
                        </div>
                        <div class="card border-primary">
                            <div class="card-header">
                                Sprawdź to!
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Odbierz nagrodę</h5>
                                <p class="card-text">Dzięki Twojemu wkładowi w rozwój wypożyczalni, możesz już teraz
                                    odebrać nagrodę za lojalność.</p>
                                <a href="#" class="btn btn-primary">Odbierz nagrodę</a>
                            </div>
                            <div class="card-footer text-muted">
                                2 days ago
                            </div>
                        </div>
                        <div class="pt-2 pb-2 mb-3 border-bottom"></div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="card">
                                    <img src="#" class="card-img-top" alt="Punkty klienta pic">
                                    <div class="card-body">
                                        <h5 class="card-title">Twoje punkty</h5>
                                        <p class="card-text">SPEECH 100</p>
                                        <a href="#" class="btn btn-primary">Sprawdź</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="card">
                                    <img src="#" class="card-img-top" alt="Punkty klienta pic">
                                    <div class="card-body">
                                        <h5 class="card-title">Twoje samochody</h5>
                                        <p class="card-text">SAMOCHODY 100</p>
                                        <a href="#" class="btn btn-primary">Sprawdź</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="card">
                                    <img src="#" class="card-img-top" alt="Punkty klienta pic">
                                    <div class="card-body">
                                        <h5 class="card-title">Twoje placeholder</h5>
                                        <p class="card-text">Ilość: 100</p>
                                        <a href="#" class="btn btn-primary">Sprawdź</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="card">
                                    <img src="#" class="card-img-top" alt="Punkty klienta pic">
                                    <div class="card-body">
                                        <h5 class="card-title">Twoje placeholder</h5>
                                        <p class="card-text">Ilość: 100</p>
                                        <a href="#" class="btn btn-primary">Sprawdź</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Special title treatment</h5>
                                        <p class="card-text">With supporting text below as a natural lead-in to
                                            additional
                                            content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>