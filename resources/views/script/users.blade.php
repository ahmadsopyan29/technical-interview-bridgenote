<script type="text/javascript">
$(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('users.user') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'positionStatus', name: 'positionStatus'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $('#createNewUser').click(function () {
        $('#saveBtn').html("Save");
        $('#id').val('');
        $('#userForm').trigger("reset");
        $('#modalHeading').html("Add New User");
        $('#userModal').modal('show');
    });

    $("#password").on("keyup",function(){
        if($(this).val()){
            $(".viewPassword").show();
        }else{
            $(".viewPassword").hide();
        }
    });

    $(".viewPassword").mousedown(function(){
                $("#password").attr('type','text');
            }).mouseup(function(){
                $("#password").attr('type','password');
            }).mouseout(function(){
                $("#password").attr('type','password');
    });

    $("#c_password").on("keyup",function(){
    if($(this).val())
        $(".viewConfirmPassword").show();
    else
        $(".viewConfirmPassword").hide();
    });

    $(".viewConfirmPassword").mousedown(function(){
                $("#c_password").attr('type','text');
            }).mouseup(function(){
                $("#c_password").attr('type','password');
            }).mouseout(function(){
                $("#c_password").attr('type','password');
    });

    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        var valueId = $('#id').val();
        if(valueId){
            $.ajax({
                data: $('#userForm').serialize(),
                url: "api/update",
                type: "PUT",
                dataType: 'json',
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('Authorization', "Bearer {{ Session::get('userToken') }}");
                },
                success: function (data) {
                    $('#userForm').trigger("reset");
                    $('#userModal').modal('hide');
                    $('#saveBtn').html('Save');
                    const Toast = Swal.mixin({toast: true,position: 'top-end',showConfirmButton: false,timer: 2000});
                        Toast.fire({
                        icon: 'success',
                        title: '&nbsp;&nbsp;Data Update Successfully !'
                    });
                    table.draw();
                },
                error: function (data) {
                    const Toast = Swal.mixin({toast: true,position: 'top-end',showConfirmButton: false,timer: 3000});
                        Toast.fire({
                        icon: 'warning',
                        title: '&nbsp;&nbsp;' + Object.values(data.responseJSON.messages)[0]
                    });
                    $('#saveBtn').html('Update');
                }
            });
        }else{
            $.ajax({
                data: $('#userForm').serialize(),
                url: "api/insertuser",
                type: "POST",
                dataType: 'json', 
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('Authorization', "Bearer {{ Session::get('userToken') }}");
                },
                success: function (data) {
                    $('#userForm').trigger("reset");
                    $('#userModal').modal('hide');
                    $('#saveBtn').html('Save');
                    const Toast = Swal.mixin({toast: true,position: 'top-end',showConfirmButton: false,timer: 2000});
                        Toast.fire({
                        icon: 'success',
                        title: '&nbsp;&nbsp;Data Save Successfully !'
                    });
                    table.draw();
                },
                error: function (data) {
                    const Toast = Swal.mixin({toast: true,position: 'top-end',showConfirmButton: false,timer: 3000});
                        Toast.fire({
                        icon: 'warning',
                        title: '&nbsp;&nbsp;' + Object.values(data.responseJSON.messages)[0]
                    });
                    $('#saveBtn').html('Save');
                }
            });
        }
        
    });

    $('body').on('click', '.editUser', function () {
        var id = $(this).data('id');
        $.ajax({
            type: "GET",
            url: "api/user" + '/' + id,
            dataType: 'json',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', "Bearer {{ Session::get('userToken') }}");
            },
            success: function (data) {
                $('#modalHeading').html("Edit User");
                $('#saveBtn').html("Update");
                $('#userModal').modal('show');
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#email_old').val(data.email);
            },
            error: function (data) {
                console.log('Error:', data);
                const Toast = Swal.mixin({toast: true,position: 'top-end',showConfirmButton: false,timer: 3000});
                    Toast.fire({
                    icon: 'warning',
                    title: '&nbsp;&nbsp;user not found !' 
                });
            }
        });
        
    });

    $('body').on('click', '.deleteUser', function () {
        var id = $(this).data("id");
        Swal.fire({
            title: "Delete Confirmation",
            icon: "warning",
            text: 'Are you sure you want to delete this user ?',
            showCancelButton: !0,
            confirmButtonText: "Yes",
            cancelButtonText: "Cancel",
            reverseButtons: !0
        }).then(function (e) {
            console.log(e)
            if (e.value === true) {
                $.ajax({
                    type: "DELETE",
                    url: "api/deleteuser" + '/' + id,
                    dataType: 'json',
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('Authorization', "Bearer {{ Session::get('userToken') }}");
                    },
                    success: function (data) {
                        table.draw();
                        const Toast = Swal.mixin({toast: true,position: 'top-end',showConfirmButton: false,timer: 5000});
                        Toast.fire({
                        icon: 'success',
                        title: '&nbsp;&nbsp;Delete is successful !'
                        });
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        const Toast = Swal.mixin({toast: true,position: 'top-end',showConfirmButton: false,timer: 3000});
                            Toast.fire({
                            icon: 'warning',
                            title: '&nbsp;&nbsp;Delete failed !' 
                        });
                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        });  
    });

    $('body').on('click', '.addPosition', function () {
        var user_id = $(this).data('user_id');
        $('#positionForm').trigger("reset");
        $('#positionBtn').html("Save");
        $('#user_id').val(user_id);
        $('#type').val("add");
        $('#modalPositionHeading').html("Add Position");
        $('#positionModal').modal('show');
    });

    $('#positionBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        var type = $('#type').val();
        if(type == 'update'){
            var url = 'api/updateposition';
            var method = 'PUT';
        }else{
            var url = 'api/insertposition';
            var method = 'POST';
        }
        $.ajax({
            data: $('#positionForm').serialize(),
            url: url,
            type: method,
            dataType: 'json',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', "Bearer {{ Session::get('userToken') }}");
            },
            success: function (data) {
                $('#positionForm').trigger("reset");
                $('#positionModal').modal('hide');
                $('#positionBtn').html('Save');
                const Toast = Swal.mixin({toast: true,position: 'top-end',showConfirmButton: false,timer: 2000});
                    Toast.fire({
                    icon: 'success',
                    title: '&nbsp;&nbsp;Data Save Successfully !'
                });
                table.draw();
            },
            error: function (data) {
                const Toast = Swal.mixin({toast: true,position: 'top-end',showConfirmButton: false,timer: 3000});
                    Toast.fire({
                    icon: 'warning',
                    title: '&nbsp;&nbsp;' + Object.values(data.responseJSON.messages)[0]
                });
                $('#positionBtn').html('Save');
            }
        });
        
        
    });

    $('body').on('click', '.editPosition', function () {
        var user_id = $(this).data('user_id');
        $.ajax({
            type: "GET",
            url: "api/position" + '/' + user_id,
            dataType: 'json',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', "Bearer {{ Session::get('userToken') }}");
            },
            success: function (data) {
                $('#modalPositionHeading').html("Edit User");
                $('#positionBtn').html("Update");
                $('#positionModal').modal('show');
                $('#user_id').val(data.user_id);
                $('#position').val(data.position);
                $('#status').val(data.status);
                $('#type').val("update");
            },
            error: function (data) {
                console.log('Error:', data);
                const Toast = Swal.mixin({toast: true,position: 'top-end',showConfirmButton: false,timer: 3000});
                    Toast.fire({
                    icon: 'warning',
                    title: '&nbsp;&nbsp;user not found !' 
                });
            }
        });
        
    });

        $('body').on('click', '.deletePosition', function () {
        var user_id = $(this).data("user_id");
        Swal.fire({
            title: "Delete Confirmation",
            icon: "warning",
            text: 'Are you sure you want to delete this position ?',
            showCancelButton: !0,
            confirmButtonText: "Yes",
            cancelButtonText: "Cancel",
            reverseButtons: !0
        }).then(function (e) {
            console.log(e)
            if (e.value === true) {
                $.ajax({
                    type: "DELETE",
                    url: "api/deleteposition" + '/' + user_id,
                    dataType: 'json',
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('Authorization', "Bearer {{ Session::get('userToken') }}");
                    },
                    success: function (data) {
                        table.draw();
                        const Toast = Swal.mixin({toast: true,position: 'top-end',showConfirmButton: false,timer: 5000});
                        Toast.fire({
                        icon: 'success',
                        title: '&nbsp;&nbsp;Delete is successful !'
                        });
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        const Toast = Swal.mixin({toast: true,position: 'top-end',showConfirmButton: false,timer: 3000});
                            Toast.fire({
                            icon: 'warning',
                            title: '&nbsp;&nbsp;Delete failed !' 
                        });
                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        });  
    });

});
</script>