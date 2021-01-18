const deleteButtons = document.querySelectorAll(".buttonDelete");

function deleteAd() {
    const deleteButton = this;
    const container = deleteButton.parentElement;
    const id = container.getAttribute("id");

    fetch(`/delete/${id}`,{
        method: 'delete'
    }).then(function () {
        location.reload();
    })
}

deleteButtons.forEach(button => button.addEventListener("click", deleteAd));