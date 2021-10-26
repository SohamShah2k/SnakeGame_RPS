var userChoice = null;
var computerChoice = null;
$(document).ready(
    function ()
    {
        $('#rock').click(function(){
            console.log("rock")
            userChoice = "rock";
            newComputerChoice();
            computResult();
        });
        $('#paper').click(function(){
            userChoice = "paper";
            newComputerChoice ();
            computResult();
        });
        $('#scissors').click(function(){
            userChoice = "scissors";
            newComputerChoice ();
            computResult();
        });
    }
);

function newComputerChoice ()
{
    computerChoice = Math.floor(Math.random() * 3) + 1;
    //take the random number from computerChoice above and assign it rock paper or scissors.
    if (computerChoice == 1)
    {
        computerChoice = "rock";
    }
    else if (computerChoice == 2)
    {
                    computerChoice = "paper";
    }
    else 
    {
                    computerChoice = "scissors";
    }

}
function computResult()
{
    var result; 
    var u = parseInt($('#yourWin').text());
    var c = parseInt($('#compWin').text());
    $('#yourWin').empty();
    $('#compWin').empty();
    $('#decl').empty();
    if (userChoice == computerChoice){
        result="Tie.";
    }
    else if ((userChoice == "rock" && computerChoice == "scissors")||(userChoice == "scissors" && computerChoice == "paper")||(userChoice == "paper" && computerChoice == "rock"))
    {
        result="You win!";
        u++;
    } 
    
    else{
        result="Sorry, you lose.";
        c++;
    } 
    
    var table=document.getElementById("result");
    // var row=table.insertRow(table.rows.length);
    // var cell=row.insertCell(row.cells.length);
    var img=document.createElement("img");
    img.src=document.getElementById(computerChoice).src;
    $('.choice > img').remove()
    $('.choice > div > img').remove()

    $('#comp .choice').append(img);
    // cell=row.insertCell(row.cells.length);
    img=document.createElement("img");
    img.src=document.getElementById(userChoice).src;
    $('#user .choice div').append(img);
    $('#yourWin').append(u);
    $('#compWin').append(c);
    $('#decl').append(result);
    
    // cell=row.insertCell(row.cells.length);
    // cell.innerHTML=result;
}

