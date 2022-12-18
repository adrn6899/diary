(function(){
    "use strict";

    function editNote(){
        $('.edit-note').on('click', function(e){
            e.preventDefault();

            $('input[name="note-title"]').attr('disabled', false);
            $('input[name="note-content"],textarea').attr('disabled', false);
        })
    }

    function viewItem(){
        $('.btn-view-item').on('click', function(e){
            var id = $(this).val();
            e.preventDefault();
            $.ajax({
                type: "GET",
                url:"/view_note",
                dataType:"json",
                data: id,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(result){
                    console.log(result);
                    $('#exampleModalLabel').text(result[0].title);
                    $('#notesModal').append('<input type="hidden" value="'+id+'" id="note-id" name="note-id">');
                    $('#note-title').val(result[0].title);
                    $('#note-content').val(result[0].content);
                    $('#notesModal').modal('show');
                    editNote();
                },
                error: function(error){
                    console.log(error);
                },
    
                
            });
        });
    }

    function deleteItem(){
        $('.btn-delete-item').on('click', function(e){
            var id = $($this).val();
        });
    }

    function fetchNotes(){

        $.ajax({
            type: "GET",
            url:"/fetch_notes",
            dataType:"json",
            success: function(result){
                console.log(result);
                $.each(result, function(index, value){
                    $('.item-row').append('<div class="column"><div class="card item-card"><img class="card-img-top" src="https://cdn.dribbble.com/users/308895/screenshots/2598725/no-results.gif" alt="Card image cap"><div class="card-body"><h5 class="card-title">' + 
                    value.title + ' </h5><p class="card-text">'+ value.content +'</p></div><div class="card-footer"><div class="row"><div class="col"><button class="btn btn-primary btn-sm btn-view-item" value="'+value.id+'">VIEW</button></div><div class="col"><button class="btn btn-danger btn-sm btn-delete-item"  value="'+value.id+'">DELETE</button></div></div></div></div></div>');
                });
            },
            error: function(error){
                console.log(error);
            },
            complete: function(data){
                viewItem();
                deleteItem();
            }
        });
    }

    $(function(){
        fetchNotes();
    });

})();