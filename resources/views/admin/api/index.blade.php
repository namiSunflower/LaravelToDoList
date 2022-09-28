@extends('layouts.app')

@section('content')
<div class="text-center">
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
    {{-- <div> --}}
    {{-- </div> --}}
</div>  
    <button id="prev" class="btn btn-primary ml-5 mt-3 mb-3">Prev</button>
    <button id="next" class="btn btn-primary ml-5 mt-3 mb-3">Next</button>
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
        let current_page = 1;
        let max_pages = 1;
        getData();
        function getData(){
            // $("#container").remove(); 
            // const div = document.createElement("div");
            // div.setAttribute("id", "container");
            $('#prev').attr('disabled','disabled')
            $.ajax({
                type:"GET",
                url: `/api?page=${current_page}`,
                dataType: "JSON",
                success: function(response){
                    $('#container').html("");
                    $('#container').append('<h1 class="text-center">All Users:</h2>');
                    if(response.data.length != 0){
                    $.each(response.data, function(key, user){
                        $('#container').append(
                            '<div class="task-container p-3 border border-success text-center"><h3>'+user.name+'</h3>\
                                <a href="/admin/api/'+user.id+'" class="btn btn-secondary mt-3">View</a></div>'
                        )}
                    )
                    if(response.meta.links.length >= 1){
                        current_page = response.meta.current_page;
                        max_pages = response.meta.links.length - 2;
                    }
                    };
                }
                })}

        $("#next, #prev").on('click', (function(e){
            e.preventDefault();
        
            current_page = ($(this).attr("id") == "next") ? current_page + 1: current_page -1;
                getData();   
            
            if(current_page !== max_pages && current_page == 1){
                $("#prev").attr("disabled", true);
                $("#next").attr("disabled", false);
                console.log(current_page)
            }
            else if(current_page !== max_pages && current_page != 1){
                $("#next").attr("disabled", false);
                $("#prev").attr("disabled", false);
                console.log(current_page)
            }
            else{
                $("#next").attr("disabled", true);
                $("#prev").attr("disabled", false);
                console.log(current_page)
            }
        }));
        });
</script>   