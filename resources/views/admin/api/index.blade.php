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

        // instead of having the `current_page` variable for the page parameter, you can accept a `page` parameter of the function
        // function getData(page) {}
        // by doing this, the function's responsibility is to get the data with specified page number.
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

                            // Add a data attribute to the next page prev page button to keep their designated page num.
                            // https://developer.mozilla.org/en-US/docs/Learn/HTML/Howto/Use_data_attributes
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

            // instead of reassigning from the current_page variable, you can use from the data attribute of the button.
            current_page = ($(this).attr("id") == "next") ? current_page + 1: current_page -1;
                getData();

            // Better to use greater than/lesser than conditions instead of == condiction checking
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
