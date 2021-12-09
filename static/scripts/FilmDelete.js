$(document).ready(function (){
    $('td a').click(function (){
        const row = $(this).closest('tr');
        $.ajax({
            url: 'FilmDelete.php',
            type: 'POST',
            data: {
                FilmID: row.find('td:first').text()
            },
            success: function(resposne) {
                row.hide();
                console.log(resposne)
            }
        })
    })
})