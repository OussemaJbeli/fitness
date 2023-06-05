let add_cat_frame = document.getElementById("add_cat_frame");
/*buttons*/
let buttons = document.querySelectorAll(".button_bras");
let exit_button = document.getElementById("exit_button");
let cat_val = document.getElementById("cat_val");
let save_cat = document.getElementById("save_cat");
let value_num;
let id;
let link_page;
exit_button.addEventListener("click",exit_fun);
save_cat.addEventListener("click",save_val);
// Add a click event listener to each chekbox
buttons.forEach(image => {
    image.addEventListener("click", () => {
        /****get id */
        id = image.getAttribute("id");
        console.log(id);
        add_cat_frame.style.visibility="visible";
    });
});
function exit_fun(){
    add_cat_frame.style.visibility="hidden";
}
/****send value */
function save_val(){
    value_num=cat_val.value;
    if(isNaN(value_num))
    {
        alert("please create a number");
    }
    else{
        switch(id){
            case "button_rigth_bras":link_page="query_bras.php";break;
            case "button_left_bras":link_page="query_bras.php";break;
            case "button_kirch":link_page="query_kirch.php";break;
            case "button_ass":link_page="query_kirch.php";break;
            case "button_choulder":link_page="query_aktef.php";break;
            case "button_left_feet":link_page="query_fits.php";break;
            case "button_rigth_feet":link_page="query_fits.php";break;
        }
        openLinkWithDelay('query_php/'+link_page+'? '+id+'="'+value_num+'"');
    }
}
function openLinkWithDelay(link) {
    setTimeout(function() {
        window.location.href = link;
    }, 1000); // Delay of 2000 milliseconds (2 seconds)
}