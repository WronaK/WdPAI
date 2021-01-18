const buttonSetting = document.querySelector("#change-password");
const buttonDisabled = document.querySelector("#disabled-account");

function changeBookmark(activeBookmark, disActiveBookmark) {
    disActiveBookmark.classList.add('active-bookmark');
    activeBookmark.classList.remove('active-bookmark');
    activeBookmark.classList.add('disactive-bookmark');
    disActiveBookmark.classList.remove('disactive-bookmark');
}

buttonSetting.addEventListener('click', function () {
    location.replace(`http://localhost:8080/updateSettings`);
})

buttonDisabled.addEventListener('click', function () {
    location.replace(`http://localhost:8080/disableAccount`);
})

document.addEventListener('DOMContentLoaded', init);

function init() {
    const param = location.toString();

    if(param.indexOf("disableAccount") > -1) {
        changeBookmark(buttonSetting, buttonDisabled);
    } else if(param.indexOf("updateSettings") > -1) {
        changeBookmark(buttonDisabled, buttonSetting);
    }
}