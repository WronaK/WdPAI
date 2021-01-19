const likeButton = document.querySelector("#like");
const saveButton = document.querySelector("#save");
const like = document.querySelectorAll(".fa-heart");

function add() {
    saveButton.addEventListener('click', saveAd);
    likeButton.addEventListener('click', giveLike);
}

document.addEventListener('DOMContentLoaded', add);

function giveLike() {
    const param = location.search.substring(1).split("&");
    const temp = param[0].split("=");
    const id = unescape(temp[1]);

    alert(id);
    fetch(`/like/${id}`)
        .then(function () {
            location.reload();
        })
}

function saveAd() {
    const param = location.search.substring(1).split("&");
    const temp = param[0].split("=");
    const id = unescape(temp[1]);

    fetch(`/save/${id}`)
        .then();
}