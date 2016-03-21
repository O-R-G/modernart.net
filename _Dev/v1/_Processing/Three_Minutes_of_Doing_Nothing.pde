// @pjs crisp=true;
// @pjs transparent=true;


float x;
float y;
float squareSize; // define in setup()
int scaler; // define in setup()
int eraseWidthLimit; // for erasing last squares
int randomFrameRate; 

void setup() {
  size(200,200);
  // randomFrameRate = (int) random(10) + 8;
  // frameRate(randomFrameRate);
  frameRate(10);
  colorMode(RGB,255,255,255,100);
  background(255);
  noSmooth();
  scaler = 10; 
  eraseWidthLimit = width + (15 * scaler);
  makeSquare();
}

void draw() {
  //background(0);
  calcSquare();
  renderSquare();
}

void makeSquare() {
  //scaler = (int) random(30) + 5;
  squareSize = width / scaler;
  // println("w = " + squareSize);
  // randomFrameRate = (int) random(10) + 5;
  // frameRate(randomFrameRate);
}

void calcSquare() {
  squareSize = (squareSize + scaler) % eraseWidthLimit; 
  x = (int) ( width - squareSize) / 2;
  y = (int) ( height - squareSize) / 2;
}

void renderSquare() {
  fill(255,30);
  stroke(0);
  rect(x,y,squareSize,squareSize);
}

void mousePressed() {
  makeSquare();
}


