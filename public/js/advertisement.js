const advertisementButtons = document.querySelectorAll("div .advertisement");

function eventAdvertisement() {
    const button = this;
    const id = button.getAttribute("id");

    location.replace(`http://localhost:8080/advertisement?id=${id}`);
}

advertisementButtons.forEach(button => button.addEventListener("click", eventAdvertisement));
