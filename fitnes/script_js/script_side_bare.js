let side_bare = document.getElementById("sid_bar");
let fitnes_content = document.getElementById("fitnes_content");
let open_close = document.getElementById("open_close");
let anim_open="open_side 1s ease forwards";
let anim_close="close_side 2s ease forwards";
let min_panel="min_panel 1s ease forwards";
let max_panel="max_panel 2s ease forwards";
let test=0;
open_close.addEventListener('click',open_close_panel);

function open_close_panel(){
    if(test==0){
        side_bare.style.animation=anim_open;
        fitnes_content.style.animation=min_panel;
        test=1;
    }
    else{
        side_bare.style.animation=anim_close;
        fitnes_content.style.animation=max_panel;
        test=0;
    }
}
/***********************color changer************ */
// let red = document.getElementById("red");
// let blue = document.getElementById("blue");
// let bg_home = document.getElementById("bg_home");
// let image_modole = document.getElementById("image_modole");
// red.addEventListener('click',color_changer_red);
// blue.addEventListener('click',color_changer_blue);

// function color_changer_red(){
//     bg_home.style.backgroundImage="url(script_php/icons/bg_home2.jpg)";
//     image_modole.style.backgroundImage="url(script_php/icons/home3-1.png)";
// }
// function color_changer_blue(){
//     bg_home.style.backgroundImage="url(script_php/icons/bg_home.jpg)";
//     image_modole.style.backgroundImage="url(script_php/icons/home3.png)";
// }