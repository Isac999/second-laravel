const list_btn = document.querySelectorAll('#edit');

list_btn.forEach((element) => {
    element.addEventListener('click', (btn) => {
        let row = (btn.target.parentElement).parentElement;
        for (item of row.children) {
            if (item.id != 'package') {
                let innerContent = item.innerText;
                let input = document.createElement('input');
                input.setAttribute('value', innerContent);
                item.innerText = '';
                item.appendChild(input);
            }
        }
    })
})