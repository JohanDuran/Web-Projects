
//graficas para recoleccion de variables de entorno
function graficarVariables(){
	graficaTemperatura();
	setInterval(graficaTemperatura,3600000);
	graficaHumedadRelativa();
	setInterval(graficaHumedadRelativa,3600000);
	graficaRadiacion();
	setInterval(graficaRadiacion,3600000);
}
 		 

function graficaTemperatura(){
		//---------------------------------------------------------------------------------//
		data2 = new google.visualization.DataTable();
		data2.addColumn('string', 'Time');
		data2.addColumn('number', 'Temperatura C°');
		options2 = {'title':'IngPlantae: Temperatura',
               //'width':800,
               //'height':500,
               series:
               {
               	0:{color:'#F71015'},
               }
               };
		chart2 = new google.visualization.LineChart(document.getElementById('grafica2'));
		var theUrl = "https://hwthoncr16.herokuapp.com/ingplantae/last";
	    var xmlHttp = new XMLHttpRequest();
	    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
	    xmlHttp.send( null );
	    var data=JSON.parse(xmlHttp.responseText);
	   for (var i = data.length-9; i >= 0 ; i--) {
	    	var valor = parseInt(data[i]["Temperatura"], 10);
	    	console.log(valor);
	    	var temp1 =data[i]["date"].split("T");
	    	var temp2 = temp1[1].split(".");
	    	var temp3 = temp2[0].split(":");
	    	var fecha = temp3[0]+":"+temp3[1];
	    	data2.addRow([fecha, valor]);
    	}
		chart2.draw(data2, options2);		
}

function graficaHumedadRelativa(){
		//---------------------------------------------------------------------------------//
		data3 = new google.visualization.DataTable();
		data3.addColumn('string', 'Time');
		data3.addColumn('number', 'Humedad Relativa');
		options3 = {'title':'IngPlantae: Humedad Relativa',
               //'width':800,
               //'height':500,
               series:
               {
               	0:{color:'#0531ED'},
               }
               };
		chart3 = new google.visualization.LineChart(document.getElementById('grafica3'));
		var theUrl = "https://hwthoncr16.herokuapp.com/ingplantae/last";
	    var xmlHttp = new XMLHttpRequest();
	    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
	    xmlHttp.send( null );
	    var data=JSON.parse(xmlHttp.responseText);
	   //alert(data.length);
	   for (var i = data.length-9; i >= 0 ; i--) {
	    	var valor = parseInt(data[i]["HumedadRelativa"], 10);
	    	var temp1 =data[i]["date"].split("T");
	    	var temp2 = temp1[1].split(".");
	    	//console.log(temp2[0]);
	    	var temp3 = temp2[0].split(":");
	    	//alert(temp3[0]+temp3[1])
	    	var fecha = temp3[0]+":"+temp3[1];
	    	//alert(data[i]["value1"]);
	    	data3.addRow([fecha, valor]);
	    	//console.log(valor);
    	}
		chart3.draw(data3, options3);		
}


function graficaRadiacion(){
		//---------------------------------------------------------------------------------//
		data4 = new google.visualization.DataTable();
		data4.addColumn('string', 'Time');
		data4.addColumn('number', 'Humedad Sustrato');
		options4 = {'title':'IngPlantae: Humedad Sustrato',
               //'width':800,
               //'height':500,
               series:
               {
               	0:{color:'#FC9707'},
               }
               };
		chart4 = new google.visualization.LineChart(document.getElementById('grafica4'));
		var theUrl = "https://hwthoncr16.herokuapp.com/ingplantae/last";
	    var xmlHttp = new XMLHttpRequest();
	    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
	    xmlHttp.send( null );
	    var data=JSON.parse(xmlHttp.responseText);
	   //alert(data.length);
	   for (var i = data.length-9; i >= 0 ; i--) {
	    	var valor = parseInt(data[i]["HumedadSustrato"], 10);
	    	console.log(valor);
	    	var temp1 =data[i]["date"].split("T");
	    	var temp2 = temp1[1].split(".");
	    	//console.log(temp2[0]);
	    	var temp3 = temp2[0].split(":");
	    	//alert(temp3[0]+temp3[1])
	    	var fecha = temp3[0]+":"+temp3[1];
	    	//alert(data[i]["value1"]);
	    	data4.addRow([fecha, valor]);
	    	//console.log(valor);
    	}
		chart4.draw(data4, options4);		
}



