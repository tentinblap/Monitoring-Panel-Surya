@extends('layouts.app')



@section('title', 'My Panel | Home')

@section('content_header')
    <h1>Monitoring Rumah</h1>
@stop

@section('content')
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="code/highcharts.js"></script>
<script src="code/modules/exporting.js"></script>
<script src="code/modules/export-data.js"></script>
<script src="mqttws31.js" type="text/javascript"></script>
<script src="jquery.min.js" type="text/javascript"></script>
<script src="config.js" type="text/javascript"></script>



<br>

<script type="text/javascript">


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
            client.subscribe(MQTTsubTopic1, {qos: 1});
            client.subscribe(MQTTsubTopic2, {qos: 1});
            client.subscribe(MQTTsubTopic3, {qos: 1});
            client.subscribe(MQTTsubTopic4, {qos: 1});
            client.subscribe(MQTTsubTopic5, {qos: 1});
            client.subscribe(MQTTsubTopic6, {qos: 1});
            client.subscribe(MQTTsubTopic7, {qos: 1});
            client.subscribe(MQTTsubTopic8, {qos: 1});
            client.subscribe(MQTTsubTopic9, {qos: 1});
            client.subscribe(MQTTsubTopic10, {qos: 1});
            client.subscribe(MQTTsubTopic11, {qos: 1});
            client.subscribe(MQTTsubTopic12, {qos: 1});
            client.subscribe(MQTTsubTopic13, {qos: 1});
            client.subscribe(MQTTsubTopic14, {qos: 1});
            client.subscribe(MQTTsubTopic15, {qos: 1});
            client.subscribe(MQTTsubTopic16, {qos: 1});
            client.subscribe(MQTTsubTopic17, {qos: 1});
            client.subscribe(MQTTsubTopic18, {qos: 1});
            client.subscribe(MQTTsubTopic19, {qos: 1});
            client.subscribe(MQTTsubTopic20, {qos: 1});
            client.subscribe(MQTTsubTopic21, {qos: 1});
            client.subscribe(MQTTsubTopic22, {qos: 1});
            client.subscribe(MQTTsubTopic23, {qos: 1});
            client.subscribe(MQTTsubTopic24, {qos: 1});
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
        if(message.destinationName==MQTTsubTopic1){
            document.getElementById('node1_v1').innerHTML = message.payloadString;
        }
        else if(message.destinationName==MQTTsubTopic2){
            document.getElementById('node1_v2').innerHTML = message.payloadString;
        }
        else if(message.destinationName==MQTTsubTopic3){
            document.getElementById('node1_v3').innerHTML = message.payloadString;
        }
        else if(message.destinationName==MQTTsubTopic4){
            document.getElementById('node1_c1').innerHTML = message.payloadString;
        }
        else if(message.destinationName==MQTTsubTopic5){
            document.getElementById('node1_c2').innerHTML = message.payloadString;
        }
        else if(message.destinationName==MQTTsubTopic6){
            document.getElementById('node1_c3').innerHTML = message.payloadString;
        }
        else if(message.destinationName==MQTTsubTopic7){
            document.getElementById('node2_v1').innerHTML = message.payloadString;
        }
        else if(message.destinationName==MQTTsubTopic8){
            document.getElementById('node2_v2').innerHTML = message.payloadString;
        }
        else if(message.destinationName==MQTTsubTopic9){
            document.getElementById('node2_v3').innerHTML = message.payloadString;
        }
        else if(message.destinationName==MQTTsubTopic10){
            document.getElementById('node2_c1').innerHTML = message.payloadString;
        }
        else if(message.destinationName==MQTTsubTopic11){
            document.getElementById('node2_c2').innerHTML = message.payloadString;
        }
        else if(message.destinationName==MQTTsubTopic12){
            document.getElementById('node2_c3').innerHTML = message.payloadString;
        }
        else if(message.destinationName==MQTTsubTopic13){
            document.getElementById('node3_v1').innerHTML = message.payloadString;
        }
        else if(message.destinationName==MQTTsubTopic14){
            document.getElementById('node3_v2').innerHTML = message.payloadString;
        }
        else if(message.destinationName==MQTTsubTopic15){
            document.getElementById('node3_v3').innerHTML = message.payloadString;
        }
        else if(message.destinationName==MQTTsubTopic16){
            document.getElementById('node3_c1').innerHTML = message.payloadString;
        }
        else if(message.destinationName==MQTTsubTopic17){
            document.getElementById('node3_c2').innerHTML = message.payloadString;
        }
        else if(message.destinationName==MQTTsubTopic18){
            document.getElementById('node3_c3').innerHTML = message.payloadString;
        }
        else if(message.destinationName==MQTTsubTopic19){
          document.getElementById('node1_light').innerHTML = message.payloadString;
        }
        else if(message.destinationName==MQTTsubTopic20){
          document.getElementById('node2_light').innerHTML = message.payloadString;
        }
        else if(message.destinationName==MQTTsubTopic21){
          document.getElementById('node3_light').innerHTML = message.payloadString;
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
    }
    
	function onConnect_ON() {
		document.getElementById("pubmsg").innerHTML = "New connection made...";

		var MQTTpubTopic= "application/1/device/e0c23bb4a2ebc447/tx"; 
		var mqtt_msg ='{     "confirmed": true,     "fPort": 3,     "data": "MQ==" }';
		message = new Paho.MQTT.Message(mqtt_msg);
		message.destinationName = MQTTpubTopic;
		client.send(message);
		document.getElementById("pubmsg").innerHTML = "topic:" + MQTTpubTopic  + " " + mqtt_msg + " ...sent";
	}  
	function onConnect_OFF(){
		document.getElementById("pubmsg").innerHTML = "New connection made...";

		var MQTTpubTopic= "application/1/device/e0c23bb4a2ebc447/tx"; 
		var mqtt_msg ='{     "confirmed": true,     "fPort": 3,     "data": "MA==" }';
		message = new Paho.MQTT.Message(mqtt_msg);
		message.destinationName = MQTTpubTopic;
		client.send(message);
		document.getElementById("pubmsg").innerHTML = "topic:" + MQTTpubTopic  + " " + mqtt_msg + " ...sent";
	}
