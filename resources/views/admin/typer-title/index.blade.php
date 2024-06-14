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
                <h4>Update Typer Title Section:</h4>
                <div class="card-header-action">
                    <a href="{{route('admin.typer-title.create')}}" class="btn btn-success">Add Title <i class="fas fa-anchor"></i> </a>
                </div>
             
              </div>
              <div class="card-body"  style="overflow: auto;">
                {{ $dataTable->table() }}
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush