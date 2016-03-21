/*
 * LISSAJOUS
 * UPDATED BY O-R-G
 *
 *
 * based on
 * Sine Wave
 * by Daniel Shiffman.
 *
 * Render a simple sine wave.
 *
 * Created 2 May 2005
 */



// import processing.pdf.*;

PFont font;

float xFactor;
float yFactor;
float theta = 0.0;       // Start angle at 0
float x;
float y;

int xspacing = 10;   // How far apart should each horizontal location be
int w;              // Width of entire wave
int scaler; // define in setup()
int dotSize = 2; // 5 is good



void setup() {
  size(200,200);
  frameRate(60);
  colorMode(RGB,255,255,255,100);
  background(0);
  smooth();
  scaler = width / 3;
  font = loadFont("AndaleMono-12.vlw"); 
  textFont(font, 12); 
  makeWave();
 // beginRecord(PDF, "COMBIFRAME.pdf");
}



void draw() {
  //background(0);
  calcWave();
  renderWave();
}



void makeWave() {
  background(255);
  xFactor = random(2);
  yFactor = random(2);
  // println("x = " + xFactor);
  // println("y = " + yFactor);
  // println("x/y = " + xFactor / yFactor);
  // fill(70);
  // text("x/y = " + xFactor / yFactor, 10, 20);
}



void calcWave() {
  // adjust on fly
  // xFactor = mouseX / 100;
  // yFactor = mouseY / 100;
  // lissajous parametric equation

  theta += 0.02;
  x = scaler*(sin(xFactor*theta)) + width/2;
  y = scaler*(sin(yFactor*theta)) + height/2;
}



void renderWave() {
  fill(0,0,0,100);
  noStroke();
  ellipse(x,y,dotSize,dotSize);

  /*
   // draw hektor's arms
   stroke(255,3);
   line(0,0,x,y);
   line(width,0,x,y);
   //line(width/2,height/2,x,y);
   */
}



void mousePressed() {
  makeWave();
}



void keyPressed() {
  
  // IF USER PRESSES 'q' THEN STOP RECORDING.
  if (key == 'q') {
    // endRecord();
    exit();
  }
}
