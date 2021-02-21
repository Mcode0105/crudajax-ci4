<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <?= $this->renderSection('conten'); ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script>
        function loadmurid() {
            $.ajax({
                method: "GET",
                url: "/Home/fetch",
                success: function(response) {
                    // console.log(response.students);
                    $.each(response.students, function(key, value) {
                        $(".murid").append('<tr>\
                            <td id="idmurid">' + value['id'] + '</td>\
                            <td>' + value['nama'] + '</td>\
                            <td>' + value['nisn'] + '</td>\
                            <td>' + value['alamat'] + '</td>\
                            <td>' + value['nohp'] + '</td>\
                            <td>' + value['created_at'] + '</td>\
                            <td>\
                                <a href="#" id="view" class= "btn btn-info"> View</a>\
                                <a href="#" id="edit" class= "btn btn-warning"> Edit</a>\
                                <a href="#" id="delete" class= "btn btn-danger"> Delete</a>\
                            </td>\
                        </tr>');
                    });
                }
            })
        }
        $(document).ready(function() {
            $("#keyword").on('keyup', function() {
                let keyword = $("#keyword").val();
                $.ajax({
                    type: "POST",
                    url: "/Home/search",
                    data: {
                        keyword: keyword
                    },
                    success: function(response) {
                        $.each(response, function(key, keyword) {
                            $(".murid").append('<tr>\
                            <td id="idmurid">' + keyword['id'] + '</td>\
                            <td>' + keyword['nama'] + '</td>\
                            <td>' + keyword['nisn'] + '</td>\
                            <td>' + keyword['alamat'] + '</td>\
                            <td>' + keyword['nohp'] + '</td>\
                            <td>' + keyword['created_at'] + '</td>\
                            <td>\
                                <a href="#" id="view" class= "btn btn-info"> View</a>\
                                <a href="#" id="edit" class= "btn btn-warning"> Edit</a>\
                                <a href="#" id="delete" class= "btn btn-danger"> Delete</a>\
                            </td>\
                        </tr>');
                        });
                    }
                });
            });
        });
        $(document).ready(function() {
            $("#fr").hide();
            loadmurid();
            $(document).on('click', '.ajaxsave', function() {
                if ($.trim($('#nama').val()).length == 0) {
                    error_name = 'nama tidak boleh kosong';
                    $('#error').text(error_name);
                } else {
                    error_name = '';
                    $('#error').text(error_name);
                }
                if ($.trim($('#nisn').val()).length == 0) {
                    error_nisn = 'nisn tidak boleh kosong';
                    $('#error_nisn').text(error_nisn);
                } else {
                    error_nisn = '';
                    $('#error_nisn').text(error_nisn);
                }
                if ($.trim($('#alamat').val()).length == 0) {
                    error_alamat = 'alamat tidak boleh kosong';
                    $('#error_alamat').text(error_alamat);
                } else {
                    error_alamat = '';
                    $('#error_alamat').text(error_alamat);
                }
                if ($.trim($('#nohp').val()).length == 0) {
                    error_nohp = 'no hp tidak boleh kosong';
                    $('#error_nohp').text(error_nohp);
                } else {
                    error_nohp = '';
                    $('#error_nohp').text(error_nohp);
                }
                if (error_name != '' || error_nisn != '' || error_nohp != '' || error_alamat != '') {
                    return false;
                } else {
                    let data = {
                        'nama': $('#nama').val(),
                        'nisn': $('#nisn').val(),
                        'alamat': $('#alamat').val(),
                        'nohp': $('#nohp').val(),
                    };
                    $.ajax({
                        type: "POST",
                        url: "/Home/addajax",
                        data: data,
                        success: function(response) {
                            $('#addmodal').modal('hide');
                            $('#addmodal').find('input').val('');
                            $(".murid").html("");
                            loadmurid();
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'data berhasil di tambahkan',
                            });
                        }
                    })
                }
            })
            $(document).on('click', '#view', function() {
                let id = $(this).closest("tr").find('#idmurid').text();
                // alert(id);
                $.ajax({
                    type: "POST",
                    url: "/Home/viewmurid",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        $.each(response, function(key, viewmurid) {
                            $(".nama").text(viewmurid['nama']);
                            $(".nisn").text(viewmurid['nisn']);
                            $(".alamat").text(viewmurid['alamat']);
                            $(".nohp").text(viewmurid['nohp']);
                            $(".ss").text(viewmurid['nama']);
                            $(".createdat").text(viewmurid['created_at']);
                            $(document).ajaxSend(function() {
                                $("#load").html("<div class='alert alert-warning' role='alert'>Loading....</div>");
                            });
                            $(document).ajaxComplete(function() {
                                $("#load").html("");
                            });
                            $("#list").slideDown(200);
                            $("#draf").hide();
                        });
                    }
                });
            });
            $(document).on('click', '#edit', function() {
                let id = $(this).closest("tr").find('#idmurid').text();
                $.ajax({
                    type: "POST",
                    url: "/Home/viewedit",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        $.each(response, function(key, ved) {
                            $("#id").val(ved['id']);
                            $("#nama").val(ved['nama']);
                            $("#nisn").val(ved['nisn']);
                            $("#alamat").val(ved['alamat']);
                            $("#nohp").val(ved['nohp']);
                            $(document).ajaxSend(function() {
                                $("#loader").html("<div class='alert alert-warning' role='alert'>Loading....</div>");
                            });
                            $(document).ajaxComplete(function() {
                                $("#loader").html("");
                            });
                            $("#fr").slideDown(200);
                        });
                    }
                });
            });
            $(document).on('click', '#editsd', function() {
                let data = {
                    'id': $("#id").val(),
                    'nama': $("#nama").val(),
                    'nisn': $("#nisn").val(),
                    'alamat': $("#alamat").val(),
                    'nohp': $("#nohp").val(),
                }
                $.ajax({
                    type: "POST",
                    url: "/Home/edit",
                    data: data,
                    success: function(response) {
                        $("#fr").hide();
                        loadmurid();
                        $(".murid").html("");
                        Swal.fire({
                            icon: 'Berhasil',
                            title: 'Berhasil',
                            text: 'data berhasil di Update',
                        });
                    }
                });
            })
            $("#batal").click(function() {
                $("#fr").slideUp(200)
            });

            $("#close").click(function() {
                $("#list").slideUp(200);
                $("#draf").show();
            })
            $(document).on('click', '#delete', function() {
                let id = $(this).closest('tr').find('#idmurid').text();
                $.ajax({
                    type: "POST",
                    url: "/Home/delete",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        $(document).ajaxSend(function() {
                            $(".loading").html("<div class='alert alert-danger' role='alert'>silahkan tunggu....</div>");
                        });
                        $(".murid").html("")
                        loadmurid();
                        $(document).ajaxSuccess(function() {
                            $(".loading").html("<div class='alert alert-success' role='alert'>berhasil....</div>");
                        });
                    }
                });
            });
        })
    </script>
</body>

</html>