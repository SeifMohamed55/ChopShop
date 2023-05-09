var s =document.getElementById("change_chart");
s.addEventListener("change", myFunction);
function myFunction(event) {
    var y =document.getElementById("creditcard");
    var x =document.getElementById("amount");
    var l =document.getElementById("q");
    var u =document.getElementById("submit");
    if(s.value == '1'){
        y.style.display = "none";
        x.style.display = "none";
        l.style.display = "none";
        u.style.display = "none";
    }
    else if (s.value == '2'){
        y.style.display = "none";
        x.style.display = "inline-block";
        l.style.display = "inline-block";
        u.style.display = "block";
    }
    else if (s.value == '3'){
        y.style.display = "inline-block";
        x.style.display = "none";
        l.style.display = "inline";
        u.style.display = "block";
    }
}