
const form = document.querySelector('.ticket-form');

form.addEventListener('submit', (e) => {
    e.preventDefault();
    return false;
});

window.onload = function() {
    var columns = document.querySelectorAll('.column');

    for (let i = 0; i < columns.length; i++) {
        columns[i].addEventListener('click', function() {
            columns[i].classList.toggle('selected');

            for (let j = 0; j < columns.length; j++) {
                if (j === i) continue;

                columns[j].classList.remove('selected');
            }
        });
    }    
}
