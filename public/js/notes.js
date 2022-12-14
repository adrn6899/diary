(function(){
    "use strict";

    // var id;
    function editNote(){
        $('.edit-note').on('click', function(e){
            e.preventDefault();

            $('input[name="note-title"]').attr('disabled', false);
            $('input[name="note-content"],textarea').attr('disabled', false);
        })
    }

    function viewItem(){
        $('.btn-view-item').on('click', function(e){
            e.preventDefault();
            var id = $(this).val();
            console.log(id);
            var data = new FormData();
            data.append("id",id);
            $.ajax({
                type: "POST",
                url:"/view_note",
                dataType:"json",
                data: data,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(result){
                    console.log(result);
                    $('#exampleModalLabel').text(result[0].title);
                    // $('#notesModal').append('<input type="hidden" value="'+result[0].id+'" id="note-id" name="note-id">');
                    $('#note-id').val(result[0].id);
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
        // var id,title,content;
        $.ajax({
            type: "GET",
            url:"/fetch_notes",
            dataType:"json",
            success: function(result){
                console.log(result);
                $.each(result, function(index, value){
                    $('.item-row').append('<div class="column"><div class="card item-card"><input type="hidden" id="note-id" value="'+value.id+'"><img class="card-img-top" src="https://cdn.dribbble.com/users/308895/screenshots/2598725/no-results.gif" alt="Card image cap"><div class="card-body"><h5 class="card-title">' + 
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

    function submit(){
        $('.save-note').on('click', function(e){
            e.preventDefault();
            // console.log(id);
            var data = new FormData();
            data.append('id',$('#note-id').val());
            data.append('title',$('#note-title').val());
            data.append('content',$('#note-content').val());
            console.log("try");
            $.ajax({
                type: "POST",
                url:"/edit",
                dataType:"json",
                data:data,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(result){
                    window.location.reload();
                },
                error: function(e){

                }    
            });
        });
    }

    function create(){
        $('#add-notes-form').on('submit', function(e){
            e.preventDefault();
            // alert("trying to add new note");
            var data = new FormData(this);
            // data.append('title',$('#add-note-title').val());
            // data.append('content',$('#add-note-content').val());
            // data.append('image',$('#image').val());
            
            $.ajax({
                type: "POST",
                url: "/create",
                dataType: "json",
                data: data,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(result){

                },
                error: function(error){
                    console.log(error);
                }
            });
        });
    }

    $(function(){
        fetchNotes();
        submit();
        create();
    });

})();