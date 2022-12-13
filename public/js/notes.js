(function(){
    "use strict";

    function fetchNotes(){

        $.ajax({
            type: "GET",
            url:"/fetch_notes",
            dataType:"json",
            success: function(result){
                console.log(result);
                $.each(result, function(index, value){
                    $('.item-row').append('<div class="column"><div class="card item-card"><img class="card-img-top" src="..." alt="Card image cap"><div class="card-body"><h5 class="card-title">' + 
                    value.title + ' </h5><p class="card-text">'+ value.content +'</p></div><div class="card-footer"><div class="row"><div class="col"><button class="btn btn-primary btn-sm btn-view-item">VIEW</button></div><div class="col"><button class="btn btn-danger btn-sm btn-delete-item">DELETE</button></div></div></div></div></div>');
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