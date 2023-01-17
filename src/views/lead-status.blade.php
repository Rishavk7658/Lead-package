<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lead Status Form</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<body>

    <section class="register-form">
        <div class="container">
            <form action="" id="lead_status_form">
                <div class="card p-3 shadow">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="text-center mb-3">Add Lead Status </h1>
                        </div>
                        <div class="col-md-6 py-2">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="lead_status" name="lead_status" placeholder="Add Status">
                                <small class="has_error"> This Field is Required </small>
                                <label for="lead_status"> Add Status</label>
                                <input type="hidden" id="id" name="id">
                            </div>
                        </div>

                        <div>
                            <button type="button" class="btn btn-primary" id="save">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="table">
            <table border="2px" >
                <tr>
                    <th>Sr.No</th>
                    <th>Interest Level</th>
                    <th>Action</th>
                </tr>
                @if(isset($lead_status))
                @php
                    $sr=1;
                @endphp
                @foreach($lead_status as $key => $value)
                <tr>
                    <td>{{$sr}}</td>
                    <td>{{ $value->option_value ?? ''}}</td>
                    <td>
                        <button class="btn btn-sm btn-danger edit" id="{{$value->id ?? ''}}">Edit</button>
                        <button class="btn btn-sm btn-danger delete" id="{{$value->id ?? ''}}">Delete</button>
                    </td>

                </tr>
                @php
                    $sr++
                @endphp

                    
                @endforeach
                @endif
                
            </table>
        </div>
    </section>
</body>


<script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
<script>
    $(document).ready(function() {
        $('.has_error').hide();
        $('#save').on('click', function() {
            var formData = new FormData($('#lead_status_form')[0]);
            var lead_status = $('input[name="lead_status"]');
            if (lead_status.val() == '') {
                lead_status.css('border', '1px solid red')
                lead_status.siblings('.has_error').show()
                return false;
            } else {
                lead_status.css('border', '1px solid #ced4da')
                lead_status.siblings('.has_error').hide()
            }
            $.ajax({
                url: "{{ url('/store-lead-status') }}"
                , type: 'POST'
                , data: formData
                , contentType: false
                , processData: false
                , success: function(data) {
                    if(data.status == 'success'){
                        swal({
                        title: 'Success',
                        // text: 'Some text.',
                        type: 'success',
                        showCancelButton: true,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Yes!',
                        cancelButtonText: 'No.'
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
                        $('#lead_status').val(data.data.option_value);
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
                        // text: 'Some text.',
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
        })




    });

</script>
</html>

