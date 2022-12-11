(function(){
    "use strict";

    function fetchNotes(){

        $.ajax({
            type: "GET",
            url:"/fetch_notes",
            dataType:"json",
            success: function(result){
                // console.log(result);
                $.each(result, function(index, value){
                    $('.inner-div').append('<div class="card">' + 
                    value.title + ' <div class="card-footer"><button class="btn btn-primary">VIEW</button></div></div>');
                });
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    $(function(){
        fetchNotes();
    });

})();