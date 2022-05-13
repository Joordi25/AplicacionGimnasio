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

	/*document.getElementById("fechaactual").innerHTML = d.getDate();
	document.getElementById("fechaactual1").innerHTML = d.getDate()+1;
	document.getElementById("fechaactual2").innerHTML = d.getDate()+2;
	document.getElementById("fechaactual3").innerHTML = d.getDate()+3;
	document.getElementById("fechaactual4").innerHTML = d.getDate()+4;
	document.getElementById("fechaactual5").innerHTML = d.getDate()+5;
	document.getElementById("fechaactual6").innerHTML = d.getDate()+6;*/

	var ThisMonth = new Date().getMonth() + 1;
    var ThisDay = new Date().getDate();
    var ThisYear = new Date().getFullYear();
    var ThisDate = ThisMonth.toString() + "/" + ThisDay.toString() + "/" + ThisYear.toString();

    document.getElementById("fechaactual").innerHTML = ThisDate;

}