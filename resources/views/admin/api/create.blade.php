@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $title }}</div>
                <div class="card-body">
                    <form action="{{ route($registerRoute) }}" id="ajax-form">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" data-ajax-input="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                            <div class="invalid-feedback" data-ajax-feedback="name"></div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" data-ajax-input="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <div class="invalid-feedback" data-ajax-feedback="email"></div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Password:</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" data-ajax-input="password" name="password" required autocomplete="new-password">
                                <div class="invalid-feedback" data-ajax-feedback="password"></div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password:</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
                type: 'POST',
                url: url,
                data: form,
                dataType: 'JSON',
                success: function(response){
                    window.location.href = '/admin/api'
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
