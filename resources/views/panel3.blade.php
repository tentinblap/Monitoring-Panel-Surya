@extends('layouts.app')


@section('title', 'My Panel | Node 3')

@section('content_header')
    <h1>Monitoring Rumah</h1>
@stop

@section('content')
<script type="text/javascript">

	var nodeoff=false
	var chart; // global variuable for chart
	var dataTopics = new Array();
    var dataTopics1 = new Array();
//mqtt broker 
	var client = new Paho.MQTT.Client(MQTTbroker, MQTTport,'/ws', "myclientid_" + parseInt(Math.random() * 100, 10));
	client.onMessageArrived = onMessageArrived;
	client.onConnectionLost = onConnectionLost;
	//connect to broker is at the bottom of the init() function !!!!
	

//mqtt connecton options including the mqtt broker subscriptions
	var options = {
		timeout: 3,
		onSuccess: function () {
			console.log("mqtt connected");
			// Connection succeeded; subscribe to our topics
            client.subscribe(MQTTsubTopic13, {qos: 1});
            client.subscribe(MQTTsubTopic14, {qos: 1});
            client.subscribe(MQTTsubTopic15, {qos: 1});
            client.subscribe(MQTTsubTopic16, {qos: 1});
            client.subscribe(MQTTsubTopic17, {qos: 1});
			client.subscribe(MQTTsubTopic18, {qos: 1});
			client.subscribe(MQTTsubTopic22, {qos: 1});
            client.subscribe(MQTTsubTopic23, {qos: 1});
            client.subscribe(MQTTsubTopic24, {qos: 1});
            client.subscribe(MQTTsubTopic27, {qos: 1});
		},
		onFailure: function (message) {
			console.log("Connection failed, ERROR: " + message.errorMessage);
			//window.setTimeout(location.reload(),20000); //wait 20seconds before trying to connect again.
		}
	};

//can be used to reconnect on connection lost
	function onConnectionLost(responseObject) {
		console.log("connection lost: " + responseObject.errorMessage);
		//window.setTimeout(location.reload(),20000); //wait 20seconds before trying to connect again.
	};

