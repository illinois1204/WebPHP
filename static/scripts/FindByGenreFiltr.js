$(document).ready(function() {
    $('#GenreList a').click(function() {
        $.ajax({
            url: 'Filtr.php',
            type: 'GET',
            data: {
                FilmGenre: $(this).text()
            },
            success: function(response) {
                document.getElementById('FilmList').innerHTML = `<hr style="margin: 0">`;
                JSON.parse(response).map(item => {
                    const row = `
                        <a style="font-size: 28px;" href='/player.php?FilmID=${item.id}'>${item.name}</a>
                        <div class="row">
                                <div class="col-md-4">
                                        <img style="object-fit: cover" width="100%" src=${item.poster ?? "static/images/noposter.jpg"} alt="Poster" />
                                </div>
                                <div class="col-md-8">
                                        <p>Год: ${item.year}</p>
                                        <p>Жанр: ${item.genre}</p>
                                        <p>Режисер: ${item.director}</p>
                                        <p class="description">${item.description}</p>
                                </div>
                        </div>
                        <hr style="margin: 1rem 0 0 0">`;
                    document.getElementById('FilmList').innerHTML += row;
                })
            }
        })
    })
})