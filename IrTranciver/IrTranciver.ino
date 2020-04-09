#include <IRremote.h>

IRsend irsend;

String inputString=""; // обнуляем строку
int khz = 38; // 38kHz carrier frequency for the NEC protocol
uint8_t mode = 0;

//  Старт!
unsigned int  start[89] = {4500,4400, 600,550, 550,1650, 600,550, 550,1650, 600,550, 600,1650, 550,550, 600,500, 4500,4450, 550,550, 600,1650, 550,550, 600,1650, 550,550, 600,1650, 550,550, 600,550, 4450,4450, 550,550, 600,1650, 600,500, 600,1650, 600,500, 600,1650, 600,500, 600,550, 4450,4450, 600,550, 550,1650, 600,550, 550,1650, 600,550, 550,1650, 600,550, 550,550, 4500,4400, 600,550, 550,1650, 600,550, 550,1650, 600,550, 550,1650, 600,550, 550};  // UNKNOWNFFFFFFFF
//  Вперед
unsigned int  forward[100] = {4500,4400, 600,550, 550,550, 600,1650, 550,1650, 600,550, 550,1650, 600,1650, 600,500, 4500,4450, 600,500, 600,500, 600,1650, 600,1650, 550,550, 600,1650, 550,1650, 600,550, 4500,4400, 600,500, 650,500, 550,1650, 600,1650, 600,500, 600,1650, 600,1650, 550,550, 4500,4400, 600,550, 550,550, 600,1650, 600,1600, 600,550, 600,1650, 550,1650, 600,550, 4450,4450, 550,550, 600,550, 550,1650, 600,1650, 600,500, 600,1650, 600,1650, 550,550, 4500,4400, 600,550, 550,550, 600,1650, 550,1650 };
//  Направо
unsigned int  right[100] = {4450,4450, 600,1650, 550,550, 600,500, 600,550, 600,1650, 550,1650, 600,550, 550,550, 4500,4400, 600,1650, 550,550, 600,550, 550,550, 600,1650, 550,1650, 600,550, 550,550, 4500,4400, 600,1650, 600,500, 600,550, 550,550, 600,1650, 550,1650, 600,550, 550,550, 4500,4400, 600,1650, 600,500, 600,550, 550,550, 600,1650, 550,1650, 600,550, 550,550, 4500,4450, 550,1650, 600,550, 550,550, 600,500, 600,1650, 600,1650, 550,550, 600,500, 4500,4450, 550,1650, 600,550, 550,550, 600,550 };  // UNKNOWNFFFFFFFF
//  Налевл
unsigned int  left[100] = {4450,4450, 600,500, 600,1650, 600,1650, 550,1650, 600,550, 550,1650, 600,1650, 550,550, 4500,4400, 600,550, 600,1650, 550,1650, 600,1650, 550,550, 600,1650, 550,1650, 600,550, 4450,4450, 600,500, 600,1650, 600,1650, 550,1650, 600,550, 550,1650, 600,1650, 600,500, 4500,4450, 550,550, 600,1650, 550,1650, 600,1650, 600,500, 600,1650, 600,1650, 550,550, 4500,4400, 600,550, 600,1600, 600,1650, 600,1650, 550,550, 600,1650, 550,1650, 600,550, 4500,4400, 600,500, 600,1650, 600,1650, 550,1650 };  // UNKNOWNFFFFFFFF
//  Назад
unsigned int  back[100] = {4500,4450, 550,1650, 600,550, 550,550, 600,1650, 550,1650, 600,550, 550,550, 600,550, 4450,4450, 550,1650, 600,550, 550,550, 600,1650, 550,1650, 600,550, 550,550, 600,550, 4450,4450, 600,1650, 550,550, 600,500, 600,1650, 600,1650, 550,550, 600,500, 600,550, 4450,4450, 600,1650, 550,550, 600,550, 550,1650, 600,1650, 550,550, 600,550, 550,550, 4500,4400, 600,1650, 550,550, 600,550, 550,1650, 600,1650, 600,500, 600,550, 550,550, 4500,4400, 600,1650, 600,500, 600,550, 550,1650 };  // UNKNOWNFFFFFFFF
//  Домой
unsigned int  to_home[89] = {4500,4450, 550,550, 600,550, 550,550, 600,1650, 550,550, 600,500, 600,1650, 600,500, 4500,4450, 550,550, 600,550, 550,550, 600,1600, 600,550, 600,500, 600,1650, 600,500, 4500,4450, 550,550, 600,500, 600,550, 600,1650, 550,550, 600,500, 600,1650, 600,500, 4500,4450, 550,550, 600,500, 600,550, 600,1650, 550,550, 600,500, 600,1650, 600,500, 4500,4450, 550,550, 600,500, 600,550, 600,1600, 600,550, 600,500, 600,1650, 600};  // UNKNOWNFFFFFFFF



void serialEvent() {
  inputString = "";
  while (Serial.available()) {
    char inChar = (char)Serial.read(); 
    inputString += inChar;
  }
  if(inputString[0]-'0' < 10 && inputString[0]-'0' >= 0){
    mode = inputString[0]-'0';
  }
}

void setup()
{
  Serial.begin(9600);
}

void loop() {
  switch(mode){
    case 1:
      irsend.sendRaw(start, sizeof(start) / sizeof(start[0]), khz); //Note the approach used to automatically calculate the size of the array.
      mode = 0;
     break;
     case 2:
      irsend.sendRaw(forward, sizeof(back) / sizeof(back[0]), khz); //Note the approach used to automatically calculate the size of the array.
     break;
     case 3:
      irsend.sendRaw(back, sizeof(back) / sizeof(back[0]), khz); //Note the approach used to automatically calculate the size of the array.
     break;
     case 4:
      irsend.sendRaw(right, sizeof(back) / sizeof(back[0]), khz); //Note the approach used to automatically calculate the size of the array.
     break;
     case 5:
      irsend.sendRaw(left, sizeof(back) / sizeof(back[0]), khz); //Note the approach used to automatically calculate the size of the array.
     break;
     case 6:
      irsend.sendRaw(to_home, sizeof(to_home) / sizeof(to_home[0]), khz); //Note the approach used to automatically calculate the size of the array.
     break;
  }
}
