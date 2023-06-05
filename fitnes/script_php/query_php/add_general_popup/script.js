let add_cat_frame = document.getElementById("add_cat_frame");
/*buttons*/
let open_button = document.getElementById("add_value_quick");
let exit_button = document.getElementById("exit_button");

exit_button.addEventListener("click",exit_fun);
open_button.addEventListener("click",open_fun);

// Add a click event listener to each chekbox
function open_fun(){
    add_cat_frame.style.visibility="visible";
}
function exit_fun(){
    add_cat_frame.style.visibility="hidden";
}
