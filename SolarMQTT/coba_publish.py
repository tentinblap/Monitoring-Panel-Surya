import paho.mqtt.client as mqtt
import time
broker="localhost"
port=9001
Keep_Alive_Interval = 10

def on_publish(client,userdata,result):             #create function for callback
    print("data published \n")
    pass

client1= mqtt.Client("control1",transport='websockets')                           #create client object
client1.on_publish = on_publish                          #assign function to callback
client1.connect(broker,int(port), int(Keep_Alive_Interval))                                 #establish connection
client1.loop_start()
#while True:
ret=client1.publish("house/bulb1","on")                   #publish
#time.sleep(4);
client1.loop_forever()
# Continue the network loop
#client1.loop_stop()
#client1.connect(broker, int(port), int(Keep_Alive_Interval))
