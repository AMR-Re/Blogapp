@extends('admin.layouts.layout')
@section('content')

  <!-- Main Content -->

    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
          <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Hero Section</h1>
        </div>

      <div class="section-body">
        <h2 class="section-title">Update Hero </h2>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Update Hero Section:</h4>
              </div>
              <div class="card-body">
                <form action="{{route('admin.hero.update',1)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Hero Title</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control" name="title" value="{{$hero->title}}">
                  </div>
                </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Subtitle</label>
                    <div class="col-sm-12 col-md-7">
                      <textarea  class="form-control summernote"  name="sub_title">{{$hero->sub_title}}</textarea>
                     </div>
                  </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Button Text</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" class="form-control" name="btn_text" value="{{$hero->btn_text}}">
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Button URL</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" class="form-control" name="btn_url" placeholder="eg.https://URL_HERE" value="{{$hero->btn_url}}">
                    </div>
                  </div>
                
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">BG Image</label>
                    <div class="col-sm-12 col-md-7">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="bg_image" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                          </div>
                          @if(!empty($hero->bg_image))
                                
                          <img class="w-25" src="{{asset($hero->bg_image)}}" >
                           
                          @endif
                    </div>
                  </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                <button type="submit" class="btn btn-primary">Update Hero</button>
                                </div>
                            </div>

                 
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection