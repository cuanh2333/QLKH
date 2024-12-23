document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('userForm');
    const editButton = document.getElementById('editButton');
    const deleteButton = document.getElementById('deleteButton');
    const userTableBody = document.getElementById('userTableBody');
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const phoneInput = document.getElementById('phone');
    const addressInput = document.getElementById('address');
    const genderInput = document.getElementById('gender');
    const searchBox = document.getElementById('searchBox');
    const idInput = document.getElementById('id');
    let selectedRow = null;

    function disableButtons() {
        editButton.disabled = true;
        deleteButton.disabled = true;
    }

    disableButtons();

    userTableBody.addEventListener('click', function(e) {
        const row = e.target.closest('tr'); 

        if (row && row !== selectedRow) { 
            if (selectedRow) {
                selectedRow.classList.remove('selected');
            }

            selectedRow = row;
            selectedRow.classList.add('selected');

            editButton.disabled = false;
            deleteButton.disabled = false;

            const userId = row.cells[0].textContent; 
            const userName = row.cells[1].textContent; 
            const userEmail = row.cells[2].textContent; 
            const userPhone = row.cells[3].textContent; 
            const userAddress = row.cells[4].textContent; 
            const userGender = row.cells[5].textContent; 

            idInput.value = userId;
            nameInput.value = userName;
            emailInput.value = userEmail;
            phoneInput.value = userPhone;
            addressInput.value = userAddress;
            genderInput.value = userGender;
        }
    });

    addButton.addEventListener('click', function(e) {
        document.getElementById('action').value = 'addUser'; 
        form.submit();
    });

    editButton.addEventListener('click', function(e) {
        const userId = idInput.value;
        document.getElementById('action').value = 'updateUser';
        form.submit();
    });

    deleteButton.addEventListener('click', function(e) {
        const userId = idInput.value;
        if (confirm("Bạn có chắc chắn muốn xóa khách hàng này?")) {
            document.getElementById('action').value = 'deleteUser';
            form.submit();
        }
    });

    document.addEventListener('click', function(e) {
        if (!userTableBody.contains(e.target) && !e.target.closest('tr') && !e.target.closest('input') && !e.target.closest('button')) {
            resetForm();
        }
    });

    function resetForm() {
        if (selectedRow) {
            selectedRow.classList.remove('selected');
            selectedRow = null;
        }

        disableButtons();

        nameInput.value = '';
        emailInput.value = '';
        phoneInput.value = '';
        addressInput.value = '';
        genderInput.value = '';
    }

    searchBox.addEventListener('input', function() {
        if (!selectedRow) {
            disableButtons();
        }
    });
    
});
