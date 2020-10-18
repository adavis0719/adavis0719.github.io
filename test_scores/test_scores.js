var names = ["Ben", "Joel", "Judy", "Anne"];
var scores = [88, 98, 77, 88];

var $ = function (id) { return document.getElementById(id); };

var displayScores = function(){
    $("scores").innerHTML = "<h2>Scores</h2>";
    var th = "<tr><td style='font-weight:bold;'>Name</td><td style='font-weight:bold;'>Score</td></tr>"
    $("scores_table").innerHTML = th;
    
    for(var i=0; i<names.length;i++){
        $("scores_table").innerHTML += "<tr><td>"+names[i]+"</td><td>"+scores[i]+"</td></tr>"
    }
}

var addScore = function(){
    var name = $("name").value;
    var score = $("score").value;
    names[names.length] = name;
    scores[scores.length] = parseInt(score);
    $("name").value="";
    $("scores").value = "";
    displayScores();
}

var displayResults = function(){
    var sum = 0;
    var high_score = 0;
    var name = '';
    for(var i =0; i<scores.length; i++){
        sum += scores[i];
        if(scores[i]>high_score){
            high_score = scores[i];
            name = names[i];
        }
    }
   
    var average = sum/scores.length;
    $("results").innerHTML += "<h2>Results</h2>";
    $("results").innerHTML += "<p>Average Score = "+average+"</p>";
    $("results").innerHTML += "<p>High Score = " + name +
        " with a score of "+ high_score + "</p>";
}

window.onload = function () {
	$("add").onclick = addScore;
	$("display_results").onclick = displayResults;
	$("display_scores").onclick = displayScores;
};


