let RemoveFromFavoritesButton = document.querySelector("button[name='remove_favorite']");
let AddFromFavoritesButton = document.querySelector("button[name='add_favorite']");

RemoveFromFavoritesButton.addEventListener('click', (event) => {
    event.preventDefault();
   let id = RemoveFromFavoritesButton.getAttribute('data-drink-id');
    let result = removeFromFavorites(id);
    RemoveFromFavoritesButton.classList.add('hidden');
    AddFromFavoritesButton.classList.remove('hidden');

    console.log(result);
});


AddFromFavoritesButton.addEventListener('click', (event) => {
    event.preventDefault();
    let id = AddFromFavoritesButton.getAttribute('data-drink-id');
    let result = addFromFavorites(id);
    AddFromFavoritesButton.classList.add('hidden');
    RemoveFromFavoritesButton.classList.remove('hidden');
    console.log(result);
});

async function removeFromFavorites(drinkId) {
    let response = await fetch(`/api/favorite-drinks/${drinkId}`, {
        method: 'DELETE'
    });
    if (!response.ok) {
        const message = `An error has occured: ${response.status}`;
        throw new Error(message);
    }
    return response.json();
}
async function addFromFavorites(drinkId) {
    let response = await fetch(`/api/favorite-drinks/`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({'drink_id': drinkId})
    });
    if (!response.ok) {
        const message = `An error has occured: ${response.status}`;
        throw new Error(message);
    }
    return response.json();
}

