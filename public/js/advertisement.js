const advertisementButtons = document.querySelectorAll(".loadAdver");

function eventAdvertisement() {
    const button = this;
    const container = button.parentElement;
    const id = container.getAttribute("id");

    location.replace(`http://localhost:8080/advertisement?id=${id}`);
}

advertisementButtons.forEach(button => button.addEventListener("click", eventAdvertisement));
