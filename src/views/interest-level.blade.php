<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Level Of Interest Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <style>
        .cus-lebel-form-inner .table table {
            width: 100%;
            margin-top: 50px;
        }
        .cus-lebel-form-inner .table table tr th:not(:last-child), .cus-lebel-form-inner .table table tr td:not(:last-child) {
            /* border-right: 1px solid #000; */
        }
        .cus-lebel-form-inner .table table tr th, .cus-lebel-form-inner .table table tr td {
            padding: 15px;
            font-size: 20px;
            color: #fff;
            font-weight: 400;
            text-transform: capitalize;
        }
        .cus-lebel-form-inner .table table tr td {
            color: #000;
            /* font-weight: 500; */
        }
        .cus-lebel-form-inner .table table tr td button {
            padding: 8px 15px;
            font-size: 16px;
            font-weight: 500;
        }
        .cus-lebel-form-inner .table table tr td button.edit {
            background-color: #4b74ff;
            border-color: #4b74ff;
        }
        .cus-lebel-form-inner .table table tr td button.edit:hover {
            background-color: #2d5bf5;
            border-color: #2d5bf5;
        }
        .cus-lebel-form-inner .table table tr td button i {
            font-size: 15px;
            margin-right: 8px;
        }
        .cus-lebel-form-inner .table table tbody {
            border: none;
            border-left: 1px solid #bcbbbb;
            background-color: #fff;
            border-bottom: 1px solid #bcbbbb;
            border-right: 1px solid #bcbbbb;
        }
        /* .cus-lebel-form-inner .table table tr td button.edit {
            background-color: #5bc0de;
            border-color: #46b8da;
        }
        .cus-lebel-form-inner .table table tr td button.edit:hover {
            background-color: #39b3d7;
            border-color: #269abc;
        }
        .cus-lebel-form-inner .table table tbody tr:not(:last-child) {
            border-bottom: 1px solid #000;
        } */
        .cus-lebel-form-inner #interest_form .cus-search-btn {
            width: 100%;
            -js-display: flex;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-flow: row wrap;
            flex-flow: row wrap;
            justify-content: center;
            align-items: center;
        }
        .cus-lebel-form-inner #interest_form .cus-search-btn .form-floating {
            width: 100%;
            max-width: 450px;
        }
        .cus-lebel-form-inner #interest_form .cus-search-btn .form-floating input[type="text"] {
            padding: 10px 20px;
            height: 52px;
            outline: none;
            box-shadow: none;
        }
        .cus-lebel-form-inner #interest_form .cus-search-btn .form-floating label {
            display: inline-block;
            width: auto;
            height: auto;
            padding: 0 15px;
            transition: all .5s ease-out;
            top: 50%;
            transform: translateY(-50%);
            left: 5px;
            background-color: #fff;
            line-height: 1;
        }
        .cus-lebel-form-inner #interest_form .cus-search-btn .form-floating > .form-control:not(:placeholder-shown)~label, .cus-lebel-form-inner #interest_form .cus-search-btn .form-floating > .form-control:focus~label {
            top: 0;
            opacity: 1;
        }
        .cus-lebel-form-inner #interest_form .cus-search-btn .cus-btn {
            height: 100%;
        }
        .cus-lebel-form-inner #interest_form .cus-search-btn .cus-btn button[type="button"] {
            background-color: #0073b7;
            border-color: #0073b7;
            border-radius: 10px;
            font-size: 17px;
            padding: 5px 30px;
            font-weight: 600;
            text-transform: uppercase;
            margin-left: 15px;
            height: 100%;
        }
        .cus-lebel-form-inner #interest_form .cus-search-btn .cus-btn button[type="button"]:hover {
            background-color: #095581;
            border-color: #095581;
        }
        .cus-lebel-inter-form {
            padding: 50px 0 70px;
        }
        .cus-lebel-inter-form #interest_form .card {
            padding: 55px 10px !important;
        }
        .cus-lebel-inter-form #interest_form .card h1 {
            margin-bottom: 30px !important;
        }
        .cus-lebel-inter-form {
            background-color: #ecf0f5;
        }
        .cus-lebel-form-inner {
            background-color: #fff;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.15);
            border-radius: 10px;
            max-width: 1000px;
            margin: auto;
            padding: 50px 30px 70px;
        }
        .cus-lebel-form-inner h1 {
            font-size: 34px;
            text-transform: capitalize;
        }
        .cus-lebel-form-inner .table table thead {
            border: none;
        }
        .cus-lebel-form-inner .table table thead tr th {
            background-color: #0073b7;
        }
        .cus-lebel-form-inner .table table tr th:first-child, .cus-lebel-form-inner .table table tr td:first-child {
            /* border-top-left-radius: 30px;
            border-bottom-left-radius: 30px; */
            padding-left: 25px;
        }
        .cus-lebel-form-inner .table table tr th:last-child, .cus-lebel-form-inner .table table tr td:last-child {
            /* border-top-right-radius: 30px;
            border-bottom-right-radius: 30px; */
            padding-right: 25px;
        }
        .cus-lebel-form-inner .table table tbody tr, .cus-lebel-form-inner .table table tbody tr td {
            transition: all .5s ease-out;
        }
        .cus-lebel-form-inner .table table tbody tr:hover {
            position: relative;
            background-color: #ecf0f5;
            box-shadow: 0 20px 60px rgba(0,0,0, 0.2);
            transform: scale(1.05);
        }
        .cus-lebel-form-inner .table table tbody tr:hover td {
            background-color: #ecf0f5 !important;
        }
        .cus-lebel-form-inner .table table tbody tr td:first-child:hover {
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
        }
        .cus-lebel-form-inner .table table tbody tr:nth-child(even) td {
            background-color: #f2f4f5;
        }
        .cus-lebel-form-inner .table table tr th:not(:last-child), .cus-lebel-form-inner .table table tr td:not(:last-child) {
            min-width: 205px;
        }
        .cus-lebel-form-inner .table table tr th:first-child, .cus-lebel-form-inner .table table tr td:first-child {
            min-width: 155px;
        }
        

        @media (max-width:767px) {
            .cus-lebel-form-inner .table table tr th, .table table tr td {
                min-width: 240px;
            }
            .cus-lebel-form-inner .table table tr th:first-child, .table table tr td:first-child {
                min-width: 100px;
            }
            .cus-lebel-form-inner .table {
                overflow: hidden;
            }
            .cus-lebel-form-inner .table .table-inner {
                overflow-y: auto;
            }
            .cus-lebel-form-inner #interest_form .cus-search-btn .form-floating {
                max-width: 100%;
                margin-bottom: 20px;
            }
            .cus-lebel-form-inner #interest_form .cus-search-btn .cus-btn {
                /* width: 100%; */
            }
            .cus-lebel-form-inner #interest_form .cus-search-btn .cus-btn button[type="button"] {
                margin-left: 0;
            }
            .cus-lebel-form-inner #interest_form .cus-search-btn .cus-btn {
                height: 50px;
            }
        }
        
    </style>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<body>

    <section class="register-form cus-lebel-inter-form">
        <div class="container">
            <div class="cus-lebel-form-inner">
                <form action="" id="interest_form">
                    <div class="p-3">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="text-center mb-3">Add Level of Interest</h1>
                            </div>
                            <div class="col-md-6 py-2 cus-search-btn">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="interest_level" name="interest_level" placeholder="Add Level">
                                    <small class="has_error"> This Field is Required </small>
                                    <label for="interest_level"> Add Level</label>
                                    <input type="hidden" id="id" name="id">
                                </div>
                                <div class="cus-btn">
                                    <button type="button" class="btn btn-primary" id="save">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="table">
                    <div class="table-inner">
                        <table>
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Interest Level</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @if(isset($interest_level))
                            @php
                                $sr=1;
                            @endphp
                            @foreach($interest_level as $key => $value)
                            <tr>
                                <td>{{$sr}}</td>
                                <td>{{ $value->option_value ?? ''}}</td>
                                <td>
                                    <button class="btn btn-sm btn-danger edit" id="{{$value->id ?? ''}}"><i class="fa-solid fa-pen"></i>Edit</button>
                                    <button class="btn btn-sm btn-danger delete" id="{{$value->id ?? ''}}"><i class="fa-sharp fa-solid fa-trash"></i>Delete</button>
                                </td>
    
                            </tr>
                            @php
                                $sr++
                            @endphp
    
                                
                            @endforeach
                            @endif
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>


