let stat = document.getElementById("statistics_courbe");
let body = document.getElementById("statistics_body");
let cat_bras = document.getElementById("cat_bras");
let cat_aktef = document.getElementById("cat_aktef");
let cat_kirch = document.getElementById("cat_kirch");
let cat_fits = document.getElementById("cat_fits");
let tab_element=[stat,body,cat_bras,cat_aktef,cat_kirch,cat_fits];
window.addEventListener("scroll",scroll);
let test1=0;
let test2=0;
let anim1="card_rotate 2s ease forwards";
let anim2="alementation 4s ease infinite";
let anim3="card_rot 1s ease forwards";
let anim4="alement 4s ease infinite";
function scroll(){
    value1 = parseInt(window.scrollY);
    if(value1>=500){
        if(test1==0){
            stat.style.animation=anim1;
            body.style.animation=anim1;
        }
        setTimeout(function() {
            for(i=0;i<=1;i++){
                tab_element[i].style.transform="rotateY(0deg)";
                tab_element[i].style.animation=anim2;
            }
        }, 2000); // Delay of 2000 milliseconds (2 seconds)
        test1=1;
    }
    if(value1>=1000){//1000
        if(test2==0){
            cat_bras.style.animation=anim3;
            setTimeout(function() {
                cat_aktef.style.animation=anim3;
            }, 500);
            setTimeout(function() {
                cat_kirch.style.animation=anim3;
            }, 1000);
            setTimeout(function() {
                cat_fits.style.animation=anim3;
            }, 1500);
        }
        setTimeout(function() {
            for(i=2;i<=5;i++){
                tab_element[i].style.width="235px";
                tab_element[i].style.height="325px";
                tab_element[i].style.animation=anim4;
            }
        }, 2000); // Delay of 2000 milliseconds (2 seconds)
        test2=1;
    }
}
