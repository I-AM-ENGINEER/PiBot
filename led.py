import time
import serial

ser = serial.Serial ("/dev/ttyAMA0") 
ser.baudrate = 9600

while 1:
	f=open("ledstat.txt", "r")
        tosend = f.read()
	time.sleep(0.25)
	f.close()
        if tosend != 'q':
                ser.write('2');
        else:
                ser.write('3');
                