@extends('layouts.app')

@section('content')
       <div class="container">
            {{-- <div>
                <div class="bg-light text-dark p-5 border border-danger" style="text-align: center">
                    <h1 class="mb-4">Task Title: {{$task->taskTitle}}</h1>
                    <h4 class="fs-5 mb-2">Deadline: {{$task->date}}</h4>
                    <p class="fs-3">Description: {{$task->description}}</p>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('tasks.edit', $task)}}" class="btn btn-primary me-3">edit</a></button>
                        <form method="post" action="{{ route('tasks.destroy', $task)}}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">delete</button>
                        </form>
                    </div>
                </div> --}}
        </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
            const params = new URLSearchParams(location.search);
            const data ={ id: params.get()}
            console.log(data);
    // $(document).ready(function(){
    //     $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }
    //     });
    //     getData();
    //     function getData(){
    //         $.ajax({
    //             type:"GET",
    //             url: `/api?${user}`,
    //             dataType: "JSON",
    //             success: function(response){
    //                 $('#container').html("");
    //                 if(response.data.length != 0){
    //                 $.each(response.data, function(key, item){
    //                     $('#container').append(
    //                         '<div class="bg-light text-dark p-5 border border-danger" style="text-align: center">\
    //                             <h1 class="mb-4">'+item.+</h1>
    //                         <div class="task-container p-3 border border-success text-center"><h3>'+item.name+'</h3>\
    //                     )}
    //                 )
    //             }
    //             })}
    //     });
</script>   