const list_btn = document.querySelectorAll('#edit');

list_btn.forEach((element) => {
    element.addEventListener('click', (btn) => {
        let row = (btn.target.parentElement).parentElement;
    })
})