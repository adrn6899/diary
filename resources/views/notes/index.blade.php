@extends('layouts.layouts')
@section('css')
    <link href="{{asset('css/card.css')}}" rel="stylesheet">
@endsection

@section('content')
    @section('header')
      @include('layouts.nav')
    @endsection
    <div class="item-row">

    </div>
    
    <form action="#" class="notes-form">
      <div class="modal fade" id="notesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"></h5>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                  <div class="col-md-2">
                    <label for="note-title">Title:</label>
                  </div>
                  <div class="col">
                    <input type="hidden" id="note-id">
                    <input class="form-control" type="text" id="note-title" name="note-title" disabled>
                  </div>
                </div>
                <div class="row mb-3">  
                  <div class="col-md-2">
                    <label for="note-content" id="content">Content:</label>
                  </div>
                  <div class="col">
                    <textarea class="form-control" id="note-content" name="note-content" rows="3" cols="45" disabled></textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                  </div>
                  <div class="col">
                    <button class="btn btn-danger delete-note">Delete</button>
                    <button class="btn btn-success mr-1 edit-note">Edit</button>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary save-note">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    </form>
@endsection
@section('javascript')
<script src="{{asset('js/notes.js')}}"></script>
@endsection