const buttonLogin = document.querySelector("#login");
const buttonRegistration = document.querySelector("#registration");

function changeBookmark(activeBookmark, disActiveBookmark) {
    disActiveBookmark.classList.add('active-bookmark');
    activeBookmark.classList.remove('active-bookmark');
    activeBookmark.classList.add('disactive-bookmark');
    disActiveBookmark.classList.remove('disactive-bookmark');
}

buttonLogin.addEventListener('click', function () {
    location.replace(`http://localhost:8080/login`);
})

buttonRegistration.addEventListener('click', function () {
    location.replace(`http://localhost:8080/registration`);

})
document.addEventListener('DOMContentLoaded', init);

function init() {
    const param = location.toString();

    if(param.indexOf("registration") > -1) {
        changeBookmark(buttonLogin, buttonRegistration);
    } else if(param.indexOf("login") > -1) {
        changeBookmark(buttonRegistration, buttonLogin);
    }
}

