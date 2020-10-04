
@extends('layouts.app')


@section('title', 'MyPanel | Log2')

@section('content_header')
    <h1>Monitoring Rumah</h1>
@stop

@section('content')






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
        if(message.destinationName==MQTTsubTopic22){
           
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


//settings buat charttt
$(document).ready(function() { 
        init();        
	});


</script>

<div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="box box-success">
                    <div class="box-header with-border">
                    <h3 class="box-title">Log Arus dan Tegangan</h3>                   
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-striped" id="laravel_datatable">
                            <thead>
                            <tr>
                                    <th>No</th>
                                    <th>time</th>
                                    <th>v1</th>
                                    <th>c1</th>
                                    <th>v2</th>
                                    <th>c2</th>
                                    <th>v3</th>
                                    <th>c3</th>
                                    
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($logs as $log)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$log->time}}</td>
                                        <td>{{$log->v1}}</td>
                                        <td>{{$log->c1}}</td>
                                        <td>{{$log->v2}}</td>
                                        <td>{{$log->c2}}</td>
                                        <td>{{$log->v3}}</td>
                                        <td>{{$log->c3}}</td>
                                        
                                       
                                       

                                    </tr>
                                    <div hidden>{{$i++}}</div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
          <!-- /.modal-dialog -->
          @stop