function secretNumberFunction(){
    var secretNumber=Math.floor((Math.random() * 10) + 1);
    console.log(secretNumber);
    var n=5;
    var  i=0;
    var find =false;
    for (i=0;i<5;i++){
        input=prompt("GUESS THE NUMBER 0--10 (YOU HAVE "+n--+" Chances left");
        if(input==secretNumber){
            alert("YOU WIN");
            find=true;
            break;
        }
    }
    if(!find) {
        alert("you lost");
    }
        var choice=prompt("do you want to continue(TYPE O /N");
        if(choice=="O"){
            secretNumberFunction();
        }
        else {
            return;
        }

}
secretNumberFunction();
