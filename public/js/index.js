const list_btn = document.querySelectorAll('#delete');
const add = document.querySelector('#add');

list_btn.forEach((element) => {
    element.addEventListener('click', (btn) => {
        const value = window.confirm('Tem certeza que deseja remover este item da lista?');
        if (value) {
            const tr = btn.path[2];
            const id = tr.firstElementChild.innerText;

            tr.remove();
            sendIdRemove(id);
        }
    })
})

add.addEventListener('click', (element) => {
    const tbody = document.querySelector('tbody');
    const newNode = (tbody.lastElementChild).cloneNode(true);
    const btn = document.createElement('button');

    btn.setAttribute('class', 'btn btn-primary');
    btn.setAttribute('onclick', 'createData(this)');
    btn.innerText = 'Create';

    (newNode.lastElementChild).replaceChildren(btn);
    const listNodes = Array.from(newNode.children);

    listNodes.forEach((td) => {
        if (td.id != 'package') {
            td.innerHTML = '<input placeholder="type here">';
        }
    })
    tbody.appendChild(newNode);
})

function createData(btn) {
    const tdList = ((btn.parentElement).parentElement).children;
    Array.from(tdList).forEach((element) => {
        console.log(element);
    })

}

function alterBtn(btn) {
    const row = (btn.parentElement).parentElement;
        
    for (item of Array.from(row?.children)) {

        if (item.id != 'package') {
            let innerContent = item.innerText;

            let input = document.createElement('input');
            input.setAttribute('value', innerContent);

            item.innerText = '';
            item.appendChild(input);
        } 
        else {
            let btn = document.createElement('button');
            btn.setAttribute('class', 'btn btn-warning');
            btn.innerText = 'Change';
        
            (item.children)[0].replaceWith(btn);
            item.children[0].addEventListener('click', (item) => {

                let btn = document.createElement('button');
                btn.setAttribute('class', 'btn btn-info');
                btn.setAttribute('id', 'edit');
                btn.setAttribute('onclick', 'alterBtn(this)');
                btn.innerText = 'Edit';
                
                item.path[0].replaceWith(btn);
                let list = [];
                for (td of item.path[2].children) {
                    if (td.id != 'package') {
                        let value = td.children[0].value;
                        list.push(value)
                        td.children[0].replaceWith(value);
                    }
                }
                sendDataEdit(list);
            })
        }
    }
}

function sendDataEdit(list) {
    console.log(list);
}

function sendIdRemove(id) {
    console.log(id);
}