
window.onload = function() {
    const menu_btn = document.querySelector('.burger');

    menu_btn.addEventListener('click', function() {
        menu_btn.classList.toggle('is-active');
    });
}