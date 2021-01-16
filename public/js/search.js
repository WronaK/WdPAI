const city = document.querySelector('input[placeholder="LOKALIZACJA"]');
const propertyType = document.querySelector('select[name="propertyType"]');
const priceFrom = document.querySelector('input[placeholder="CENA OD"]');
const priceTo = document.querySelector('input[placeholder="CENA DO"]');
const areaFrom = document.querySelector('input[placeholder="POWIERZCHNIA OD"]');
const areaTo = document.querySelector('input[placeholder="POWIERZCHNIA DO"]');
const advertisementContainer = document.querySelector('.advertisements');

const button = document.querySelector('#button-search');

function functionSearch() {
    const data = {
        city: city.value,
        propertyType: propertyType.value,
        priceFrom: priceFrom.value,
        priceTo: priceTo.value,
        areaFrom: areaFrom.value,
        areaTo: areaTo.value
    };

    fetch("/search", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(function (response) {
        return response.json();
    }).then(function (advers) {
        advertisementContainer.innerHTML = "";
        loadAdvertisements(advers)
    });
}

button.addEventListener("click", functionSearch);

function loadAdvertisements(advertisements) {
    advertisements.forEach(advertisement => {
        createAdvertisement(advertisement);
    })
}

function createAdvertisement(advertisement) {
    const template = document.querySelector('#advertisement-template');
    const clone = template.content.cloneNode(true);

    const image = clone.querySelector('img');
    image.src = `public/uploads/${advertisement.image}`;
    const city = clone.querySelector('#city');
    city.innerHTML = advertisement.city;
    const area = clone.querySelector('#area');
    area.innerHTML = advertisement.area;
    const price = clone.querySelector('#price');
    price.innerHTML = advertisement.price;
    const description = clone.querySelector('p');
    description.innerHTML = advertisement.description;
    const like = clone.querySelector('.fa-heart');
    like.innerHTML = advertisement.like;

    advertisementContainer.appendChild(clone);
}