//funciones para graficarInformacion
function graficarInformacion(){
	maxTempUltimoMes();
	maxTempDia();
	minTempUltimoMes();
	minTempDia();
}


function maxTempUltimoMes(){
	var theUrl = "https://hwthoncr16.herokuapp.com/ingplantae/all";
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
    xmlHttp.send( null );
    var data=JSON.parse(xmlHttp.responseText);
    var temp1 = data[79]["date"];
  	var temp2 = temp1.split("-");
  	var mesSistema = temp2[1];
	mesSistema = parseInt(mesSistema,10);
	var date = new Date();
	var mesActual = date.getMonth()+1;
	if(mesSistema<mesActual){
		document.getElementById("cajaMaxTempM").innerHTML = "Los datos no existen";
	}else{
		var maxTemp=-1;
		var tempT=0;
		for (var i = 1057; i < data.length; i++) {
		    temp1 = data[i]["date"];
		 
  			temp2 = temp1.split("-");
  			mesSistema = temp2[1];
			mesSistema = parseInt(mesSistema,10);
			if(mesSistema==mesActual){
				tempT=parseInt(data[i]["Temperatura"],10);
				if(tempT>maxTemp){
					maxTemp=tempT;
				}
			}else if(mesSistema>mesActual){
					i=i+data.length;
			}
		}
			document.getElementById("cajaMaxTempM").innerHTML = maxTemp+" C°";
	}
}


function maxTempDia(){
	var theUrl = "https://hwthoncr16.herokuapp.com/ingplantae/last";
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
    xmlHttp.send( null );
    var data=JSON.parse(xmlHttp.responseText);
    var maxTemp=-1;
    var tempT=0;
    for (var i = data.length-1; i >= 0; i--) {
    	tempT=parseInt(data[i]["Temperatura"],10);
    	console.log(tempT);
		if(tempT>maxTemp){
			maxTemp=tempT;
		}
    }
    if(maxTemp!=-1){
    	document.getElementById("cajaMaxTempD").innerHTML = maxTemp+" C°";
    }else{
    	document.getElementById("cajaMaxTempD").innerHTML = "Los datos no existen";
    }
}


function minTempUltimoMes(){
	var theUrl = "https://hwthoncr16.herokuapp.com/ingplantae/all";
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
    xmlHttp.send( null );
    var data=JSON.parse(xmlHttp.responseText);
    var temp1 = data[79]["date"];
  	var temp2 = temp1.split("-");
  	var mesSistema = temp2[1];
	mesSistema = parseInt(mesSistema,10);
	var date = new Date();
	var mesActual = date.getMonth()+1;
	if(mesSistema<mesActual){
		document.getElementById("cajaMinTempM").innerHTML = "Los datos no existen";
	}else{
		var minTemp=200;
		var tempT=0;
		for (var i = 1057; i < data.length; i++) {
		    temp1 = data[i]["date"];
  			temp2 = temp1.split("-");
  			mesSistema = temp2[1];
			mesSistema = parseInt(mesSistema,10);
			if(mesSistema==mesActual){
				tempT=parseInt(data[i]["Temperatura"],10);
				if(tempT<minTemp){
					minTemp=tempT;
				}
			}else if(mesSistema>mesActual){
					i=i+data.length;
			}
		}
		    if(minTemp!=200){
			document.getElementById("cajaMinTempM").innerHTML = minTemp+" C°";
		    }else{
			document.getElementById("cajaMinTempM").innerHTML = "Los datos no existen";
		    }
	}
}


function minTempDia(){
	var theUrl = "https://hwthoncr16.herokuapp.com/ingplantae/last";
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
    xmlHttp.send( null );
    var data=JSON.parse(xmlHttp.responseText);
    var minTemp=200;
    var tempT=0;
    for (var i = data.length-1; i >= 0; i--) {
    	tempT=parseInt(data[i]["Temperatura"],10);
    	console.log(tempT);
		if(tempT<minTemp){
			minTemp=tempT;
		}
    }
    if(minTemp!=200){
    	document.getElementById("cajaMinTempD").innerHTML = minTemp+" C°";
    }else{
    	document.getElementById("cajaMinTempD").innerHTML = "Los datos no existen";
    }
}