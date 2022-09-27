@extends('layouts.app')

@section('content')
<div class="container" id="container">
        {{-- @if(count($user) > 0)
            @foreach($tasks as $task)
        <div class="task-container p-3 border border-success text-center">
            <h3>{{$task-> taskTitle}}</h3>
            <a href="{{ route('tasks.show', $task)}}" class="btn btn-secondary mt-3">View</a>
        </div>
            @endforeach
        @else
        <p>You have no tasks. Make sure to create a new one to keep track of your goals!</p>
        @endif   --}}
    <br>
    {{-- <a href="{{ route('tasks.create')}}" class= "btn btn-primary">Create New Task</a> --}}
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
        getData();
        function getData(pageNumber){
            $.ajax({
                type:"GET",
                url: `/api?page=${pageNumber}`,
                dataType: "JSON",
                success: function(response){
                    $('#container').html("");
                    $('#container').append('<h1 class="text-center">All Users:</h2>');
                    if(response.data.length != 0){
                    $.each(response.data, function(key, item){
                        $('#container').append(
                            '<div class="task-container p-3 border border-success text-center"><h3>'+item.name+'</h3>\
                                <a href="/api/admin/'+item.id+'/edit" class="btn btn-secondary mt-3">View</a></div>'
                        )}
                    )}
                    if(response.links.length != 0){
                        // console.log(response.links)
                        $('#container').append(
                            '<a href="'+response.links.next+'" class="btn btn primary mt-3">Next</a>'
                        )};
                    }
                })
            }
        function nextPage(){
            
        }
        }
        );
</script>   