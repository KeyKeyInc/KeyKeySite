
// Aggiunta della classe e cambio colore della selezione prezzi
/*
window.onload = function() {
    var columns = document.querySelectorAll('.column');
    var info = document.querySelectorAll('.info')

    for (let i = 0; i < columns.length; i++) {
        columns[i].addEventListener('click', function() {
            columns[i].classList.toggle('selected');
            info[i].classList.toggle('selected');

            for (let j = 0; j < columns.length; j++) {
                if (j === i) continue;

                columns[j].classList.remove('selected');
                info[j].classList.remove('selected');
            }
        });
    }     
}*/

window.onload = function() {
    var columns = document.querySelectorAll('.column');
    var info = document.querySelectorAll('.info');
    var radioButtons = document.querySelectorAll('input[name=radio]');

    for (let i = 0; i < columns.length; i++) {
        columns[i].addEventListener('click', function() {
            if (radioButtons[i].checked == 0) {
                radioButtons[i].checked = true;
            } else {
                radioButtons[i].checked = false;
            }

            columns[i].classList.toggle('selected');
            info[i].classList.toggle('selected');

            for (let j = 0; j < columns.length; j++) {
                if (j === i) continue;

                columns[j].classList.remove('selected');
                info[j].classList.remove('selected');
            }
        });
    }     
}

