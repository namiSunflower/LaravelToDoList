@extends('layouts.app')

@section('content')
<div class="text-center" id="parent">
    <div class="container" id="container">
    </div>
</div>
<div id="button-wrapper"class="text-center">
    <button id="prev" data-page="1" class="btn btn-primary ml-5 mt-3 mb-3 button">Prev</button>
    <button id="next" data-page="1" class="btn btn-primary ml-5 mt-3 mb-3 button">Next</button>
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
        let max_pages = 1;
        getData();

        function getData(page){
            const usersDiv = document.createElement("div");
            usersDiv.setAttribute("id", "container");

            $('#prev').attr('disabled','disabled')
            $.ajax({
                type:"GET",
                url: `/api?page=${page}`,
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
                                '<div class="p-3 border border-success text-center">\
                                    <h3>'+user.name+'</h3>\
                                    <a href="/admin/api/'+user.id+'" class="btn btn-secondary mt-3">View</a>\
                                </div>'
                            )
                        })
                        if(response.meta.links.length >= 1){
                        max_pages = response.meta.links.length - 2;
                            if(response.meta.last_page <= 1){
                                $("#next").attr("disabled", true);
                            }
                        }
                    }
                    else{
                        $("#prev").attr("disabled", true);
                        $("#next").attr("disabled", true);
                        $('#container').append('<p>No content to show</p>')
                    }
                }
            })
        }

        $("#next, #prev").on('click', (function(e){
            e.preventDefault();
            let pageNumber = $("#next").data();
            ($(this).attr("id") == "next") ? incrementPage() : decrementPage();
            getData(pageNumber.page);

            if(pageNumber.page < max_pages && pageNumber.page <= 1){
                $("#prev").attr("disabled", true);
                $("#next").attr("disabled", false);
            }
            else if(pageNumber.page < max_pages && pageNumber.page > 1){
                $("#next").attr("disabled", false);
                $("#prev").attr("disabled", false);
            }
            else{
                $("#next").attr("disabled", true);
                $("#prev").attr("disabled", false);
            }
        }));

    incrementPage = () => {
        $(".button").each(function(){
            $(this).data()['page']++;
        });
    }

    decrementPage = () => {
        $(".button").each(function(){
            $(this).data()['page']--;
        });
    }})
</script>



