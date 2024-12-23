$(document).ready(function() {
    $('#searchBox').on('input', function() {
        var searchTerm = $(this).val().trim();
        if (searchTerm.length > 0) {
            //AJAX
            $.ajax({
                url: '../../search.php',
                method: 'GET',
                data: { term: searchTerm },
                success: function(response) {
                    try {
                        var data = JSON.parse(response);
                        if (data.length > 0) {
                            updateTable(data); 
                        } else {
                            $('#userTableBody').html('<tr><td colspan="6" class="text-center">Không có kết quả nào.</td></tr>');
                        }
                    } catch (error) {
                        console.error('Lỗi khi phân tích dữ liệu JSON:', error);
                        $('#userTableBody').html('<tr><td colspan="6" class="text-center">Lỗi khi xử lý dữ liệu tìm kiếm.</td></tr>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Lỗi yêu cầu AJAX:', error);
                    $('#userTableBody').html('<tr><td colspan="6" class="text-center">Không thể kết nối đến máy chủ.</td></tr>');
                }
            });
        } else {
            loadAllUsers();
        }
    });

    function updateTable(users) {
        var tableBody = $('#userTableBody');
        tableBody.empty(); 
        // Duyệt qua danh sách người dùng và hiển thị
        users.forEach(function(user) {
            var row = $('<tr></tr>');
            row.append('<td>' + user.id + '</td>');
            row.append('<td>' + user.name + '</td>');
            row.append('<td>' + user.email + '</td>');
            row.append('<td>' + user.mobile + '</td>');
            row.append('<td>' + user.address + '</td>');
            row.append('<td>' + user.gender + '</td>');
            tableBody.append(row);
        });
    }

});
