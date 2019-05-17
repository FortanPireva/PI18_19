const koordinatat = [50,150,250,350,170,330];
const shumz = 10000;

funksKanvasi7();


function funksKanvasi7()
{
    var c = document.getElementById("kanvasi7");
    var ctx = c.getContext("2d");
    var img = document.getElementById("drawImage");
    ctx.drawImage(img,0,0);
}

// DRAG AND DROP FUNCTIONS
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

var getjQ;
$(document).ready(function()
{
    getjQ = $("#jQpurp").text();
});

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
    if(a!=0 && a!=1 && part1==true)
    {
        a = parseInt((Math.random()*shumz))%2;
        if(a==0)
        {
            alert("We are really sorry, but no " + getjQ + " for you today! Try again tomorrow!");
        }
        else if(a==1)
        {
            var codept2;
            codept2 = parseInt(Math.random()*10000000);
            alert("Congratulations, you have won a 10% coupon!Your second code is KK" + codept2 + "FXV");
            document.getElementById("kodiloja2").innerHTML = "The second code: KK" + codept2 + "FXV";
        }
    }
}
