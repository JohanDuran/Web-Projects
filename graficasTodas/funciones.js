
var data3;
var last;
var first;
var counter;
function drawChart() {
// Create the data table.
//var x = Math.random();
//alert(x);
	//graficaCircle1();
	//graficaCircle2();
	//graficaLine2();
		data3 = new google.visualization.DataTable();
		data3.addColumn('string', 'Time');
		data3.addColumn('number', 'Temperatura en grados centigrados');
		first=0;
		counter=0;
}
 		 
function graficaCircle1(){
	var data = new google.visualization.DataTable();
	data.addColumn('string', 'Topping');    
	data.addColumn('number', 'Slices');
	data.addRows([
	  ['Mushrooms', 3],
	  ['Onions', 1],
	  ['Olives', 1],
	  ['Zucchini', 1],
	  ['Pepperoni', 2]
	]);
	            // Set chart options
	var options = {'title':'How Much Pizza I Ate Last Night'};
	// Set chart options
	// Instantiate and draw our chart, passing in some options.
	var chart = new google.visualization.PieChart(document.getElementById('grafica1'));
	chart.draw(data, options);
}

function graficaCircle2(){
	// Create the data table.
	var data2 = new google.visualization.DataTable();
	data2.addColumn('string', 'Topping');
	data2.addColumn('number', 'Slices');
	data2.addRows([
	  ['Mushrooms', 3],
	  ['Onions', 1],
	  ['Olives', 15],
	  ['Zucchini', 1],
	  ['Pepperoni', 2]
	]);
	var options2 = {'title':'How Much Pizza You Ate Last Night'};
	// Set chart options
	var chart2 = new google.visualization.PieChart(document.getElementById('grafica2'));
	chart2.draw(data2, options2);
}

function graficaLine2(){

			//---------------------------------------------------------------------------------//

		var theUrl="http://hwthoncr16.herokuapp.com/ingplantae/last";
	    var xmlHttp = new XMLHttpRequest();
	    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
	    xmlHttp.send( null );
	    var data=JSON.parse(xmlHttp.responseText);
	    var id = data["_id"];
	    last=id;
	    if(first!=last){
	    	counter=counter+1;
	    	first=last;
	    	var valor = parseInt(data["value1"], 10);
	    	var fec =data["date"].split("T");
	    	var fecha = fec[1].split(".");
	    	//alert(data[i]["value1"]);
	    	data3.addRow([fecha[0], valor]);
	    	if(counter>10){
	    		counter=counter-1;
	    		data3.removeRow(0);
	    		//alert("h2");	
	    	}
			var options3 = {'title':'IngPlante: Temperatura diaria',
				               //'width':800,
				               //'height':600,
				               series:
				               {
				               	0:{color:'#F71015'},
				               }
				               };
			var chart3 = new google.visualization.LineChart(document.getElementById('grafica3'));
			chart3.draw(data3, options3);	
	    }

	   // }
	    //alert(id);
		//building the graph
		//if(id>79){
		//var data3 = new google.visualization.DataTable();
		//data3.addColumn('string', 'Time');
		//data3.addColumn('number', 'Temperatura en grados centigrados');
	    
	    //for (var i = 79; i <= 89; i++) {
	    	
	//parsing the data------------------------------------------------------------------//	
}


// function graficaLine1(){

// 	//getting the data
// 	var datos="";
// 	xmlhttp = new XMLHttpRequest();
//     xmlhttp.onreadystatechange = function() {
//     	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//     		//alert("holafggss");
//         	//document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
//         	datos = xmlhttp.responseText;
//         	//document.write("los datos son "+ datos);
//     		var timeTemp = datos.split(',');
// 			var time = timeTemp[0];
// 			var temp = timeTemp[1];
// 			var timeS= time.split(" ");
// 			var tempS= temp.split(" ");
// 			//var res;
// 			for (var i=0; i<tempS.length; i++)
// 			{
//     			tempS[i] = parseInt(tempS[i], 10);
// 			}
// 			//---------------------------------------------------------------------------------//
// 		//building the graph
// 		var data3 = new google.visualization.DataTable();
// 		data3.addColumn('string', 'Time');
// 		data3.addColumn('number', 'Temperatura en grados centigrados');
// 		//data3.addColumn('number', 'Expenses');
// 		//data3.addRows([
// 		  //['2004', 1000],
// 		 // ['2005', 1170],
// 		 // ['2006',  860],
// 		//  ['2007', 1030]
// 		//]);
// 		for (var i = 0; i <= 8; i++) {
// 				data3.addRow([timeS[i], tempS[i]]);
// 		}


// 		var options3 = {'title':'IngPlante: Temperatura diaria',
// 			               //'width':800,
// 			               //'height':600,
// 			               series:
// 			               {
// 			               	0:{color:'#F71015'},
// 			               }
// 			               };
// 		var chart3 = new google.visualization.LineChart(document.getElementById('grafica3'));
// 		chart3.draw(data3, options3);

// 	    	}
// 	    };
//         xmlhttp.open("GET","datos.php",true);
//         xmlhttp.send();

// 	//parsing the data------------------------------------------------------------------//	
// }
