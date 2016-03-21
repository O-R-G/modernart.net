/* @pjs transparent=true; */
/* @pjs crisp=true; */

// Modern Art Clock
// O-R-G 

int nextChild = 0; 
int tickRate = 10;
boolean timerFlag = false; 

void setup() {
  size(200, 200);
  stroke(0);
  smooth();
  background(255);
}

void draw() {
  background(255, 0);

  noFill();
  stroke(0);

  // Angles for sin() and cos() start at 3 o'clock;
  // subtract HALF_PI to make them start at the top

  ellipse(100, 100, 160, 160);

  float s = map(second(), 0, 60, 0, TWO_PI) - HALF_PI;
  float m = map(minute(), 0, 60, 0, TWO_PI) - HALF_PI;
  float h = map(hour(5) % 12, 0, 12, 0, TWO_PI) - HALF_PI;

  // every X seconds send a tick signal
  
  if ( second() % tickRate == 0 ) { 
  
    if ( !timerFlag ) {

		// callback external JS function nextChildShow in global.js
		
		if (nextChild != null ) {
		
			// println("nextChild  = " + nextChild);
			nextChild = nextChildShow('display', nextChild);
			timerFlag = true;
			
		}
    }
    
  } else {
  
      timerFlag = null; // reset flag
  }
  
  strokeWeight(1);
  line(100, 100, cos(s) * 72 + 100, sin(s) * 72 + 100);
  strokeWeight(2);
  line(100, 100, cos(m) * 68 + 100, sin(m) * 68 + 100);
  strokeWeight(2);
  line(100, 100, cos(h) * 44 + 100, sin(h) * 44 + 100);
}







