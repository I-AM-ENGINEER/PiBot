
#!/usr/bin/env python3
import serial
import time

if __name__ == '__main__':
	#	Запускаем последовательный порт
	ser = serial.Serial('/dev/ttyUSB0', 9600, timeout=1)
	ser.flush()

	while True:
		ser.write("0")

	#	Погнали в цикл
	while True:
		i = 0
		while i < 5:
			i = i + 1

			#	Открываем файл
			f = open('botstat.txt', 'r+', encoding = 'utf-8')
			#	Читаем
			stat = f.read(1)

			if stat != '0':

				# 	Обнуляем счетчик
				i = 0

				#	Удаляем прочитанное
				f.seek(0)
				f.write(stat.encode('unicode').decode('utf-8'))

				#	Бот, лови!
				ser.write(stat)

				print(stat)
			
			#	Закрываем
			f.close()

			
			#if stat == '1'
			time.sleep(0.1)
		#	Ну, не получилось
		ser.write(b'0')
		print('stop')

