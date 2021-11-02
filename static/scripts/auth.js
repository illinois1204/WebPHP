function checkForm(form) {
    for (let i = 0; i < form.elements.length-1; i++){
        form.elements[i].style.color = '';
        form.elements[i].style.borderBottomColor = '';
    }
    for (let i = 0; i < form.elements.length-1; i++){
        if(form.elements[i].value.trim() === ''){
            form.elements[i].style.color = '#c11212';
            form.elements[i].style.borderBottomColor = '#c11212';
            return false;
        }
    }
}