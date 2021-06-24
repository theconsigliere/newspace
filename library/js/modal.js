// Get the modal
const modal = document.getElementById('myModal');


// if we have modal activated
if (modal) {

    // grab how many days the modal should be shown again after
    let days = parseInt(document.getElementById('modal-sider').textContent);

    // SHOW POP UP AGAIN AFTER SO MANY

    // if days set to 1 show pop up everytime
    if (days === 1 ) {
        localStorage.last = Date.now();
        modal.style.display = 'flex'; //Show the div because you haven't ever shown it before.

    } else {
        if(localStorage.last){
            if( (localStorage.last - Date.now() ) / (1000*60*60*24*days) >= 1){ //Date.now() is in milliseconds, so convert it all to days, and if it's more than 1 day, show the div
                modal.style.display = 'flex'; //Show the div
                localStorage.last = Date.now(); //Reset your timer
            }
        }
        else {
            localStorage.last = Date.now();
            modal.style.display = 'flex'; //Show the div because you haven't ever shown it before.
        }
    }


    // Get the <span> element that closes the modal
    const close = document.querySelector('.close-group')


    // When the user clicks on <span> (x), close the modal
    function hide() {
        modal.style.display = "none";
    }


    close.addEventListener('click', hide)

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {

        hide()

    }
}



