var userInsertedRows = []

function insertCell(row, id) {
    row.insertCell().textContent = document.getElementById(id).value;
}

function handleSubmitRow(event) {
    event.preventDefault();

    var table = document.getElementById('supercomputersTable').getElementsByTagName('tbody')[0]; 
    var newRow = table.insertRow(); 

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

function removeLastInsertedRow() {
    var rowToRemove = userInsertedRows.pop();
    var table = document.getElementById('supercomputersTable').getElementsByTagName('tbody')[0];
    table.removeChild(rowToRemove)
}


function handleChangeTable(event) {
    event.preventDefault();

    var table = document.getElementById('supercomputersTable'); 

    table.style.maxWidth = document.getElementById("width").value + "px";
    table.style.maxHeight = document.getElementById("height").value + "px";

    table.getElementsByTagName('caption')[0].style.backgroundColor = document.getElementById("captionColor").value; 
    table.getElementsByTagName('thead')[0].style.backgroundColor = document.getElementById("headerColor").value; 

    var thElements = table.getElementsByTagName('thead')[0].getElementsByTagName('th'); 
    for (var i = 0; i < thElements.length; i++) { 
        thElements[i].style.backgroundColor = document.getElementById("headerColor").value; 
    } 
    
    var tdElements = table.getElementsByTagName('tbody')[0].getElementsByTagName('td'); 
    for (var j = 0; j < tdElements.length; j++) { 
        tdElements[j].style.backgroundColor = document.getElementById("cellColor").value;
    }
}

window.addEventListener('load', () => {
    updateClock();
    document.getElementById('removeRowButton').addEventListener('click', removeLastInsertedRow);
    document.getElementById('showSecondsButton').addEventListener('click', showSeconds);
});

window.addEventListener('beforeunload', (event) => {
    event.preventDefault();
});