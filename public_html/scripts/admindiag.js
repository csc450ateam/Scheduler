/**
  
  Admin Dialog JavaScript:
  
  Handles the behavior of the interactive dialog boxes that appear on the administrative side of ShiftWFM
  Corresponding button behavior is also handled here
  
*/

//creation of dialog and button variables using querySelector
var dialog = document.querySelector('#addemployeediag'),
	dialog2 = document.querySelector('#removeemployeediag'),
	dialog3 = document.querySelector('#viewempdiag'),
	dialog4 = document.querySelector('#editempdiag'),
	dialog5 = document.querySelector('#viewcurrscheddiag'),
	dialog6 = document.querySelector('#editreqhoursdiag'),
	dialog7 = document.querySelector('#viewavaildiag'),
	dialog8 = document.querySelector('#genscheddiag'),
	dialog9 = document.querySelector('#editscheddiag'),
	dialog10 = document.querySelector('#timeclockdiag'),
	dialog11 = document.querySelector('#forumdiag'),
	showModalButton = document.querySelector('#addemployeebtn'),
	showModalButton2 = document.querySelector('#removeemployeebtn'),
	showModalButton3 = document.querySelector('#viewempbtn'),
	showModalButton4 = document.querySelector('#editempbtn'),
	showModalButton5 = document.querySelector('#viewcurrschedbtn'),
	showModalButton6 = document.querySelector('#editreqhoursbtn'),
	showModalButton7 = document.querySelector('#viewavailbtn'),
	showModalButton8 = document.querySelector('#genschedbtn'),
	showModalButton9 = document.querySelector('#editschedbtn'),
	showModalButton10 = document.querySelector('#timeclockbtn'),
	showModalButton11 = document.querySelector('#forumbtn');
	
//register for later use with polyfill script
if (! dialog.showModal) {
	dialogPolyfill.registerDialog(dialog);
	dialogPolyfill.registerDialog(dialog2);
	dialogPolyfill.registerDialog(dialog3);
	dialogPolyfill.registerDialog(dialog4);
	dialogPolyfill.registerDialog(dialog5);
	dialogPolyfill.registerDialog(dialog6);
	dialogPolyfill.registerDialog(dialog7);
	dialogPolyfill.registerDialog(dialog8);
	dialogPolyfill.registerDialog(dialog9);
	dialogPolyfill.registerDialog(dialog10);
	dialogPolyfill.registerDialog(dialog11);
}

//event listeners for each button to make them show their corresponding dialog box
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

showModalButton7.addEventListener('click', function() {
    dialog7.showModal();
});

showModalButton8.addEventListener('click', function() {
    dialog8.showModal();
});

showModalButton9.addEventListener('click', function() {
    dialog9.showModal();
});

showModalButton10.addEventListener('click', function() {
    dialog10.showModal();
});

showModalButton11.addEventListener('click', function() {
    dialog11.showModal();
});


//event listener for close button in every dialog box generated
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
dialog7.querySelector('.close').addEventListener('click', function() {
	dialog7.close();
});
dialog8.querySelector('.close').addEventListener('click', function() {
	dialog8.close();
});
dialog9.querySelector('.close').addEventListener('click', function() {
	dialog9.close();
});
dialog10.querySelector('.close').addEventListener('click', function() {
	dialog10.close();
});
dialog11.querySelector('.close').addEventListener('click', function() {
	dialog11.close();
});