//check if a real number	
	function isNumber(n) {
	  return !isNaN(parseFloat(n)) && isFinite(n);
	};

//function that is called once the document has loaded
	function init() {

		//i find i have to set this to false if i have trouble with timezones.
	
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
        init();        
	});


</script>

<div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
              <div class="box box-success">

                <div class="box-header with-border ">
                    <h3 class="box-title">Live Data Node 1</h3>
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
                </div>
                

                <div class="box-body">
                    <!-- <div class="row"> -->
                        <div class="col-sm-12 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                            
                            <a href="#" class="small-box-footer">Voltage </a>
                                <div class="inner">
                                  <div class="row">
                                 <div class="col-sm-4 border-right" >
                                      <h3 id='node1_v1'>0</h3>
                                      <p>Panel </p>
                                      </div>
                                      <div class="col-sm-4 border-right" >
                                      <h3 id='node1_v2'>0</h3>
                                      <p>Battery </p>
                                      </div>
                                       <div class="col-sm-4 border-right" >
                                      <h3 id='node1_v3'>0</h3>
                                      <p>Output </p>
                                      </div>
                                     
                                  </div>
                                  <div class="icon">
                                      <i class="fas fa-temperature-low"></i>
                                  </div>
                                </div>
                            
                          </div>
                        </div>

                        <div class="col-sm-12 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                            
                            <a href="#" class="small-box-footer">Current</a>
                                <div class="inner">
                                  <div class="row">
                                 <div class="col-sm-4 border-right" >
                                      <h3 id='node1_c1'>0</h3>
                                      <p>Panel</p>
                                      </div>
                                      <div class="col-sm-4 border-right" >
                                      <h3 id='node1_c2'>0</h3>
                                      <p>Battery</p>
                                      </div>
                                       <div class="col-sm-4 border-right" >
                                      <h3 id='node1_c3'>0</h3>
                                      <p>Output</p>
                                      </div>
                                     
                                  </div>
                                  <div class="icon">
                                      <i class="fas fa-temperature-low"></i>
                                  </div>
                                </div>
                            
                          </div>
                        </div>

                        <div class="col-sm-12 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-orange">
                                <div class="inner">
                                  <div class="row">
                                    <div class="col-sm-6 border-right" >
                                      <h3 id='node1_light'>-</h3>
                                      <p>Light</p>
                                     

                                    </div>

                                    <div class="col-sm-6 border-right" >
                                    @if ($node->status==0)
                                      <h3 id='node1_node'>off</h3>
                                    @else
                                      <h3 id='node1_node'>on</h3>
                                    @endif
                                      <p>Node</p>
                                    </div>
                              
                                  </div>
                                
                                </div>
                               
                            
                            <a href="{{ url('panel1/grafik1') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>


                      </div>
                    
                </div>  <!-- ./col -->
              </div>


        </div>
    
         
        <div class="col-md-4">
              <div class="box box-success">

                <div class="box-header with-border ">
                    <h3 class="box-title">Live Data Node 2</h3>
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
                </div>
                

                <div class="box-body">
                    <!-- <div class="row"> -->
                        <div class="col-sm-12 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                            <a href="#" class="small-box-footer">Voltage </a>
                                <div class="inner">
                                  <div class="row">
                                 <div class="col-sm-4 border-right" >
                                      <h3 id='node2_v1'>0</h3>
                                      <p>Panel</p>
                                      </div>
                                      <div class="col-sm-4 border-right" >
                                      <h3 id='node2_v2'>0</h3>
                                      <p>Battery</p>
                                      </div>
                                       <div class="col-sm-4 border-right" >
                                      <h3 id='node2_v3'>0</h3>
                                      <p>Output</p>
                                      </div>
                                     
                                  </div>
                                  <div class="icon">
                                      <i class="fas fa-temperature-low"></i>
                                  </div>
                                </div>
                            
                            
                          </div>
                        </div>

                        <div class="col-sm-12 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                            <a href="#" class="small-box-footer">Current </a>
                                <div class="inner">
                                  <div class="row">
                                 <div class="col-sm-4 border-right" >
                                      <h3 id='node2_c1'>0</h3>
                                      <p>Panel</p>
                                      </div>
                                      <div class="col-sm-4 border-right" >
                                      <h3 id='node2_c2'>0</h3>
                                      <p>Battery</p>
                                      </div>
                                       <div class="col-sm-4 border-right" >
                                      <h3 id='node2_c3'>0</h3>
                                      <p>Output</p>
                                      </div>
                                     
                                  </div>
                                  <div class="icon">
                                      <i class="fas fa-temperature-low"></i>
                                  </div>
                                </div>
                            
                            
                          </div>
                        </div>

                        <div class="col-sm-12 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-orange">
                                <div class="inner">
                                  <div class="row">
                                    <div class="col-sm-6 border-right" >
                                      <h3 id='node2_light'>-</h3>
                                      <p>Light</p>
                                     

                                    </div>

                                    <div class="col-sm-6 border-right" >
                                    @if ($node2->status==0)
                                      <h3 id='node2_node'>off</h3>
                                    @else
                                      <h3 id='node2_node'>on</h3>
                                    @endif
                                      <p>Node</p>
                                    </div>
                              
                                  </div>
                                
                                </div>
                               
                            
                            <a href="{{ url('panel2/grafik2') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>


                      </div>
                    
                </div>  <!-- ./col -->
              </div>


        </div>

        <div class="col-md-4">
              <div class="box box-success">

                <div class="box-header with-border ">
                    <h3 class="box-title">Live Data Node 3</h3>
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
                </div>
                

                <div class="box-body">
                    <!-- <div class="row"> -->
                        <div class="col-sm-12 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                            <a href="#" class="small-box-footer">Voltage </a>
                                <div class="inner">
                                  <div class="row">
                                 <div class="col-sm-4 border-right" >
                                      <h3 id='node3_v1'>0</h3>
                                      <p>Panel</p>
                                      </div>
                                      <div class="col-sm-4 border-right" >
                                      <h3 id='node3_v2'>0</h3>
                                      <p>Battery</p>
                                      </div>
                                       <div class="col-sm-4 border-right" >
                                      <h3 id='node3_v3'>0</h3>
                                      <p>Output</p>
                                      </div>
                                     
                                  </div>
                                  <div class="icon">
                                      <i class="fas fa-temperature-low"></i>
                                  </div>
                                </div>
                            
                            
                          </div>
                        </div>

                        <div class="col-sm-12 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                            <a href="#" class="small-box-footer">Current</a>
                                <div class="inner">
                                  <div class="row">
                                 <div class="col-sm-4 border-right" >
                                      <h3 id='node3_c1'>0</h3>
                                      <p>Panel</p>
                                      </div>
                                      <div class="col-sm-4 border-right" >
                                      <h3 id='node3_c2'>0</h3>
                                      <p>Battery</p>
                                      </div>
                                       <div class="col-sm-4 border-right" >
                                      <h3 id='node3_c3'>0</h3>
                                      <p>Output</p>
                                      </div>
                                     
                                  </div>
                                  <div class="icon">
                                      <i class="fas fa-temperature-low"></i>
                                  </div>
                                </div>
                            
                            
                          </div>
                        </div>

                        <div class="col-sm-12 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-orange">
                                <div class="inner">
                                  <div class="row">
                                    <div class="col-sm-6 border-right" >
                                      <h3 id='node3_light'>-</h3>
                                      <p>Light</p>
                                     

                                    </div>

                                    <div class="col-sm-6 border-right" >
                                    @if ($node3->status==0)
                                      <h3 id='node3_node'>off</h3>
                                    @else
                                      <h3 id='node3_node'>on</h3>
                                    @endif
                                      <p>Node</p>
                                    </div>
                              
                                  </div>
                                
                                </div>
                               
                            
                            <a href="{{ url('panel3/grafik3') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>


                      </div>
                    
                </div>  <!-- ./col -->
              </div>


        </div>


      </div>
  



</div>
@stop
