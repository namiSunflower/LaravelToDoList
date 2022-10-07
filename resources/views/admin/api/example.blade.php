@extends('layouts.app')

@section('content')
<div class="text-center" id="div-container"></div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        const container = $('#div-container');
        $.ajax({
            type:"GET",
            url: '/test/json',
            dataType: "JSON",
            success: function(response){
                $.each(response.data, function(key, pet){
                    $(container).append(
                        '<div class="p-3 mb-4 border border-fail text-center">\
                            <h3>Name: '+pet.name+'</h3>\
                            <h3>Type: '+pet.type+'</h3>\
                            <h3>Age: '+pet.age+'</h3>\
                        </div>'
                    )
                })
            }
        })
    })
</script>