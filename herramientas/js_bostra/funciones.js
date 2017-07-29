
//
// Funcion que valida que la informacion ingresada sea numerica
//
// @param object evt 
// @return boolean
//
function soloNumeros(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))
	return false;

	return true;
}


//
// Funcion que convierte los saltos de linea en etiquetas html <br>
//
// @param string campo campo que contiene la informacion a convertir
//
function ConvertBR(campo){
	var output = "";
	for (var i=0; i<campo.value.length; i++){
		if ((campo.value.charCodeAt(i) == 10)){
			//i++;
			output += "<br>";
		}
		else{
			output += campo.value.charAt(i);
		}
	}
	campo.value=output;
}

//
// Funcion que valida si una cadena tiene formato de fecha valida
//
// @param string dateStr cadena a validar
// @return boolean std_date estado de la validacion: true=ok, false=error
//
function ValFormatoFecha(dateStr) {
	var std_date = true;
	if (dateStr==''){
		std_date=false;
	}
	else if (dateStr!=''){
		var datePat = /^(\d{1,2})(\/)(\d{1,2})(\/)(\d{4})$/;
		var matchArray = dateStr.match(datePat);
		if (matchArray == null) {
			std_date=false;
		}
		else{
			day = matchArray[1];
			month = matchArray[3];
			year = matchArray[5];
			if (month < 1 || month > 12) {
				std_date=false;
			}
			if (day < 1 || day > 31) {
				std_date=false;
			}
			if ((month==4 || month==6 || month==9 || month==11) && day==31) {
				std_date=false;
			}
			if (month == 2) {
				var isleap = (year % 4 == 0 && (year % 100 != 0 || year % 400 == 0));
				if (day > 29 || (day==29 && !isleap)) {
					std_date=false;
				}
			}
		}
	}
	return(std_date);
}

//
// Funcion que valida si una cadena tiene formato de fecha y hora valida
//
// @param string dateStr cadena a validar
// @return boolean std_date estado de la validacion: true=ok, false=error
//
function ValFormatoFechaHora(dateStr) {
	var std_date = true;
	if (dateStr==''){
		std_date=false;
	}
	else if (dateStr!=''){
		var datePat = /^(\d{1,2})(\/)(\d{1,2})(\/)(\d{4})(\ )(\d{2})(\:)(\d{2})$/;
		var matchArray = dateStr.match(datePat);
		if (matchArray == null) {
			std_date=false;
		}
		else{
			day = matchArray[1];
			month = matchArray[3];
			year = matchArray[5];
			hour = matchArray[7];
			minute = matchArray[9];

			if (month < 1 || month > 12) {
				std_date=false;
			}
			if (day < 1 || day > 31) {
				std_date=false;
			}
			if ((month==4 || month==6 || month==9 || month==11) && day==31) {
				std_date=false;
			}
			if (month == 2) {
				var isleap = (year % 4 == 0 && (year % 100 != 0 || year % 400 == 0));
				if (day > 29 || (day==29 && !isleap)) {
					std_date=false;
				}
			}
			if (hour < 0 || hour > 23) {
				std_date=false;
			}
			if (minute < 0 || minute > 59) {
				std_date=false;
			}
		}
	}
	return(std_date);
}

//
// Funcion que compara 2 fechas y valida si una cadena tiene formato de fecha valida
//
// @param string dateStr1 cadena inicial a comparar
// @param string dateStr2 cadena final a comparar
// @return boolean std_compdate estado de la comparacion: true=error, false=ok
//
function ComparaFechas(dateStr1, dateStr2){
	var std_compdate = true;
	var datePat = /^(\d{1,2})(\/)(\d{1,2})(\/)(\d{4})$/;
	var fecha1=new Date(dateStr1.match(datePat)[5], dateStr1.match(datePat)[3], dateStr1.match(datePat)[1]);
	var fecha2=new Date(dateStr2.match(datePat)[5], dateStr2.match(datePat)[3], dateStr2.match(datePat)[1]);
	if (fecha1 <= fecha2){
		std_compdate=false;
	}
	return std_compdate;
}

//
// Funcion que carga una url en un contenedor
//
// @param string url url a abrir
// @param string id_contenedor div donde aparecera la url
//
function llamarasincrono(url, id_contenedor){
	var pagina_requerida = false
	if (window.XMLHttpRequest) {// Si es Mozilla, Safari etc
		pagina_requerida = new XMLHttpRequest()
	} 
	else if (window.ActiveXObject){ // pero si es IE
		try {
			pagina_requerida = new ActiveXObject("Msxml2.XMLHTTP")
		} 
		catch (e){ // en caso que sea una versión antigua
			try{
				pagina_requerida = new ActiveXObject("Microsoft.XMLHTTP")
			}
			catch (e){}
		}
	}
	else
	return false
	pagina_requerida.onreadystatechange=function(){ // función de respuesta
		cargarpagina(pagina_requerida, id_contenedor)
	}
	pagina_requerida.open('GET', url, true) // asignamos los métodos open y send
	pagina_requerida.send(null)
}

//
// Funcion que carga una url en un contenedor con innerHTML
//
// @param string pagina_requerida pagina a abrit
// @param string id_contenedor div donde aparecera la url
//
function cargarpagina(pagina_requerida, id_contenedor){
	if (pagina_requerida.readyState == 4 && (pagina_requerida.status==200 || window.location.href.indexOf("http")==-1)){
		document.getElementById(id_contenedor).innerHTML=pagina_requerida.responseText
	}
}

//
// Funcion que retorna la diferencia en dias entre 2 fechas
//
// @param string dateStr1 cadena inicial
// @param string dateStr2 cadena final
// @return int dias de diferencia entre las fechas
//
function DiffDias(dateStr1, dateStr2){
	var datePat = /^(\d{1,2})(\/)(\d{1,2})(\/)(\d{4})$/;
	var fecha1=new Date(dateStr1.match(datePat)[5], dateStr1.match(datePat)[3], dateStr1.match(datePat)[1]);
	var fecha2=new Date(dateStr2.match(datePat)[5], dateStr2.match(datePat)[3], dateStr2.match(datePat)[1]);
	var diferencia = fecha2.getTime() - fecha1.getTime();
	var dias = Math.round(diferencia / (1000 * 60 * 60 * 24))
	return Math.abs(dias);
}

//
// Funcion que retorna un numero con 2 decimales
//
// @param int strValue numero a formatear
// @return int val numero en formato de 2 decumales
//
function Formato2Dec(strValue) {
	var val = parseFloat(strValue);
	if (isNaN(val)) { return "0.00"; }

	if (val <= 0) { return "0.00"; }

	val += "";
	if (val.indexOf('.') == -1) { return val+".00"; }
	else { val = val.substring(0,val.indexOf('.')+3); }

	val = (val == Math.floor(val)) ? val + '.00' : ((val*10 == Math.floor(val*10)) ? val + '0' : val);
	return val;
} 

//
// Funcion que valida la extension de un archivo de fotografia
//
// @param string file ruta y nombre del archivo
// @return boolean isOK indicador de formato: true: bien, false:error
//
function ValidaExtension(file, arrayExtension) {
	var isOK;
	isOK=false;

	extension = (file.substring(file.lastIndexOf("."))).toLowerCase();
	for (var i in arrayExtension) {
		if (arrayExtension[i] == extension) {
			isOK = true;
			break;
		}
	}
	return isOK;
}