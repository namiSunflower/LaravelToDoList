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
                            '<div class="bg-light text-dark p-5 border border-danger" style="text-align: center">\
                                <h1 class="mb-4">'+response.data.name+'</h1>\
                                <h4 class="mb-4">Weight:'+response.data.weight+'</h4>\
                                <h4 class="mb-4">Height:'+response.data.height+'</h4>\
                                <div class="d-flex justify-content-center">\
                                    <a href="/admin/api/'+id+'/edit" class="btn btn-primary me-3">Edit</a></button>\
                                    <button id="delete" class="btn btn-danger" fs-4>\
                                        Delete</button></div>'
                        )
                    }      
                    $('#delete').on('click', function(e){
                        e.preventDefault();
                        $.ajax({
                            type: 'DELETE',
                            url: `/api/admin/${id}`,
                            data: {
                                '_token': $('meta[name=csrf-token]').attr("content"),
                            },
                            success: function(response){
                                window.location.href = '/admin/api'
                            }
                        })
                    })
                }
            })}
            })
        
</script>   