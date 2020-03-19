<!DOCTYPE html>
<html lang="pl">
<head>
    <title>Car4You - Rejestracja</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Nunito|Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 p-0">
            <a href="index.php"><img src="images/Car4You-line-logo.png" class="m-5" alt="Car4You Logo" style="width: 200px;"></a>
            <img src="images/register-women1-background.eps" class="img-fluid d-none d-lg-block" alt="women-standing-background">
            <!-- <a href="https://www.freepik.com/free-photos-vectors/background">Background vector created by katemangostar - www.freepik.com</a> -->
        </div>
        <div class="col-md p-5 text-light" style="background-color: #BACC60;">
            <div>
                <h1>Jesteś nowy? Zarejestruj się już teraz.</h1>
                <form>
                    <div class="form-group">
                        <label for="inputEmail1">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Wprowadź adres e-mail">
                      </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputPassword1">Hasło</label>
                        <input type="password" class="form-control" aria-describedby="passwordHelpBlock" id="inputPassword1" placeholder="Wprowadź hasło">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Powtórz hasło</label>
                        <input type="password" class="form-control" aria-describedby="passwordHelpBlock" id="inputPassword2">
                      </div>
                    </div>
                    <div class="form-group">
                        <small id="passwordHelpBlock" class="form-text text-muted">
                            Twoje hasło musi mieć 8-20 znaków, zzawierać litery and cyfry, i nie może zawierać spacji, specjalnych znaków lub emoji.
                        </small>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputFirstName1">Imię</label>
                            <input type="text" class="form-control" id="inputFirstName" placeholder="Imię">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputLastName1">Nazwisko</label>
                            <input type="text" class="form-control" id="inputLastName" placeholder="Nazwisko">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10">
                        <label for="inputAddress1">Ulica</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="ul. Przykładowa">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputAddress2">Numer domu</label>
                            <input type="text" class="form-control" id="inputAddress2">
                        </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputCity">Miasto</label>
                        <input type="text" class="form-control" id="inputCity">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputState">Województwo</label>
                        <select id="inputState" class="form-control">
                          <option selected>Wybierz...</option>
                          <option>dolnośląskie</option>
                          <option>kujawsko-pomorskie</option>
                          <option>lubelskie</option>
                          <option>lubuskie</option>
                          <option>łódzkie</option>
                          <option>małopolskie</option>
                          <option>mazowieckie</option>
                          <option>opolskie</option>
                          <option>podkarpackie</option>
                          <option>podlaskie</option>
                          <option>pomorskie</option>
                          <option>śląskie</option>
                          <option>świętokrzyskie</option>
                          <option>warmińsko-mazurskie</option>
                          <option>wielkopolskie</option>
                          <option>zachodniopomorskie</option>
                        </select>
                      </div>
                      <div class="form-group col-md-2">
                        <label for="inputZip">Kod poczt.</label>
                        <input type="text" class="form-control" id="inputZip">
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputPhoneNumber">Numer komórkowy</label>
                            <input type="tel" class="form-control" id="inputPhoneNumber" placeholder="123456789">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputTelNumber">Numer telefonu</label>
                            <input type="tel" class="form-control" id="inputTelNumber" placeholder="123456789">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputFax">Fax</label>
                            <input type="tel" class="form-control" id="inputFax" placeholder="123456789">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputWebsite">Strona internetowa</label>
                        <input type="url" class="form-control" id="inputWebsite" placeholder="http://www.mojastrona.pl/">
                    </div>
                    <div class="form-group">
                        <label for="inputAdditionalInformation">Dodatkowe informacje</label>
                        <textarea class="form-control" id="inputAdditionalInformation" rows="3"></textarea>
                    </div>
                    <h5><label>Dane firmowe:</label></h5>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="checkCompany">
                            <label class="form-check-label" for="checkCompany">Zaznacz, jeśli jesteś klientem firmowym</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputCompanyName">Nazwa firmy</label>
                        <input type="text" class="form-control" id="inputCompanyName" placeholder="Nazwa firmy">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputRegon">Regon</label>
                            <input type="text" class="form-control" id="inputRegon" disabled="disabled">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputNIP">NIP</label>
                            <input type="text" class="form-control" id="inputNIP" disabled="disabled">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                          <label class="form-check-label" for="invalidCheck2">
                            Zgadzam się z regulaminem
                          </label>
                        </div>
                      </div>
                    <button type="submit" class="btn btn-primary">Zarejestruj się</button>
                  </form>
            </div>
        </div>
    </div>
    </div>

    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>