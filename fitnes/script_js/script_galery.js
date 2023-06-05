//*******************************add item 
let add_frame = document.getElementById("add_pict_frame");
let exit_but = document.getElementById("exit_add");
let add_but = document.getElementById("add_but");
add_but.addEventListener("click",open_add);
exit_but.addEventListener("click",exit_add);
function open_add(){
    add_frame.style.display="flex";
}
function exit_add(){
    add_frame.style.display="none";
}
//*******************************img player
let panel_img = document.getElementById("image_player");
let del = document.getElementById("delete");
let exite = document.getElementById("exite");
let image_player = document.getElementById("image");
let id,date;
// Get all elements with class "card"
let buttons = document.querySelectorAll(".card");
// Add a click event listener to each card
buttons.forEach(image => {
    image.addEventListener("click", () => {
        id = image.getAttribute("id");
        date = del.getAttribute("href");
        console.log(date);
        panel_img.style.display="flex";
        let href = `query_php/query_upload.php ?delete_pictur=${id} & delete_date=${date}`;
        del.setAttribute("href",href);
        let link = `../script_php/upload_img/${id}`;
        image_player.setAttribute("src",link);
    });
});
/*****exite */
exite.addEventListener("click",exit);
function exit(){
    panel_img.style.display="none";
}
