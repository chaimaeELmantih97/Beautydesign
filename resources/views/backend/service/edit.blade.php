@extends('backend.layouts.master')
@section('title','Beauty Design - Modifier le Service')
@section('main-content')
<div class="card">
    <h5 class="card-header">Modifier le Service</h5>
    <div class="card-body">
      <form method="post" action="{{route('service.update',$service->id)}}">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Titre <span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="title" placeholder="Entrer le titre"  value="{{$service->title}}" class="form-control">
        @error('title')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
        <div class="form-group">
          <label for="inputTag" class="col-form-label">Tag <span class="text-danger">*</span></label>
          <input id="inputTag" type="text" name="tag" placeholder="Entrer le tag"  value="{{$service->tag}}" class="form-control">
          @error('tag')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="inputDescription" class="col-form-label">Description <span class="text-danger">*</span></label>
          <textarea id="inputDescription" name="description" placeholder="Entrer la description" class="form-control">{{$service->description}}</textarea>
          @error('description')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
            <label for="inputPhoto" class="col-form-label">Photo <span class="text-danger">*</span></label>
            <div class="input-group">
                <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                    <i class="fa fa-picture-o"></i> Choisir
                    </a>
                </span>
              <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$service->photo}}">
            </div>
            <div id="holder" style="margin-top:15px;max-height:100px;"></div>
            @error('photo')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Mis à jour</button>
        </div>
      </form>
    </div>
</div>
@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#description').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });
</script>
@endpush
