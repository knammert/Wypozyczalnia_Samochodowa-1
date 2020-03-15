<?php

    require_once("../php/config.php");
        $login = ($_POST['login']);
        $haslo1 = MD5($_POST['haslo1']);
        $haslo2 = ($_POST['haslo2']);
        $imie = ($_POST['imie']);
        $nazwisko = ($_POST['nazwisko']);
        $nrKom = ($_POST['nrKom']);
        $nrTel = ($_POST['nrTel']);
        $fax = ($_POST['fax']);
        $email= ($_POST['email']);
        $stronaInternetowa = ($_POST['stronaInternetowa']);
        $miejscowosc = ($_POST['miejscowosc']);
        $wojewodztwo= ($_POST['wojewodztwo']);
        $kodPocztowy = ($_POST['kodPocztowy']);
        $ulica = ($_POST['ulica']);
        $nr_domu= ($_POST['nr_domu']);
        $dodatkoweInformacje = ($_POST['dodatkoweInformacje']);
        $nazwaFirmy= ($_POST['nazwaFirmy']);
        $regon= ($_POST['regon']);
        $nip= ($_POST['nip']);

        $sth = $db->prepare('SELECT login,email FROM Klient INNER JOIN Kontakt_Klient ON Kontakt_Klient.idKontakt=Klient.idKontakt WHERE login = :login OR email = :email limit 1');
        $sth ->bindValue(':login',$login,PDO::PARAM_STR);
        $sth ->bindValue(':email',$email,PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if($result){
            die("Podany Użytkownik już istnieje") ;
        }

        if( isset($_POST['czyFirma']) ) {
            $czyFirma=2;
        }
        else{
            $czyFirma=1;
        }
       
        //Dodawanie adresu klienta
        $sth = $db->prepare('INSERT INTO Adres(miejscowosc,wojewodztwo,kod_pocztowy,ulica,nr_domu,dodatkowe_informacje) 
        VALUE (:miejscowosc,:wojewodztwo,:kod_pocztowy,:ulica,:nr_domu,:dodatkowe_informacje)');
        $sth ->bindValue(':miejscowosc',$miejscowosc,PDO::PARAM_STR);
        $sth ->bindValue(':wojewodztwo',$wojewodztwo,PDO::PARAM_STR);
        $sth ->bindValue(':kod_pocztowy',$kodPocztowy,PDO::PARAM_STR);
        $sth ->bindValue(':ulica',$ulica,PDO::PARAM_STR);
        $sth ->bindValue(':nr_domu',$nr_domu,PDO::PARAM_STR);
        $sth ->bindValue(':dodatkowe_informacje',$dodatkoweInformacje,PDO::PARAM_STR);
        $sth->execute();

        $sth = $db->prepare('SELECT idAdres FROM Adres WHERE miejscowosc = :miejscowosc AND wojewodztwo = :wojewodztwo AND kod_pocztowy = :kod_pocztowy AND ulica = :ulica AND 
        nr_domu = :nr_domu and dodatkowe_informacje = :dodatkowe_informacje limit 1');
        $sth ->bindValue(':miejscowosc',$miejscowosc,PDO::PARAM_STR);
        $sth ->bindValue(':wojewodztwo',$wojewodztwo,PDO::PARAM_STR);
        $sth ->bindValue(':kod_pocztowy',$kodPocztowy,PDO::PARAM_STR);
        $sth ->bindValue(':ulica',$ulica,PDO::PARAM_STR);
        $sth ->bindValue(':nr_domu',$nr_domu,PDO::PARAM_STR);
        $sth ->bindValue(':dodatkowe_informacje',$dodatkoweInformacje,PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        $idAdres = $result['idAdres'];

    //    // Dodawanie danych kontaktowych klienta
        $sth = $db->prepare('INSERT INTO Kontakt_Klient(nr_kom,nr_tel,fax,email,www) 
        VALUE (:nrKom,:nrTel,:fax,:email,:wwww)');
        $sth ->bindValue(':nrKom',$nrKom,PDO::PARAM_STR);
        $sth ->bindValue(':nrTel',$nrTel,PDO::PARAM_STR);
        $sth ->bindValue(':fax',$fax,PDO::PARAM_STR);
        $sth ->bindValue(':email',$email,PDO::PARAM_STR);
        $sth ->bindValue(':wwww',$stronaInternetowa,PDO::PARAM_STR);
        $sth->execute();

        $sth = $db->prepare('SELECT idKontakt FROM Kontakt_Klient WHERE nr_kom = :nr_kom AND nr_tel = :nr_tel AND fax = :fax
        AND email = :email AND www = :www limit 1');
        $sth ->bindValue(':nr_kom',$nrKom,PDO::PARAM_STR);
        $sth ->bindValue(':nr_tel',$nrTel,PDO::PARAM_STR);
        $sth ->bindValue(':fax',$fax,PDO::PARAM_STR);
        $sth ->bindValue(':email',$email,PDO::PARAM_STR);
        $sth ->bindValue(':www',$stronaInternetowa,PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        $idKontakt = $result['idKontakt'];
           
        
    //     //Dodawanie klienta
        $sth = $db->prepare('INSERT INTO Klient(idKontakt,idAdres,login,haslo,nazwa_firmy,REGON,NIP,nazwisko,imie,aktywacja,rodzaj_klienta) 
        VALUE (:idKontakt,:idAdres,:login,:haslo1,:nazwa_firmy,:REGON,:NIP,:nazwisko,:imie,:aktywacja,:rodzajKlienta)');
        $sth ->bindValue(':login',$login,PDO::PARAM_STR);
        $sth ->bindValue(':haslo1',$haslo1,PDO::PARAM_STR);
        $sth ->bindValue(':nazwa_firmy',$nazwaFirmy,PDO::PARAM_STR);
        $sth ->bindValue(':REGON',$regon,PDO::PARAM_STR);
        $sth ->bindValue(':NIP',$nip,PDO::PARAM_STR);
        $sth ->bindValue(':nazwisko',$nazwisko,PDO::PARAM_STR);
        $sth ->bindValue(':imie',$imie,PDO::PARAM_STR);
        $sth ->bindValue(':aktywacja',0,PDO::PARAM_INT);
        $sth ->bindValue(':idKontakt',$idKontakt,PDO::PARAM_INT);
        $sth ->bindValue(':idAdres',$idAdres,PDO::PARAM_INT);
        $sth ->bindValue(':rodzajKlienta',$czyFirma,PDO::PARAM_INT);
        $sth->execute();

        echo "Zarejestrowano Użytkownika";
        
        
?>