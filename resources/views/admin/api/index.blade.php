@extends('layouts.app')

@section('content')
<div class="text-center" id="parent">
    <div class="container" id="container">
    </div>  
</div>
<div id="button-wrapper" class="text-center">
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
        // $("#button-wrapper").remove();
        getData();
        function getData(){
            const usersDiv = document.createElement("div");
            // const buttonDiv = document.createElement("div");
            usersDiv.setAttribute("id", "container");
            // buttonDiv.setAttribute("id", "button-wrapper");
            const parent = document.getElementById('parent');
            const firstPosition = parent.firstElementChild;

            // parent.insertBefore(usersDiv, parent.firstChild);
            // document.getElementById('parent').appendChild(usersDiv);
            $('#prev').attr('disabled','disabled')
            $.ajax({
                type:"GET",
                url: `/api?page=${current_page}`,
                dataType: "JSON",
                success: function(response){
                    $("#container").remove();
                    const usersDiv = document.createElement("div");
                    usersDiv.setAttribute("id", "container");
                    document.getElementById('parent').appendChild(usersDiv);
                    $('#container').append('<h1 class="text-center">All Users:</h2>');
                    if(response.data.length != 0){
                        $.each(response.data, function(key, user){
                            $('#container').append(
                                '<div class="p-3 border border-success text-center"><h3>'+user.name+'</h3>\
                                    <a href="/admin/api/'+user.id+'" class="btn btn-secondary mt-3">View</a></div>'
                            )}
                        )
                        if(response.meta.links.length >= 1){
                            current_page = response.meta.current_page;
                            max_pages = response.meta.links.length - 2;
                        }
                    }
                    else{
                        $("#prev").attr("disabled", true);
                        $("#next").attr("disabled", true);
                        $('#container').append(
                            '<p>No content to show</p>'
                        )
                    }
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