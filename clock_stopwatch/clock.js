"use strict";
var $ = function(id) { return document.getElementById(id); };

//global stop watch timer variable and elapsed time object
var stopwatchTimer;
var elapsedMinutes = 0;
var elapsedSeconds = 0;
var elapsedMilliseconds = 0;

var displayCurrentTime = function() {
var date = new Date();
    
    var hours = date.getHours();
    var ampm = "AM";
    if (hours > 12)
        {
            ampm = "PM";
            hours -=12;
        }
    var minutes = date.getMinutes();
    var seconds = date.getSeconds();
    
    $("hours").firstChild.nodeValue= padSingleDigit(hours);
    $("minutes").firstChild.nodeValue = padSingleDigit(minutes);
    $("seconds").firstChild.nodeValue = padSingleDigit(seconds);
    $("ampm").firstChild.nodeValue = ampm;
};

var padSingleDigit = function(num) {
	if (num < 10) {	return "0" + num; }
	else { return num; }
};

var tickStopwatch = function() {    
    // increment milliseconds by 10 milliseconds
    
    // if milliseconds total 1000, increment seconds by one and reset milliseconds to zero
    
    // if seconds total 60, increment minutes by one and reset seconds to zero
    
    //display new stopwatch time
    
    elapsedMilliseconds += 10;
    
    if(elapsedMilliseconds >1000)
        {
            elapsedSeconds += 1;
            elapsedMilliseconds = 0;
        }
        
        if (elapsedSeconds >= 60)
            {
                elapsedMinutes += 1;
                elapsedSeconds = 0;
            }
    
        $("s_minutes").firstChild.nodeValue = padSingleDigit(elapsedMinutes);
        $("s_seconds").firstChild.nodeValue = padSingleDigit(elapsedSeconds);
        $("s_ms").firstChild.nodeValue = elapsedMilliseconds;
    
    
};

// event handler functions
var startStopwatch = function(evt) {
    // prevent default action of link
        
    // do first tick of stop watch and then set interval timer to tick 
    // stop watch every 10 milliseconds. Store timer object in stopwatchTimer 
    // variable so next two functions can stop timer.
    
   stopwatchTimer= setInterval(tickStopwatch, 10);
    
    evt.preventDefault();
    
};

var stopStopwatch = function(evt) {
    // prevent default action of link
        
    // stop timer
    stopwatchTimer = clearInterval(stopwatchTimer);
    evt.preventDefault();
};

var resetStopwatch = function(evt) {
    // prevent default action of link
        
    // stop timer
    clearInterval(stopwatchTimer);
    
    
    elapsedMilliseconds = 0;
    elapsedSeconds = 0;
    elapsedMinutes = 0;
    
     $("s_minutes").firstChild.nodeValue = padSingleDigit(elapsedMinutes);
    $("s_seconds").firstChild.nodeValue = padSingleDigit(elapsedSeconds);
    $("s_ms").firstChild.nodeValue = elapsedMilliseconds;
    
    // reset elapsed variables and clear stopwatch display
        evt.preventDefault();

};

window.onload = function() {
    // set initial clock display and then set interval timer to display
    // new time every second. Don't store timer object because it 
    // won't be needed - clock will just run.
    displayCurrentTime();
    setInterval(displayCurrentTime, 1000);
    
    // set up stopwatch event handlers
    $("start").onclick = startStopwatch;
    $("stop").onclick = stopStopwatch;
    $("reset").onclick = resetStopwatch;
};