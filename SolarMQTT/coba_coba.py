import paho.mqtt.client as paho
import time
broker = "localhost"
port = 9001
Keep_Alive_Interval = 10

def on_publish(client, userdata, mid):
print("data published \n")
pass
#print("mid:"+str(mid))

client=paho.Client()
client.on_publish=on_publish
client.connect(broker,int(port), int(Keep_Alive_Interval))
client.loop_start()

while True:
teksdikirim="Hallooo"
client.publish("/topik",teksdikirim)
time.sleep(1) 
