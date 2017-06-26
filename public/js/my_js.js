 
function check_empty() {
if (document.getElementById('name').value == "" || document.getElementById('email').value == "" || document.getElementById('msg').value == "") {
alert("Fill All Fields !");
} else {
document.getElementById('form').submit();
alert("Form Submitted Successfully...");
}
}
//Function To Display Popup
function div_show(val) {
	console.log(val);
document.getElementById('abc').style.display = "block";
document.getElementById('Listing_id').value = val;
}
//Function to Hide Popup
function div_hide(){
document.getElementById('abc').style.display = "none";
}
