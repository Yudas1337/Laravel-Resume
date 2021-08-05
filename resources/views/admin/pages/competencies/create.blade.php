@extends('admin.layouts.app')

@section('konten')
<main id="content" role="main" class="main">
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title">New Competencies</h1>
            </div>

        </div>
    </div>
    <form method="POST" action="{{ url('admin/competencies') }}" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-12">
            <!-- Card -->

            <!-- Card -->
            <div class="card mb-3 mb-lg-5">
                <div class="card-header">
                    <h2 class="card-title h4">Competencies Data</h2>
                </div>

                <!-- Body -->

                <div class="card-body">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Failed!</strong> Form Validation Error<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="icon" class="col-sm-3 col-form-label input-label">Icon</label>

                        <div class="col-sm-9">
                            <input type="text" placeholder="fas fa-php" autocomplete="off" class="form-control" name="icon" value="{{ old('icon') }}">
                        </div>
                    </div>
                    <!-- End Form Group -->
                     <!-- Form Group -->
                     <div class="row form-group">
                        <label for="title" class="col-sm-3 col-form-label input-label">Title</label>

                        <div class="col-sm-9">
                            <input type="text" placeholder="PHP" autocomplete="off" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <!-- End Form Group -->
                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="description" class="col-sm-3 col-form-label input-label">Description</label>

                        <div class="col-sm-9">
                            <textarea class="form-control" name="description" rows="8">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>
                <!-- End Body -->
                <!-- Footer -->

                <div class="card-footer d-flex justify-content-end align-items-center">
                    <button type="submit" class="btn btn-primary tambahPemohon">
                        <i class="tio-add-circle"></i> Add Competencies
                    </button>

                </div>
                <!-- End Footer -->
            </div>
            <!-- End Card -->



            <!-- Sticky Block End Point -->
            <div id="stickyBlockEndPoint"></div>
        </div>
    </form>
</div>
</div>

</main>
@endsection