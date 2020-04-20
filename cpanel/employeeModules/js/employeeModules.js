$(document).ready(function () {
    $('#newsletterButton').click(function(e){
        var message = $('#newsletterMessage').val();
        if(message != ""){
            
            request = $.ajax({
                url: "php/newsletterWysylanie.php",
                data: {message : message},
                type: "POST"
            });

            request.done(function (response) {
                console.log(response);
            });

            request.fail(function (response) {
                console.log("Error: "+response);
            });
        }
        else{
            console.log("ERROR ŻE NIE NAPISANO ŻADNEJ WIADOMOŚCI - BĘDZIE TAKIE INFO");
        }

        e.preventDefault();
    });

    $("#zaladujStatus").click(function () {
        $("#alert").html("");
        var data = $(".statusPojazdowDane").serialize();
        request = $.ajax({
            url: "php/zaladujStatus.php",
            data: data,
            type: "POST"
        })

        request.done(function (response) {
            if (response == "Brak pojazdow") {
                $("#alert").html("Brak pojazdów w podanym zakresie czasu");
            }
            else {
                var obj = JSON.parse(response);

                for (i = 0; i < obj.length; i++) {
                    if (obj[i][4] == "0")
                        var status = "Nie Przyjęty";
                    else
                        var status = "Przyjęty";
                    if (obj[i][5] == "0")
                        var platnosc = "Nieopłacone";
                    else
                        var platnosc = "Opłacone";
                    if (obj[i][6] == "0")
                        var realizacja = "Nie zrealizowane";
                    else
                        var realizacja = "Zrealizowane";
                    $("#tabelaStatus").append(" <tr><th scope='row'>" + i + "</th><td>" + obj[i][0] + "</td><td>" + obj[i][1] + "</td><td>" + obj[i][2] + " " + obj[i][3] + "</td><td>" + status + "</td><td>" + platnosc + "</td><td>" + realizacja + "</td></tr>");
                }
            }
        })
        request.fail(function (response) {
            console.log("Error" + response);
        });
    });

    $('#usunKontoButton').click(function () {
        var value = $('#usunKontoButton').val();
        var data = { id: value }
        request = $.ajax({
            url: "php/usunPracownika.php",
            data: data,
            type: "POST"
        });

        request.done(function (response) {
            console.log(response);
            $("#tabelaPracownicy tr").remove();
            zaladujPracownikow();
            $('#usunKontoModal').modal('hide');
        });

        request.fail(function (response) {
            console.log(response);
        });
    });

    // Do napisania front modal
    $("#zarejestrujPracownika").click(function () {
        var request;
        var data = $(".rejestracjaPracownika").serialize();
        request = $.ajax({
            url: "./php/dodajPracownika.php",
            data: data,
            type: "POST"
        });

        request.done(function (response) {
            console.log(response);
        });

        request.fail(function (response) {
            console.log("Error: ", response);

        });
    });

});



function usunKontoButtonClick(self) {
    self = $(self);
    $('#usunKontoButton').attr("value", self.val());
}

function editKontoButtonClick(self){
    self = $(self);

    request = $.ajax({
        url: "php/zaladujDanePracownika.php",
        data: {id: self.val()},
        type: "POST"
    });

    request.done(function(response){
        console.log(response);
    });

    request.fail(function(response){
        console.log(response);
    })

}

function zaladujPracownikow() {
    console.log("działa");
    request = $.ajax({
        url: "php/ladowaniePracownikow.php",
    })

    request.done(function (response) {
        try {
            var obj = JSON.parse(response);
            for (i = 0; i < obj.length; i++) {
                if (obj[i]["czy_aktywowany"] == 0) {
                    var status = "Nie Aktywowany";
                }
                else {
                    var status = "Aktywowany"
                }
                $("#tabelaPracownicy").append(" <tr><th scope='row'>" + (i + 1) + "</th><td>" + obj[i][1] + "</td><td>" + obj[i][2] + "</td><td>" + obj[i][3] + "</td><td>" + obj[i][4] + "</td><td>" + status + "</td><td><button type='button' class='btn btn-warning' id='edytujDaneButtonValue' data-toggle='modal' data-target='#edytujKontoModal' onclick='editKontoButtonClick(this)' value=" + obj[i]["id_pracownik"] + ">Edytuj Dane</button ><button type='button' class='usunKontoButtonValue btn btn-danger' value='" + obj[i]["id_pracownik"] + "' data-toggle='modal' data-target='#usunKontoModal' onclick='usunKontoButtonClick(this)'>Usuń Pracownika</button> </td></tr>");
            }
        }
        catch(error){
            console.log(error);
        }
    });

    request.fail(function (response) {
        console.log("Error" + response);
    });
}