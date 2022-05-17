function date() {
	var dias = new Array("DOMINGO", "LUNES", "MARTES", "MIÉRCOLES", "JUEVES", "VIERNES", "SÁBADO", "DOMINGO", "LUNES", "MARTES", "MIÉRCOLES", "JUEVES", "VIERNES", "SÁBADO");
	var d = new Date();

	document.getElementById("diaactual").innerHTML = dias[d.getDay()];
	document.getElementById("dia1").innerHTML = dias[d.getDay()+1];
	document.getElementById("dia2").innerHTML = dias[d.getDay()+2];
	document.getElementById("dia3").innerHTML = dias[d.getDay()+3];
	document.getElementById("dia4").innerHTML = dias[d.getDay()+4];
	document.getElementById("dia5").innerHTML = dias[d.getDay()+5];
	document.getElementById("dia6").innerHTML = dias[d.getDay()+6];

	var ThisMonth = new Date().getMonth() + 1;
    var ThisDay = new Date().getDate();
    var ThisDay1 = new Date().getDate()+1;
    var ThisDay2 = new Date().getDate()+2;
    var ThisDay3 = new Date().getDate()+3;
    var ThisDay4 = new Date().getDate()+4;
    var ThisDay5 = new Date().getDate()+5;
    var ThisDay6 = new Date().getDate()+6;
    var ThisYear = new Date().getFullYear();
    var ThisDate = ThisDay.toString() + "/" + ThisMonth.toString() + "/" + ThisYear.toString();
 	var ThisDate1 = ThisDay1.toString() + "/" + ThisMonth.toString() + "/" + ThisYear.toString();
 	var ThisDate2 = ThisDay2.toString() + "/" + ThisMonth.toString() + "/" + ThisYear.toString();
 	var ThisDate3 = ThisDay3.toString() + "/" + ThisMonth.toString() + "/" + ThisYear.toString();
 	var ThisDate4 = ThisDay4.toString() + "/" + ThisMonth.toString() + "/" + ThisYear.toString();
 	var ThisDate5 = ThisDay5.toString() + "/" + ThisMonth.toString() + "/" + ThisYear.toString();
 	var ThisDate6 = ThisDay6.toString() + "/" + ThisMonth.toString() + "/" + ThisYear.toString();


    document.getElementById("fechaactual").innerHTML = ThisDate;
    document.getElementById("fechaactual1").innerHTML = ThisDate1;
    document.getElementById("fechaactual2").innerHTML = ThisDate2;
    document.getElementById("fechaactual3").innerHTML = ThisDate3;
    document.getElementById("fechaactual4").innerHTML = ThisDate4;
    document.getElementById("fechaactual5").innerHTML = ThisDate5;
    document.getElementById("fechaactual6").innerHTML = ThisDate6;

}