<script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
<script>
    $(document).ready(function() {
        $('.has_error').hide();
        $('#save').on('click', function() {
            var formData = new FormData($('#interest_form')[0]);
            // console.log(formData)
            var interest_level = $('input[name="interest_level"]');
            if (interest_level.val() == '') {
                interest_level.css('border', '1px solid red')
                interest_level.siblings('.has_error').show()
                return false;
            } else {
                interest_level.css('border', '1px solid #ced4da')
                interest_level.siblings('.has_error').hide()
            }
            $.ajax({
                url: "{{ url('/store-interest-level') }}"
                , type: 'POST'
                , data: formData
                , contentType: false
                , processData: false
                , success: function(data) {
                    if(data.status == 'success'){
                        swal({
                        title: 'Success',
                        text: 'Interest Level Submitted',
                        type: 'success',
                        showCancelButton: true,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Ok',
                        cancelButtonText: 'Close'
                            }).then(() => {
                                location.reload();
                            });
                    }


                }
            })
        });
        $(document).on('click', '.edit', function() {
            var id = $(this).attr('id');
            // alert(id)
            $.ajax({
                url: "{{ url('/edit-interest-level') }}"
                , type: 'POST'
                , data: {'id' : id}
                , success: function(data) {
                    if(data.status == 'success'){
                        console.log(data.data.option_value)
                        $('#interest_level').val(data.data.option_value);
                        $('#id').val(data.data.id);

                    }
                }
            })
        })
        $(document).on('click', '.delete', function() {
            var id = $(this).attr('id');
            // alert(id)
            $.ajax({
                url: "{{ url('/delete-interest-level') }}"
                , type: 'POST'
                , data: {'id' : id}
                , success: function(data) {
                    if(data.status == 'success'){
                        swal({
                        title: 'Success',
                        text: 'Interest Level Deleted.',
                        type: 'success',
                        // showCancelButton: true,
                        // confirmButtonColor: '#DD6B55',
                        // confirmButtonText: 'Yes!',
                        // cancelButtonText: 'No.'
                            }).then(() => {
                                location.reload();
                            });

                    }
                }
            })
        })







    });

</script>
</html>

