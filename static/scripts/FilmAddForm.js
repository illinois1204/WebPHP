function validateform(form){
    for (let i = 0; i < 3; i++) {
        if (form.elements[i].value.trim() == '') {
            alert('Не заполнено одно из полей');
            return false;
        }
    }
    if(form.elements['filmgenre'].value == '--Жанр--') {
        alert('Не указан жанр');
        return false;
    }
    if (form.elements["description"].value.trim() == '') {
        alert('Не заполнено одно из полей');
        return false;
    }
    // for (let i = 4; i < form.elements.length-1; i++) {
    //     if (form.elements[i].value.trim() == '') {
    //         alert('Не заполнено одно из полей');
    //         return false;
    //     }
    // }
}