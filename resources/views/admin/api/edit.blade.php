@extends('layouts.app')
@section('content')
    <div class="container">
            <form method="put" action="{{ route('api.update', $user)}}" id="ajax-form">
                @csrf
                <label for ="weight" class="fs-3">Weight</label><br>
                <input type="text" class="form-control input-lg" data-ajax-input="weight" name = "weight" id="weight" value = {{old('weight', $user->weight)}}><br>
                <div class="invalid-feedback" data-ajax-feedback="weight"></div>
                <label for ="height" class="fs-3">Height</label><br>
                <input type="text" class="form-control input-lg" data-ajax-input="height" name ="height" id="height" value = {{old('height', $user->height)}}><br>
                <div class="invalid-feedback" data-ajax-feedback="height"></div>
                <div class="text-center">
                    <input type="submit" class="btn btn-success fs-4">
                </div>
            </form>
        </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
      
        $('#ajax-form').on('submit', function(e){
            e.preventDefault();
            const form = $(this).serialize();
            const url = $(this).attr('action');
            $.ajax({
                type: 'PUT',
                url: url,
                data: form,
                dataType: 'JSON',
                success: function(response){
                    window.location.href = '/api'
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
    });
</script>    

