function loc() {
    var x = document.getElementById("pickup").value;
    $("#drop option[value='"+x+"']").attr("disabled", "disabled").siblings().removeAttr("disabled");
    $("#calculatedFare").html("Calculate Fare");
}
function droploc() {
    var x = document.getElementById("drop").value;
    $("#pickup option[value='"+x+"']").attr("disabled", "disabled").siblings().removeAttr("disabled");
    $("#calculatedFare").html("Calculate Fare");
}
function cabType() {
    var x = document.getElementById("cab_type").value;
    // document.getElementById("demo").innerHTML = "You selected: " + x;
    if(x == "cedmicro") {
        $("#luggage").val("");
        $("#luggage").prop('disabled', true);
    } else {
        $("#luggage").prop('disabled', false);
    }
  }

function farecalc() {
    var pckup = $("#pickup").val();
    var drp = $("#drop").val();
    var cb = $("#cab_type").val();
    var lug = $("#luggage").val();
    if(pckup == "" || drp == "" || cb == "") {
        alert("Please fill the form compeletely");


    } else {
        $.ajax({
            url : "cab.php",
            method : "POST",
            data : {pickup : pckup, drop : drp, cab : cb, luggage : lug},
            }).done(function(msg){
                $("#calculatedFare").html(msg);
            });
    }
     
  
}
