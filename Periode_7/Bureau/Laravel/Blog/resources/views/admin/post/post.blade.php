@extends('admin.layouts.app')

@section('headSection')

  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">

@endsection

@section('main-content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Text Editors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Text Editors</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Titles</h3>
              </div>
                @include('includes.messages')
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">

                @csrf

                <div class="card-body">
                    <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="title">Post Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="title">
                    </div>
                    <div class="form-group">
                        <label for="subtitle">Post Sub Title</label>
                        <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Sub Title">
                    </div>
                     <div class="form-group">
                        <label for="slug">Post Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="float-right">
                        <label for="image">File input</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" name="image" class="custom-file-input" id="image">
                              <label class="custom-file-label" for="image">Choose file</label>
                          </div>
                      <div class="input-group-append">
                          <span class="input-group-text" id="">Upload</span>
                    </div>
                  </div>
                </div>
                <div class="form-check float-left" style="margin-top:33px">
                    <label class="form-check-label"></label>
                    <input type="checkbox" class="form-check-input" name="status" value="1">Publish                    
                  </div>
              </div>

                  <br>
                  <div class="form-group" style="margin-top:46px;">
                  <label>Select Tags</label>
                  <select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select a Tag" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tags[]">
                  @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                  @endforeach
                  </select>
                  </div>
                  <div class="form-group" style="margin-top:17px;">
                  <label>Select Categories</label>
                  <select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select a Category" style="width: 100%;" tabindex="-1" aria-hidden="true" name="categories[]">
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                  </select>  
                  </div>                            
                  </div>
                  </div>
                </div>
                  </div>
                  </div>
                </div>
                            <!-- /.card -->
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Write post here!
                <small>Simple and fast</small>
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">
                <textarea id="editor" class="textarea" placeholder="Place some text here" name="body"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
              <p class="text-sm mb-0">
                Editor <a href="https://github.com/bootstrap-wysiwyg/bootstrap3-wysiwyg">Documentation and license
                information.</a>
              </p>
            </div>
          </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ route('post.index') }}" class="btn btn-warning">Back</a>
                </div>
              </form>
            </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('footerSection')

<!-- CKeditor -->
<script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>

<script>
  $(function() {
    CKEDITOR.replace('editor');

  });
</script>

<!-- Select2 -->
<script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>

<script>
  $(document).ready(function(){
    //Initialize Select2 Elements
    $('.select2').select2();

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
  });

</script>

<!--bootstrap file input inner text-->

<script>
document.querySelector('.custom-file-input').addEventListener('change',function(e){
  var fileName = document.getElementById("image").files[0].name;
  var nextSibling = e.target.nextElementSibling
  nextSibling.innerText = fileName
})
</script>

@endsection