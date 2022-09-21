function alterBtn(btn) {
    //console.log(btn.parentElement)
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
                sendDataEdit(row);

                let btn = document.createElement('button');
                btn.setAttribute('class', 'btn btn-info');
                btn.setAttribute('id', 'edit');
                btn.setAttribute('onclick', 'alterBtn(this)');
                btn.innerText = 'Edit';
                
                item.path[0].replaceWith(btn);

                for (td of item.path[2].children) {
                    if (td.id != 'package') {
                        let value = td.children[0].value;
                        td.children[0].replaceWith(value);
                    }
                }
            })
        }
    }
}

function sendDataEdit(row) {
    //console.log(row);
}
/*
alterEdit();

function alterEdit() {
    const list_btn = document.querySelectorAll('#edit');

    list_btn.forEach((element) => {
        console.log(element);
        element?.addEventListener('click', (btn) => {
            const row = (btn.target.parentElement).parentElement;
            
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
                        sendDataEdit(row);
    
                        let btn = document.createElement('button');
                        btn.setAttribute('class', 'btn btn-info');
                        btn.setAttribute('id', 'edit');
                        btn.innerText = 'Edit';
                        //console.log(item);
                        item.path[0].replaceWith(btn);
                        //alterEdit();
                    })
                }
            }
        })
    })
}
*/