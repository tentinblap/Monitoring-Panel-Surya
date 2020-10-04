// host = '172.16.153.122';	// hostname or IP address
MQTTbroker = '192.168.43.3';
//MQTTbroker = '192.168.100.23';	// hostname or IP address
// host = '172.16.153.110';	// hostname or IP address
MQTTport = 9001;
MQTTsubTopic1 = 'node1/v1';	
MQTTsubTopic2 = 'node1/v2';
MQTTsubTopic3 = 'node1/v3';
MQTTsubTopic4 = 'node1/c1';	// topic to subscribe to
MQTTsubTopic5 = 'node1/c2';	// topic to subscribe to
MQTTsubTopic6 = 'node1/c3';	
MQTTsubTopic7 = 'node2/v1';	
MQTTsubTopic8 = 'node2/v2';
MQTTsubTopic9 = 'node2/v3';
MQTTsubTopic10 = 'node2/c1';	// topic to subscribe to
MQTTsubTopic11 = 'node2/c2';	// topic to subscribe to
MQTTsubTopic12 = 'node2/c3';	
MQTTsubTopic13 = 'node3/v1';	
MQTTsubTopic14 = 'node3/v2';	
MQTTsubTopic15 = 'node3/v3';	
MQTTsubTopic16 = 'node3/c1';	
MQTTsubTopic17 = 'node3/c2';	
MQTTsubTopic18 = 'node3/c3';	
MQTTsubTopic19 = 'node1/light';	
MQTTsubTopic20 = 'node2/light';	
MQTTsubTopic21 = 'node3/light';	
MQTTsubTopic22 = 'node1/notif';	
MQTTsubTopic23 = 'node2/notif';	
MQTTsubTopic24 = 'node3/notif';	
MQTTsubTopic25 = 'node1/off';	
MQTTsubTopic26 = 'node2/off';	
MQTTsubTopic27 = 'node3/off';	
MQTTpubTopic1 = 'application/1/device/b91ae9bf7ae144d6/tx'; //node 1
MQTTpubTopic2 = 'application/1/device/e0c23bb4a2ebc447/tx'; //node 2
MQTTpubTopic3 = 'application/1/device/f5dd1bd33f84993e/tx'; //node 3

useTLS = false;
username = null;
password = null;
// username = "jjolie";
// password = "aa";

// path as in "scheme:[//[user:password@]host[:port]][/]path[?query][#fragment]"
//    defaults to "/mqtt"
//    may include query and fragment
//
// path = "/mqtt";
// path = "/data/cloud?device=12345";

cleansession = true;
