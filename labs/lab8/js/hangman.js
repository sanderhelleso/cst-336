var selectedWord = "";
var selectedHint = "";
var board = [];
var hintDisplay = false;
var remainingGuesses = 6;
var words = [{ word: "snake", hint: "It's a reptile"},
             { word: "monkey", hint: "It's a mammal"},
             { word: "beetle", hint: "It's an insect"}];


var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];


window.onload = startGame();

$(".letter").click(function(){
    checkLetter($(this).attr("id"));
    disableButton($(this));
})

$(".replayBtn").on("click", function() {
   location.reload(); 
});

$("#userHint").on("click", function(){
    if(hintDisplay == false){
        $("#displayHint").append("<br>");
        $("#displayHint").append("<span class='hint'> Hint: " + selectedHint + "</span>");
        hintDisplay = true;
        remainingGuesses--;
        updateMan();
    }
});

function startGame(){
    pickWord();
    initBoard();
    createLetters();
    updateBoard();
}

function initBoard(){
    for (var letter in selectedWord){
        board.push("_");
    }
}

function updateMan(){
    $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png");
}
          
function pickWord(){
    var randomInt = Math.floor(Math.random() * words.length);
    selectedWord = words[randomInt].word.toUpperCase();
    selectedHint = words[randomInt].hint;
}

function createLetters(){
    for(var letter of alphabet){
        $("#letters").append("<button class='letter btn btn-success' id='" + letter + "'>" + letter + "</button>");
    }
}

function endGame(win){
    $("#letters").hide();
    
    if(win){
        $('#won').show();
        var temp = sessionStorage.getItem("guesses");
        temp.push(selectedWord);
        sessionStorage.setItem("guesses", temp);
    }
    else{
        $('#lost').show();
    }
}

function checkLetter(letter){
    var positions = new Array();
    for(var i = 0; i < selectedWord.length; i++){
        if(letter == selectedWord[i]){
            positions.push(i);
        }
    }
    
    if(positions.length > 0){
        updateWord (positions, letter);
        
        if(!board.includes('_')){
            endGame(true);
        }
    }
    else{
        remainingGuesses -= 1;
        updateMan();
    }
    
    if(remainingGuesses <= 0){
        endGame(false);
    }
}

function updateWord(positions, letter){
    for(var pos of positions){
        board[pos] = letter;
    }
    updateBoard();
}

function disableButton(btn){
    btn.prop("disabled", true);
    btn.attr("class", "btn btn-danger");
}

function updateBoard(){
    $("#word").empty();
    
    for(var i = 0; i < board.length; i++){
        $("#word").append(board[i] + " ");
    }
    
    $("#word").append("<br />");
    
 
}