
window.onload = function() {
    const menu_btn = document.querySelector('.burger');
    const mobile_menu = document.querySelector('.mobile-nav');

    menu_btn.addEventListener('click', function() {
        menu_btn.classList.toggle('is-active');
        mobile_menu.classList.toggle('is-active');
    });

    // Ticket form
    let form = document.querySelecter('form');

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        return false;
    });
}