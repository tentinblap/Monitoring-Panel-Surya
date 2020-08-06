import paho.mqtt.client as mqtt
import random
import time

broker="localhost"
port=9001



klien = mqtt.Client("client 1", transport='websockets')
klien.connect(broker, int(port))
while True:
value = random.randint(1,101)
klien.publish("topic/test1",value)
time.sleep(3)
klien.disconnect()