//what is done when a message arrives from the broker
function onMessageArrived(message) {
		console.log(message.destinationName, '',message.payloadString);

		//check if it is a new topic, if not add it to the array
		if(dataTopics.length<3){
			dataTopics.push("node3/v1"); //add new topic to array
			dataTopics.push("node3/v2"); //add new topic to array
			dataTopics.push("node3/v3"); //add new topic to array
		    
			
			// dataTopics.push(message.destinationName); //add new topic to array
			console.log(dataTopics.length)

			
		    var x = dataTopics.indexOf("node3/v1"); //get the index no
		    var y= dataTopics.indexOf("node3/v2"); //get the index no
		    var z= dataTopics.indexOf("node3/v3"); //get the index no
		
		    //create new data series for the chart
			var newseries1 = {
		            id: x,
		            name: "solar panel",
		            data: [],
		            visible: false
					};
			var newseries2 = {
					id: y,
					name:"battery",
					data: [],
					visible: false
					};
			var newseries3 = {
					id: z,
					name: "output",
					data: [],
					visible: false
					};

			chart.addSeries(newseries1); //add the series
			chart.addSeries(newseries2); 
			chart.addSeries(newseries3); 
		    
			dataTopics1.push("node3/c1"); //add new topic to array
			dataTopics1.push("node3/c2"); //add new topic to array
			dataTopics1.push("node3/c3"); //add new topic to array
		    
			
			// dataTopics1.push(message.destinationName); //add new topic to array
			console.log(dataTopics.length)
			
        var a = dataTopics1.indexOf("node3/c1"); //get the index no
        var b = dataTopics1.indexOf("node3/c2");
        var c = dataTopics1.indexOf("node3/c3");
		
		    //create new data series for the chart
			
			var newseries4 = {
					id: a,
					name: "solar panel",
					data: [],
					visible: false
					};
      var newseries5 = {
          id: b,
          name: "battery",
          data: [],
          visible: false
          };
      var newseries6 = {
          id: c,
          name: "output",
          data: [],
          visible: false
          };

			chart1.addSeries(newseries4); //add the series
			chart1.addSeries(newseries5); //add the series
			chart1.addSeries(newseries6); //add the series
			// var plotMqtt = [myEpoch, Number(thenum)]; //create the array
			// if (isNumber(thenum)) { //check if it is a real number and not text
			// console.log('is a propper number, will send to chart.')
			// plot(plotMqtt, x);	//send it to the plot function
			// plot(plotMqtt, y);	//send it to the plot function
			// plot(plotMqtt, z);	//send it to the plot function
		
	
		}
		var x = dataTopics.indexOf("node3/v1"); //get the index no
		var y= dataTopics.indexOf("node3/v2"); //get the index no
		var z= dataTopics.indexOf("node3/v3"); //get the index no
		var a = dataTopics1.indexOf("node3/c1"); //get the index no
		var b = dataTopics1.indexOf("node3/c2"); //get the index no
		var c = dataTopics1.indexOf("node3/c3"); //get the index no
		// var y = dataTopics.indexOf(message.destinationName); //get the index no of the topic from the array
		var myEpoch = new Date().getTime(); //get current epoch time
		if(nodeoff){
				$.ajax({ url: '/api/v1/devices/node3', method: 'PUT', data: 'status=0'})
            	.then(function(response) {
					nodeoff=false
					$('#OFF').attr('disabled','disabled');
               console.log(response);
            });
			}
			else if(message.destinationName=="node3/v1"){
				var thenum = message.payloadString.replace( /^\D+/g, ''); //remove any text spaces from the message
				var plotMqtt = [myEpoch, Number(thenum)]; //create the array
				if (isNumber(thenum)) { //check if it is a real number and not text
				console.log('is a propper number, will send to chart.')
				plot(plotMqtt, x);	//send it to the plot function
				}
			}
			else if(message.destinationName=="node3/v2"){
				var thenum = message.payloadString.replace( /^\D+/g, ''); //remove any text spaces from the message
				var plotMqtt = [myEpoch, Number(thenum)]; //create the array
				if (isNumber(thenum)) { //check if it is a real number and not text
				console.log('is a propper number, will send to chart.')
				plot(plotMqtt, y);	//send it to the plot function
				}
			}
			else if(message.destinationName=="node3/v3"){
				var thenum = message.payloadString.replace( /^\D+/g, ''); //remove any text spaces from the message
				var plotMqtt = [myEpoch, Number(thenum)]; //create the array
				if (isNumber(thenum)) { //check if it is a real number and not text
				console.log('is a propper number, will send to chart.')
				plot(plotMqtt, z);	//send it to the plot function
				}
			}
			else if(message.destinationName=="node3/c1"){
				var thenum = message.payloadString.replace( /^\D+/g, ''); //remove any text spaces from the message
				var plotMqtt = [myEpoch, Number(thenum)]; //create the array
				if (isNumber(thenum)) { //check if it is a real number and not text
				console.log('is a propper number, will send to chart.')
				plot1(plotMqtt, a);	//send it to the plot function
				}
      }
      else if(message.destinationName=="node3/c2"){
				var thenum = message.payloadString.replace( /^\D+/g, ''); //remove any text spaces from the message
				var plotMqtt = [myEpoch, Number(thenum)]; //create the array
				if (isNumber(thenum)) { //check if it is a real number and not text
				console.log('is a propper number, will send to chart.')
				plot1(plotMqtt, b);	//send it to the plot function
				}
      }
      else if(message.destinationName=="node3/c3"){
				var thenum = message.payloadString.replace( /^\D+/g, ''); //remove any text spaces from the message
				var plotMqtt = [myEpoch, Number(thenum)]; //create the array
				if (isNumber(thenum)) { //check if it is a real number and not text
				console.log('is a propper number, will send to chart.')
				plot1(plotMqtt, c);	//send it to the plot function
				}
			}

		else if(message.destinationName=="node3/off"){
			if(message.payloadString=='on'){
				$('#OFF').removeAttr('disabled');
				console.log("bisa");
			}
			
		}

		else if(message.destinationName==MQTTsubTopic22){
           
		   if(message.payloadString=='1'){
			   //get
			   $.get( "/api/v1/notifikasi", function( data ) {
				   console.log(data)
				   let notif = data.length;
				   document.getElementById('numbernotif').innerHTML = notif;
			   });
			   
			   
		   }
	   
	   }

	   else if(message.destinationName==MQTTsubTopic23){
		   
		   if(message.payloadString=='1'){
			   //get
			   $.get( "/api/v1/notifikasi", function( data ) {
				   console.log(data)
				   let notif = data.length;
				   document.getElementById('numbernotif').innerHTML = notif;
			   });
			   
			   
		   }
	   
	   }

	   else if(message.destinationName==MQTTsubTopic24){
		   
		   if(message.payloadString=='1'){
			   //get
			   $.get( "/api/v1/notifikasi", function( data ) {
				   console.log(data)
				   let notif = data.length;
				   document.getElementById('numbernotif').innerHTML = notif;
			   });
			   
			   
		   }
	   
	   }

	};
	function send_mqtt_msg(state) {
	// Send an MQTT message
		//MQTTbroker = document.getElementById("MQTTbroker").value;
		//MQTTport = Number(document.getElementById("MQTTport").value);
		if (state==1) {
		client = new Paho.MQTT.Client(MQTTbroker, MQTTport,"");
		client.connect({onSuccess:onConnect_ON});
		document.getElementById("pubmsg").innerHTML = "Trying to connect...";
	}

		else if (state==0){
			client = new Paho.MQTT.Client(MQTTbroker, MQTTport,"");
			client.connect({onSuccess:onConnect_OFF});
			document.getElementById("pubmsg").innerHTML = "Trying to connect...";
		}	
		else if (state==2){
			client = new Paho.MQTT.Client(MQTTbroker, MQTTport,"");
			client.connect({onSuccess:onConnect_OFFNODE});
			document.getElementById("pubmsg").innerHTML = "Trying to connect...";
		}	
	}
	function onConnect_ON() {
		document.getElementById("pubmsg").innerHTML = "New connection made...";

		var MQTTpubTopic3= "application/1/device/f5dd1bd33f84993e/tx"; 
		var mqtt_msg ='{     "confirmed": true,     "fPort": 3,     "data": "MQ==" }';
		message = new Paho.MQTT.Message(mqtt_msg);
		message.destinationName = MQTTpubTopic3;
		client.send(message);
		document.getElementById("pubmsg").innerHTML = "topic:" + MQTTpubTopic3  + " " + mqtt_msg + " ...sent";
	}  
	function onConnect_OFF(){
		document.getElementById("pubmsg").innerHTML = "New connection made...";

		var MQTTpubTopic3= "application/1/device/f5dd1bd33f84993e/tx"; 
		var mqtt_msg ='{     "confirmed": true,     "fPort": 3,     "data": "MA==" }';
		message = new Paho.MQTT.Message(mqtt_msg);
		message.destinationName = MQTTpubTopic3;
		client.send(message);
		document.getElementById("pubmsg").innerHTML = "topic:" + MQTTpubTopic3  + " " + mqtt_msg + " ...sent";
	}
	function onConnect_OFFNODE(){
		document.getElementById("pubmsg").innerHTML = "New connection made...";

		var MQTTpubTopic3= "application/1/device/f5dd1bd33f84993e/tx"; 
		var mqtt_msg ='{     "confirmed": true,     "fPort": 3,     "data": "c2h1dGRvd24K" }';
		message = new Paho.MQTT.Message(mqtt_msg);
		message.destinationName = MQTTpubTopic3;
		client.send(message);
		document.getElementById("pubmsg").innerHTML = "topic:" + MQTTpubTopic3  + " " + mqtt_msg + " ...sent";
	}
