/**
  
  Employee Dialog JavaScript:
  
  Handles the behavior of the interactive dialog boxes that appear on the employee side of ShiftWFM
  Corresponding button behavior is also handled here
  
*/

//creation of dialog and button variables using querySelector
var dialog = document.querySelector('#currscheddiag'),
	dialog2 = document.querySelector('#reqswapdiag'),
	dialog3 = document.querySelector('#reqdaydiag'),
	dialog4 = document.querySelector('#reqavaildiag'),
	dialog5 = document.querySelector('#timeclockdiag'),
	dialog6 = document.querySelector('#forumdiag'),
	showModalButton = document.querySelector('#currschedbtn'),
	showModalButton2 = document.querySelector('#reqswapbtn'),
	showModalButton3 = document.querySelector('#reqdaybtn'),
	showModalButton4 = document.querySelector('#reqavailbtn'),
	showModalButton5 = document.querySelector('#timeclockbtn'),
	showModalButton6 = document.querySelector('#forumbtn');
	
//register for later use with polyfill script
if (! dialog.showModal) {
	dialogPolyfill.registerDialog(dialog);
	dialogPolyfill.registerDialog(dialog2);
	dialogPolyfill.registerDialog(dialog3);
	dialogPolyfill.registerDialog(dialog4);
	dialogPolyfill.registerDialog(dialog5);
	dialogPolyfill.registerDialog(dialog6);
}

//event listeners for every button to show corresponding dialog box
showModalButton.addEventListener('click', function() {
    dialog.showModal();
});
showModalButton2.addEventListener('click', function() {
    dialog2.showModal();
});
showModalButton3.addEventListener('click', function() {
    dialog3.showModal();
});
showModalButton4.addEventListener('click', function() {
    dialog4.showModal();
});
showModalButton5.addEventListener('click', function() {
    dialog5.showModal();
});
showModalButton6.addEventListener('click', function() {
    dialog6.showModal();
});


//event listeners for close button in every dialog box
//default action retained (CloseModal)
dialog.querySelector('.close').addEventListener('click', function() {
	dialog.close();
});
dialog2.querySelector('.close').addEventListener('click', function() {
	dialog2.close();
});
dialog3.querySelector('.close').addEventListener('click', function() {
	dialog3.close();
});
dialog4.querySelector('.close').addEventListener('click', function() {
	dialog4.close();
});
dialog5.querySelector('.close').addEventListener('click', function() {
	dialog5.close();
});
dialog6.querySelector('.close').addEventListener('click', function() {
	dialog6.close();
});


