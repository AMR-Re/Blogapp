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
        <h2 class="section-title">Edit Typer Title </h2>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Edit Title:</h4>
              </div>
              <div class="card-body">
                <form action="{{route('admin.typer-title.update',$title->id)}}" method="POST" >
                    @csrf
                    @method('PUT')
                   <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Hero Title</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control" name="title" value="{{old('title',$title->title)}}" >
                  </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                    <button type="submit" class="btn btn-primary">Update Typer</button>
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