//check if a real number	
	function isNumber(n) {
	  return !isNaN(parseFloat(n)) && isFinite(n);
	};

//function that is called once the document has loaded
	function init() {

		//i find i have to set this to false if i have trouble with timezones.
		Highcharts.setOptions({
			global: {
				useUTC: false
			}
		});

		// Connect to MQTT broker
		client.connect(options);

	};


//this adds the plots to the chart	
    function plot(point, chartno) {
    	console.log(point);
    	
	        var series = chart.series[0],
	            shift = series.data.length > 20; // shift if the series is 
	                                             // longer than 20
	        // add the point
	        chart.series[chartno].addPoint(point, true, shift);  

    };
    function plot1(point, chartno) {
    	console.log(point);
    	
	        var series1 = chart1.series[0],
	            shift = series1.data.length > 20; // shift if the series is 
	                                             // longer than 20
			// add the point
	        chart1.series[chartno].addPoint(point, true, shift);  

	};

//settings buat charttt
$(document).ready(function() {
	    chart = new Highcharts.Chart({
	        chart: {
	            renderTo: 'container',
	            defaultSeriesType: 'spline'
	        },
	        title: {
	            text: 'Temperature and Humidity'
	        }.hidden,
	        subtitle: {
                                text: 'broker: ' + MQTTbroker + ' | port: ' + MQTTport + ' | topic : ' + MQTTsubTopic14 + '&'  + MQTTsubTopic16
                        }.hidden,
	        xAxis: {
	            type: 'datetime',
	            tickPixelInterval: 150,
	            maxZoom: 20 * 1000
	        },
	        yAxis: {
	            minPadding: 0.2,
	            maxPadding: 0.2,
	            title: {
	                text: 'Volt',
	                margin: 80
	            }
	        },
	        series: []
	    });        
		chart1= new Highcharts.Chart({
	        chart: {
	            renderTo: 'container1',
	            defaultSeriesType: 'spline'
	        },
	        title: {
	            text: 'Temperature and Humidity'
	        }.hidden,
	        subtitle: {
                                text: 'broker: ' + MQTTbroker + ' | port: ' + MQTTport + ' | topic : ' + MQTTsubTopic14 + '&'  + MQTTsubTopic15
                        }.hidden,
	        xAxis: {
	            type: 'datetime',
	            tickPixelInterval: 150,
	            maxZoom: 20 * 1000
	        },
	        yAxis: {
	            minPadding: 0.2,
	            maxPadding: 0.2,
	            title: {
	                text: 'Ampere',
	                margin: 80
	            }
	        },
	        series: []
        });   
        init();        
	});


</script>

<script src="http://code.highcharts.com/stock/highstock.js"></script>
<script src="http://code.highcharts.com/stock/modules/exporting.js"></script>

<div class="container-fluid">
  <div class="row">
          <div class="col-24 col-sm-12 col-md-6">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1 bg-yellow"><i class="fas fa-lightbulb-o"></i></span>

              <div class="info-box-content">
                <span class="info-box-text spasi">Light Control</span>
                  <span class="info-box-number"></span>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    @if ($lampu3->status==1)
                      <button class="btn bg-yellow " onclick="send_mqtt_msg(1)"  name="btn1" id="ON1"disabled >
                         ON
                      </button> 
                      <button class="btn bg-yellow" onclick="send_mqtt_msg(0)" name="btn2" id="OFF1" >
                         OFF
                      </button>
                    @else 
                    <button class="btn bg-yellow " onclick="send_mqtt_msg(1)"  name="btn1" id="ON1" >
                       ON
                      </button> 
                      <button class="btn bg-yellow" onclick="send_mqtt_msg(0)" name="btn2" id="OFF1" disabled>
                         OFF
                      </button>
                      @endif
                      
                    </div>
                      <small> 	<div hidden id=pubmsg></div> </small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

         <div class="col-24 col-sm-12 col-md-6">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1 bg-red"><i class="fas fa-power-off"></i></span>

              <div class="info-box-content">
                <span class="info-box-text spasi">Node Control</span>
                  <span class="info-box-number"></span>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                      <!-- <label class="btn bg-orange " onclick="send_mqtt_msg(1)" name="btn1" id="ON">
                        <input type="radio" name="options" id="option1" autocomplete="off" checked="Active" > ON
                      </label>  -->
                      @if ($node3->status==0)
                      <button class="btn bg-red"  name="btn2" id="OFF" disabled>
                         OFF
                      </button>
                      @else
                      <button class="btn bg-red"  name="btn2" id="OFF"  >
                         OFF
                      </button>
                      @endif
                    </div>
                      <!-- <small> 	<div id=pubmsg></div> </small> -->
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

  </div>
