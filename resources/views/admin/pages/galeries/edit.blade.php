@extends('admin.layouts.app')

@section('konten')
<main id="content" role="main" class="main">
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title">New Galeries</h1>
            </div>

        </div>
    </div>
    <form method="POST" action="{{ url('admin/galeries/' . $galeries->id) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="col-lg-12">
            <!-- Card -->
            <div class="card mb-3 mb-lg-5">
                <div class="card-header">
                    <h2 class="card-title h4">Galeries Data</h2>
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
                    <label class="col-sm-3 col-form-label input-label">Photo<i class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top" title="Photo will display in Portfolios section"></i></label>
                    <div class="col-sm-9">
                        <div class="d-flex align-items-center">
                            <!-- Avatar -->
                            <label class="avatar avatar-xl avatar-circle avatar-uploader mr-5" for="avatarUploader">
                                <img id="avatarImg" class="avatar-img" src="https://drive.google.com/uc?export=view&id={{ $galeries->photo }}" alt="{{ auth()->user()->name }}">
                            </label>
                        </div>
                    </div>
                </div>
                <!-- End Form Group -->
                     <!-- Form Group -->
                     <div class="row form-group">
                        <label for="photo" class="col-sm-3 col-form-label input-label">Photo File</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-sm-down-break">
                                <input type="file" class="form-control" name="photo">
                            </div>
                        </div>
                    </div>
                    <!-- End Form Group -->
                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="description" class="col-sm-3 col-form-label input-label">Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="description" rows="8">{{ $galeries->description }}</textarea>
                        </div>
                    </div>
                    <!-- End Form Group -->
                </div>
                <!-- End Body -->
                <!-- Footer -->

                <div class="card-footer d-flex justify-content-end align-items-center">
                    <button type="submit" class="btn btn-success tambahPemohon">
                        <i class="tio-edit"></i> Update Galeries
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