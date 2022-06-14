#include"LIS3DHTR.h"  //include the accelerator library
#include"seeed_line_chart.h"  //include the line chart library
#include <rpcWiFi.h>
#include"TFT_eSPI.h"
#include <PubSubClient.h>

TFT_eSPI tft;
LIS3DHTR<TwoWire> lis;

#define max_size 50 //maximum size of data
doubles accelerator_readings[3];
TFT_eSprite spr = TFT_eSprite(&tft);  // Sprite
#include <Wire.h>
#include <Adafruit_MLX90614.h>

Adafruit_MLX90614 mlx = Adafruit_MLX90614();
int step = 0;

// Update these with values suitable for your network.
const char *ssid = "aselole"; // WiFi Name
const char *password = "12345678";  // WiFi Password
const char *mqtt_server = "192.168.137.105";  // MQTT Broker URL

WiFiClient wioClient;
PubSubClient client(wioClient);
long lastMsg = 0;
char msg[50];
int value = 0;
int Oxygen;
int Heartrate;

void setup_wifi()
{
  delay(10);

  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);
  WiFi.begin(ssid, password); // Connecting WiFi

  while (WiFi.status() != WL_CONNECTED)
  {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");

  Serial.println("IP address: ");
  Serial.println(WiFi.localIP()); // Display Local IP Address
}

void reconnect()
{
  // Loop until we're reconnected
  while (!client.connected())
  {
    Serial.print("Attempting MQTT connection...");
    // Create a random client ID
    String clientId = "WioTerminal-";
    clientId += String(random(0xffff), HEX);
    // Attempt to connect
    if (client.connect(clientId.c_str()))
    {
      Serial.println("connected");
    }
    else
    {
      Serial.print("failed, rc=");
      Serial.print(client.state());
      Serial.println(" try again in 5 seconds");
      // Wait 5 seconds before retrying
      delay(5000);
    }
  }
}

void setup()
{
  tft.begin();
  tft.setRotation(3);
  spr.createSprite(TFT_HEIGHT, TFT_WIDTH);

  lis.begin(Wire1);
  lis.setOutputDataRate(LIS3DHTR_DATARATE_25HZ);
  lis.setFullScaleRange(LIS3DHTR_RANGE_2G);

  mlx.begin();

  Serial.begin(115200);
  setup_wifi();
  client.setServer(mqtt_server, 1883);  // Connect the MQTT Server
}

void loop()
{
  if (!client.connected())
  {
    reconnect();
  }

  client.loop();

  spr.fillSprite(TFT_WHITE);

  Serial.print("Ambient = ");
  Serial.print(mlx.readAmbientTempC());
  Serial.print("*C\tObject = ");
  Serial.print(mlx.readObjectTempC());
  Serial.println("*C");
  //Serial.print("Ambient = "); Serial.print(mlx.readAmbientTempF());
  //Serial.print("*F\tObject = "); Serial.print(mlx.readObjectTempF()); Serial.println("*F");
  Serial.println();

  float x_raw = lis.getAccelerationX();
  float y_raw = lis.getAccelerationY();
  float z_raw = lis.getAccelerationZ();

  //This is used to print out on Serial Plotter, check Serial Plotter!
  Serial.print(x_raw);
  Serial.print(",");
  Serial.print(y_raw);
  Serial.print(",");
  Serial.println(z_raw);

  if (accelerator_readings[0].size() == max_size)
  {
    for (uint8_t i = 0; i < 3; i++)
    {
      accelerator_readings[i].pop();  //this is used to remove the first read variable
    }
  }

  accelerator_readings[0].push(x_raw);  //read variables and store in data
  accelerator_readings[1].push(y_raw);
  accelerator_readings[2].push(z_raw);

  //Convert into steps
  if ((x_raw > 0.9 || y_raw > 0.9 || z_raw > 0.9) || (x_raw > 0.9 || y_raw > 0.9 || z_raw > 0.9))
  {
    step = step + 1;
    Serial.print("Steps:");
    Serial.println(step);

  }

  //Settings for the line graph title
  auto header = text(0, 0)
    .value("Accelerator Readings")
    .align(center)
    .valign(vcenter)
    .width(tft.width())
    .thickness(2);

  header.height(header.font_height() *2);
  header.draw();  //Header height is the twice the height of the font

  //Settings for the line graph
  auto content = line_chart(20, header.height()); //(x,y) where the line graph begins
  content
    .height(tft.height() - header.height() *1.5)  //actual height of the line chart
    .width(tft.width() - content.x() *2)  //actual width of the line chart
    .based_on(-2.0) //Starting point of y-axis, must be a float
    .show_circle(false) //drawing a cirle at each point, default is on.
    .value({ accelerator_readings[0], accelerator_readings[1], accelerator_readings[2] }) //passing through the data to line graph
    .color(TFT_BLUE, TFT_RED, TFT_GREEN)
    .draw();

  spr.pushSprite(0, 0);

  //Change data type to string, and publish to MQTT
  String StepStr = "" + String(step) + "";
  client.publish("Step", StepStr.c_str());

  String ObjectTempStr = "" + String(mlx.readObjectTempC()) + "";
  client.publish("Temp", ObjectTempStr.c_str());

  String HeartrateStr = "" + String(Heartrate) + "";
  client.publish("Heartrate", HeartrateStr.c_str());

  String OxygenStr = "" + String(Oxygen) + "";
  client.publish("Oxygen", OxygenStr.c_str());

  delay(3000);
}
