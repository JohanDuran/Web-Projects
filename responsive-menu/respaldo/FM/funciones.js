

function drawChart() {

}


function graficar(){
	graficaLinea2();
	setInterval(graficaLinea2,3600000);
	graficaLinea3();
	setInterval(graficaLinea3,3600000);
	graficaLinea4();
	setInterval(graficaLinea4,3600000);
}
 		 

function graficaLinea2(){
		//---------------------------------------------------------------------------------//
		data2 = new google.visualization.DataTable();
		data2.addColumn('string', 'Time');
		data2.addColumn('number', 'Temperatura C°');
		options2 = {'title':'IngPlante: Temperatura',
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
	   //alert(data.length);
	   for (var i = data.length-9; i >= 0 ; i--) {
	    	var valor = parseInt(data[i]["value3"], 10);
	    	console.log(valor);
	    	var temp1 =data[i]["date"].split("T");
	    	var temp2 = temp1[1].split(".");
	    	console.log(temp2[0]);
	    	var temp3 = temp2[0].split(":");
	    	//alert(temp3[0]+temp3[1])
	    	var fecha = temp3[0]+":"+temp3[1];
	    	//alert(data[i]["value1"]);
	    	data2.addRow([fecha, valor]);
	    	console.log(valor);
    	}
		chart2.draw(data2, options2);		
}

function graficaLinea3(){
		//---------------------------------------------------------------------------------//
		data3 = new google.visualization.DataTable();
		data3.addColumn('string', 'Time');
		data3.addColumn('number', 'Humedad Relativa');
		options3 = {'title':'IngPlante: Humedad Relativa',
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
	    	var valor = parseInt(data[i]["value2"], 10);
	    	//console.log(valor);
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


function graficaLinea4(){
		//---------------------------------------------------------------------------------//
		data4 = new google.visualization.DataTable();
		data4.addColumn('string', 'Time');
		data4.addColumn('number', 'Radiación');
		options4 = {'title':'IngPlante: Radiacion',
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
	    	var valor = parseInt(data[i]["value4"], 10);
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

// function graficaLinea5(){

// 		//---------------------------------------------------------------------------------//
// 		if(counter5==0){
// 			data5 = new google.visualization.DataTable();
// 			data5.addColumn('string', 'Time');
// 			data5.addColumn('number', 'Temperatura en grados centigrados');
// 			var options5 = {'title':'IngPlante: humedad Relativa',
// 	               //'width':800,
// 	               //'height':600,
// 	               series:
// 	               {
// 	               	0:{color:'#10FADC'},
// 	               }
// 	               };
//    			chart5 = new google.visualization.LineChart(document.getElementById('grafica5'));
//    			setInterval(graficaLinea5,60000);
// 		}
// 		var theUrl = "https://hwthoncr16.herokuapp.com/ingplantae/last";
// 	    var xmlHttp = new XMLHttpRequest();
// 	    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
// 	    xmlHttp.send( null );
// 	    var data=JSON.parse(xmlHttp.responseText);
// 	    console.log(data);
// 	    var id = data["_id"];
// 	    last5=id;
// 	    if(first5!=last5){
// 	    	counter5=counter5+1;
// 	    	first5=last5;
// 	    	var valor = parseInt(data["value1"], 10);
// 	    	var fec =data["date"].split("T");
// 	    	var fecha = fec[1].split(".");
// 	    	//alert(data[i]["value1"]);
// 	    	data5.addRow([fecha[0], valor]);
// 	    	if(counter5>10){
// 	    		counter5=counter5-1;
// 	    		data5.removeRow(0);	
// 	    	}
// 			chart5.draw(data5, options5);	
// 		}
// }




// function graficaLinea6(){

// 		//---------------------------------------------------------------------------------//
// 		if(counter6==0){
// 			data6 = new google.visualization.DataTable();
// 			data6.addColumn('string', 'Time');
// 			data6.addColumn('number', 'Temperatura en grados centigrados');
// 			var options6 = {'title':'IngPlante: Radiacion',
// 	               //'width':800,
// 	               //'height':600,
// 	               series:
// 	               {
// 	               	0:{color:'#F71015'},
// 	               }
// 	               };
//    			chart6 = new google.visualization.LineChart(document.getElementById('grafica6'));
//    			setInterval(graficaLinea6,60000);
// 		}
// 		var theUrl = "https://hwthoncr16.herokuapp.com/ingplantae/last";
// 	    var xmlHttp = new XMLHttpRequest();
// 	    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
// 	    xmlHttp.send( null );
// 	    var data=JSON.parse(xmlHttp.responseText);
// 	    console.log(data);
// 	    var id = data["_id"];
// 	    last6=id;
// 	    if(first6!=last6){
// 	    	counter6=counter6+1;
// 	    	first6=last6;
// 	    	var valor = parseInt(data["value1"], 10);
// 	    	var fec =data["date"].split("T");
// 	    	var fecha = fec[1].split(".");
// 	    	//alert(data[i]["value1"]);
// 	    	data6.addRow([fecha[0], valor]);
// 	    	if(counter6>10){
// 	    		counter6=counter6-1;
// 	    		data6.removeRow(0);	
// 	    	}
// 			chart6.draw(data6, options6);	
// 		}
// }