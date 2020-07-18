@extends('layouts.admin')

@push('after-style')
    <link rel="stylesheet" href="{{ asset('backend/assets/css/summernote-bs4.min.css') }}"> 
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')
                <!-- Animated -->
            <div class="animated fadeIn">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-header">
                                <strong>New Benefit</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ route('benefit.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="title" class="form-control-label">Title</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
                                            @error('titles')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="summary" class=" form-control-label">Summary</label>
                                        </div>
                                        <div class="col-12 col-md-9"><textarea name="summary" 
                                                rows="3" placeholder="" value="{{ old('summary') }}" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="content" class=" form-control-label">Content</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="content" id="summernote" placeholder="" value="{{ old('content') }}" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="link" class="form-control-label">link</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="link" value="{{ old('link') }}" class="form-control @error('link') is-invalid @enderror">
                                            @error('link')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="icon" class="form-control-label">Icon</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="icon" value="{{ old('icon') }}" class="form-control @error('icon') is-invalid @enderror">
                                            @error('icon')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="image"
                                            class=" form-control-label">Add image</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-multiple-input" name="image" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                            </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .animated -->
       
@push('after-script')
   
    <script src="{{ asset('backend/assets/js/summernote-bs4.min.js') }}"></script>
      <script>
    $(document).ready(function(){

    // Define function to open filemanager window
    var lfm = function(options, cb) {
      var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
      window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
      window.SetUrl = cb;
    };

    // Define LFM summernote button
    var LFMButton = function(context) {
      var ui = $.summernote.ui;
      var button = ui.button({
        contents: '<i class="far fa-image"></i> ',
        tooltip: 'Insert image with filemanager',
        click: function() {

          lfm({type: 'image', prefix: '/laravel-filemanager'}, function(lfmItems, path) {
            lfmItems.forEach(function (lfmItem) {
              context.invoke('insertImage', lfmItem.url);
            });
          });

        }
      });
      return button.render();
    };

    // Initialize summernote with LFM button in the popover button group
    // Please note that you can add this button to any other button group you'd like
    $('#summernote').summernote({
              height: 400,

       styleTags: [
    'p',
        { title: 'Blockquote', tag: 'blockquote', className: 'blockquote', value: 'blockquote' },
        'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
	],
      toolbar: [
        ['popovers', ['lfm']],
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['fontsize', ['fontsize']],
        ['fontname', ['fontname']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']],
      ],
      buttons: {
      lfm: LFMButton
      }
    })
  });
</script>

@endpush
@endsection

