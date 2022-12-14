@extends('layouts.layouts')
@section('css')
    <link href="{{asset('css/card.css')}}" rel="stylesheet">
@endsection

@section('content')
    @section('header')
    @endsection
    <div class="item-row">

    </div>
    
    <div class="modal fade" id="notesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"></h5>
            </div>
            <div class="modal-body">
                Sample:<input type="text" id="input-sample">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
@endsection
@section('javascript')
<script src="{{asset('js/notes.js')}}"></script>
@endsection