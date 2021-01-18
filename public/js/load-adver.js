const advertisementContainer = document.querySelector('main');


function init() {
    const param =location.search.substring(1).split("&");

    const temp = param[0].split("=");
    const id = unescape(temp[1]);

    fetch(`/adver/${id}`).then(function (response) {
        return response.json();
    }).then(function (advers) {
        createAdvertisement(advers);
    });
}

document.addEventListener('DOMContentLoaded', init);

function createAdvertisement(advertisement) {
    const propertyType = advertisementContainer.querySelector('#property-type');
    propertyType.innerHTML = advertisement.property_type;
    const area = advertisementContainer.querySelector('#area');
    area.innerHTML = advertisement.area;
    const numberOfRooms = advertisementContainer.querySelector('#number-of-rooms');
    numberOfRooms.innerHTML = advertisement.number_of_rooms;
    const price = advertisementContainer.querySelector('#price');
    price.innerHTML = advertisement.price;


    const image = advertisementContainer.querySelector('#first-image');
    image.src = `public/uploads/${advertisement.image}`;

    const description = advertisementContainer.querySelector('#description p');
    description.innerHTML = advertisement.description;

    const city = advertisementContainer.querySelector('#city');
    city.innerHTML = advertisement.city;
    const street = advertisementContainer.querySelector('#street');
    street.innerHTML = advertisement.street;
    const numberOfHouse = advertisementContainer.querySelector('#number-of-house');
    numberOfHouse.innerHTML = advertisement.number_of_house;
    const postCode = advertisementContainer.querySelector('#post-code');
    postCode.innerHTML = advertisement.postcode;

    const image2 = advertisementContainer.querySelector('#second-image');
    image2.src = `public/uploads/${advertisement.image}`;

    const name = advertisementContainer.querySelector('#name');
    name.innerHTML = advertisement.name;
    const email = advertisementContainer.querySelector('#email');
    email.innerHTML = advertisement.email;
    const phone = advertisementContainer.querySelector('#phone-number');
    phone.innerHTML = advertisement.phone;

    const descriptionOfTargetGroup = advertisementContainer.querySelector('#description-of-target-group');
    descriptionOfTargetGroup.innerHTML = advertisement.description_of_target_group;

    const like = advertisementContainer.querySelector('#like i');
    like.innerHTML = advertisement.like;
}