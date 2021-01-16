const buttonLogout = document.querySelector(".logout");

function eventLogout() {
    fetch(`/logout`).then(function () {
        location.reload();
    });
}

if(buttonLogout !== null) {
    buttonLogout.addEventListener("click", eventLogout);
}