@extends('layouts.app')
@section('content')
    <div id="container"></div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    let id= {{ $user->id }}
    $(document).ready(function(){
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        getData();

        function getData(){
            $.ajax({
                type:"GET",
                url: `/api/${id}`,
                dataType: "JSON",
                success: function(response){
                    $('#container').html("");
                    if(response.data.length != 0){
                        $('#container').append(
                            '<form id="ajax-form">\
                                <label for="weight" class="fs-3">Weight</label>\
                                <input type="text" class="form-control input-lg" data-ajax-input="weight" name = "weight" id="weight" value ='+response.data.weight+'>\
                                <div class="invalid-feedback" data-ajax-feedback="weight"></div>\
                                <label for="weight" class="fs-3">Height</label>\
                                <input type="text" class="form-control input-lg" data-ajax-input="height" name = "height" id="height" value ='+response.data.height+'>\
                                <div class="invalid-feedback" data-ajax-feedback="height"></div><br>\
                                <div id="success" class="text-success"></div>\
                                <div class="text-center"><input type="submit" class="btn btn-success fs-4"></div>\
                            </form>'
                                )
                            }
                            $('#ajax-form').on('submit', function(e){
                                e.preventDefault();
                                const form = $(this).serialize();
                                const url = $(this).attr('action');
                                $.ajax({
                                    type: 'PUT',
                                    url: `/api/admin/${id}`,
                                    data: form,
                                    dataType: 'JSON',
                                    success: function(response){
                                        //change to 
                                        $('#success').fadeIn().html("Successfully updated user info!");
                                    },
                                    error: function(response){
                                        //remove red border and error message if input is valid
                                        $('[data-ajax-input]').removeClass('is-invalid');
                                        $('[data-ajax-feedback]').html('').removeClass('d-block');

                                        if(response.responseJSON.hasOwnProperty('errors')){
                                            $.each(response.responseJSON.errors, function(key, value){
                                                $('[data-ajax-input="' + key + '"]').addClass('is-invalid');
                                                $('[data-ajax-feedback="' + key + '"]').html(value[0]).addClass('d-block');
                                            })
                                        }
                                    }
                                })
                            });
                        }
                    })}
                    });
</script>    

