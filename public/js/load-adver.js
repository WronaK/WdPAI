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
    const template = document.querySelector('#advertisement-template');
    const clone = template.content.cloneNode(true);

    const propertyType = clone.querySelector('#property-type');
    propertyType.innerHTML = advertisement.property_type;
    const area = clone.querySelector('#area');
    area.innerHTML = advertisement.area;
    const numberOfRooms = clone.querySelector('#number-of-rooms');
    numberOfRooms.innerHTML = advertisement.number_of_rooms;
    const price = clone.querySelector('#price');
    price.innerHTML = advertisement.price;


    const image = clone.querySelector('#first-image');
    image.src = `public/uploads/${advertisement.image}`;

    const description = clone.querySelector('#description p');
    description.innerHTML = advertisement.description;

    const city = clone.querySelector('#city');
    city.innerHTML = advertisement.city;
    const street = clone.querySelector('#street');
    street.innerHTML = advertisement.street;
    const numberOfHouse = clone.querySelector('#number-of-house');
    numberOfHouse.innerHTML = advertisement.number_of_house;
    const postCode = clone.querySelector('#post-code');
    postCode.innerHTML = advertisement.postcode;

    const image2 = clone.querySelector('#second-image');
    image2.src = `public/uploads/${advertisement.image}`;

    const name = clone.querySelector('#name');
    name.innerHTML = advertisement.name;
    const email = clone.querySelector('#email');
    email.innerHTML = advertisement.email;
    const phone = clone.querySelector('#phone-number');
    phone.innerHTML = advertisement.phone;

    const descriptionOfTargetGroup = clone.querySelector('#description-of-target-group');
    descriptionOfTargetGroup.innerHTML = advertisement.description_of_target_group;

    // const like = clone.querySelector('.fa-heart');
    // like.innerHTML = advertisement.like;

    advertisementContainer.appendChild(clone);
}