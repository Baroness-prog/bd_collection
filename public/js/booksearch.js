const covers = document.querySelectorAll(".image_wish")

covers.forEach(cover=>{
    fetch(`/wishlist/cover/${cover.dataset.isbn}`)
        .then((response) => response.json())
        .then((data) => {
            console.log(data)

        });
})

/*wordInput.addEventListener('keyup', (event) => {
    fetch(`/word/definition/${wordInput.value}`)
        .then((response) => response.json())
        .then((data) => {
            definition.innerHTML = data;
        });
});*/