<div class="row">
            <div class="col-md-12">
              <div class="box box-success"> 
                <div class="box-header with-border ">
                  <h3 class="box-title">Live Data Voltage</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <!-- <div class="btn-group"> -->
                      <!-- <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button> -->
                      <!-- <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                      </ul> -->
                    <!-- </div> -->
                  
                  </div>
                </div><!-- /.box-header -->

                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div  id="container" style="height: 400px; width: 100%;"></div>
                    </div><!-- /.col -->
                   </div><!-- /.box -->
               </div><!-- /.col -->
              
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="box box-success"> 
                <div class="box-header with-border ">
                  <h3 class="box-title">Live Data Current</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <!-- <div class="btn-group"> -->
                      <!-- <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button> -->
                      <!-- <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                      </ul> -->
                    <!-- </div> -->
                   
                  </div>
                </div><!-- /.box-header -->

                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div  id="container1" style="height: 400px; width: 100%;"></div>
                    </div><!-- /.col -->
                   </div><!-- /.box -->
               </div><!-- /.col -->
              
          </div>



 <!-- <div  id="container" style="height: 400px; width: 100%; overflow"></div>this the placeholder for the chart -->
 </div>
 






 <div class="row"><!-- <h3>LED Control</h3>
<button style="background-color: greenyellow; border-color: greenyellow; color:black" onclick="send_mqtt_msg(1)" name="btn1"> ON</button>
<button style="background-color: red; border-color: red; color: white;" onclick="send_mqtt_msg(0)" name="btn2"> OFF</button>
	</body>
	<div id=pubmsg></div> -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript">
     $(document).ready(function(){
      
        // $('#ON').attr('disabled','disabled');
        $('#OFF').click(function(){
            $('#ON').removeAttr('disabled');
            
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to reactive the node via web application!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
            .then((willDelete) => {
              if (willDelete) {
				nodeoff=true
				   send_mqtt_msg(2)
                $('#OFF').attr('disabled','disabled');
                swal("Node dimatikan", {
                  icon: "success",
                });
              } 
              // else {
              //   swal("Your imaginary file is safe!");
              // }
            });
           
        });
        $('#ON').click(function(){
            $('#OFF').removeAttr('disabled');
            // $('#OFF').removeClass("bg-yellow").addClass("bg-teal");
            $('#ON').attr('disabled','disabled');
        });
    });
    $(document).ready(function(){
      
      // $('#ON1').attr('disabled','disabled');
      $('#OFF1').click(function(){
          $('#ON1').removeAttr('disabled');
          $('#OFF1').attr('disabled','disabled');
          $.ajax({ url: '/api/v1/devices/lampu3', method: 'PUT', data: 'status=0'})
            .then(function(response) {
               console.log(response);
            });
      });
      $('#ON1').click(function(){
          $('#OFF1').removeAttr('disabled');
          $('#ON1').attr('disabled','disabled');
          $.ajax({ url: '/api/v1/devices/lampu3', method: 'PUT', data: 'status=1'})
            .then(function(response) {
              console.log(response);
               
            });
      });
  });
    </script>
@stop
