var userInsertedRows = []

function insertCell(row, id) {
    row.insertCell().textContent = document.getElementById(id).value;
}

function handleSubmitRow(event) {
    event.preventDefault();

    var table = document.getElementById('supercomputersTable');
    var body = table.getElementsByTagName('tbody')[0]; 
    var newRow = body.insertRow(); 

    insertCell(newRow, "name");
    insertCell(newRow, "location");
    insertCell(newRow, "nodes");
    insertCell(newRow, "processors");
    insertCell(newRow, "accelerators");
    insertCell(newRow, "rmax");
    insertCell(newRow, "rpeak");
    insertCell(newRow, "developer");
    insertCell(newRow, "application");

    userInsertedRows.push(newRow);
    document.getElementById('addRowForm').reset();
}

function handleRemoveLastInsertedRow() {
    var rowToRemove = userInsertedRows.pop();
    var table = document.getElementById('supercomputersTable');
    var body = table.getElementsByTagName('tbody')[0];
    body.removeChild(rowToRemove)
}


function handleChangeTable(event) {
    event.preventDefault();

    var table = document.getElementById('supercomputersTable'); 

    table.style.maxWidth = document.getElementById("width").value + "px";
    table.style.maxHeight = document.getElementById("height").value + "px";

    var caption = table.getElementsByTagName('caption')[0];
    var caption_color = document.getElementById("captionColor").value;
    caption.style.backgroundColor = caption_color;

    var thead =  table.getElementsByTagName('thead')[0];
    var thead_color =  document.getElementById("headerColor").value;
    thead.style.backgroundColor = thead_color; 

    var thElements = thead.getElementsByTagName('th'); 
    for (var i = 0; i < thElements.length; i++) { 
        thElements[i].style.backgroundColor = thead_color; 
    } 
    
    var body = table.getElementsByTagName('tbody')[0];
    var tdElements = body.getElementsByTagName('td'); 
    var td_color = document.getElementById("cellColor").value;
    for (var j = 0; j < tdElements.length; j++) { 
        tdElements[j].style.backgroundColor = td_color;
    }
}

window.addEventListener('load', () => {
    updateClock();
    var remove = document.getElementById('removeRowButton');
    remove.addEventListener('click', handleRemoveLastInsertedRow);
    
    var show = document.getElementById('showSecondsButton');
    show.addEventListener('click', showSeconds);
});

window.addEventListener('beforeunload', (event) => {
    event.preventDefault();
});