function loadDatabase() {
    fetch('requests/get_supercomputer_projects.php')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.getElementById('data-table').getElementsByTagName('tbody')[0];
            tableBody.innerHTML = '';
            data.forEach(row => {
                const newRow = tableBody.insertRow();
                newRow.insertCell().textContent = row.code_name;
                newRow.insertCell().textContent = row.description;
                newRow.insertCell().textContent = row.project_developer;
                newRow.insertCell().textContent = row.scope;
                newRow.insertCell().textContent = row.date_begin;
                newRow.insertCell().textContent = row.name;
                newRow.insertCell().textContent = row.location;
                newRow.insertCell().textContent = row.performance;
                newRow.insertCell().textContent = row.developer;
            });
        });
}

function createOption(value, content)
{
    const option = document.createElement('option');
    option.value = value;
    option.textContent = content;
    return option;
}

function loadSupercomputers() {
    fetch('requests/get_supercomputers.php')
        .then(response => response.json())
        .then(data => {
            const select = document.getElementById('supercomputer_select');
            const modify_project = document.getElementById('modify_project_supercomputer_select');
            const remove = document.getElementById('remove_supercomputer_select');
            const modify = document.getElementById('modify_supercomputer_select');
            select.innerHTML = '';
            remove.innerHTML = '';
            modify.innerHTML = '';
            modify_project.innerHTML = '';
            data.forEach(row => {
                select.appendChild(createOption(row.computer_id, row.name));
                remove.appendChild(createOption(row.computer_id, row.name));
                modify.appendChild(createOption(row.computer_id, row.name));
                modify_project.appendChild(createOption(row.computer_id, row.name));
            });
        });
}

function loadProjects() {
    fetch('requests/get_projects.php')
        .then(response => response.json())
        .then(data => {
            const remove = document.getElementById('remove_project_select');
            const modify = document.getElementById('modify_project_select');
            modify.innerHTML = '';
            remove.innerHTML = '';
            data.forEach(row => {
                remove.appendChild(createOption(row.project_id, row.code_name));
                modify.appendChild(createOption(row.project_id, row.code_name));
            });
        });
}

window.addEventListener('load', () => {
    loadDatabase();
    loadSupercomputers();
    loadProjects();
});