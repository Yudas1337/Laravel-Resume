@extends('admin.layouts.app')

@section('konten')
<!-- Content -->
<main id="content" role="main" class="main">
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title">User Profile</h1>
            </div>

        </div>
    </div>
    <!-- End Page Header -->


    <!-- Content Step Form -->
    <form method="POST" enctype="multipart/form-data" action="{{ url('admin/profiles/'.$profiles->id) }}">
        @method('PUT')
        @csrf
        <div id="addUserStepFormContent">
            <!-- Card -->
            <div id="addUserStepProfile" class="card card-lg active">
                <!-- Body -->
                <div class="card-body">

                    @if (session('status'))
                    <div class="col-sm-6 col-lg-6 mb-3 mb-lg-5">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
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
                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Name</label>

                        <div class="col-sm-9">
                            <div class="input-group input-group-sm-down-break">
                                <input type="text" class="form-control" name="name" value="{{ $profiles->name }}" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <!-- End Form Group -->
                    <!-- Form Group -->
                    <div class="row form-group">
                        <label class="col-sm-3 col-form-label input-label">Photo<i class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top" title="Photo will display in sidebar section"></i></label>
                        <div class="col-sm-9">
                            <div class="d-flex align-items-center">
                                <!-- Avatar -->
                                <label class="avatar avatar-xl avatar-circle avatar-uploader mr-5" for="avatarUploader">
                                    <img id="avatarImg" class="avatar-img" src="https://drive.google.com/uc?export=view&id={{ $profiles->photo }}" alt="{{ auth()->user()->name }}">
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- End Form Group -->
                     <!-- Form Group -->
                     <div class="row form-group">
                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Photo File</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-sm-down-break">
                                <input type="file" class="form-control" name="photo">
                            </div>
                        </div>
                    </div>
                    <!-- End Form Group -->
                     <!-- Form Group -->
                     <div class="row form-group">
                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">LinkedIn</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-sm-down-break">
                                <input type="text" class="form-control" name="linkedin" value="{{ $profiles->linkedin }}" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <!-- End Form Group -->
                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Gmail</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-sm-down-break">
                                <input type="text" class="form-control" name="gmail" value="{{ $profiles->gmail }}" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <!-- End Form Group -->
                     <!-- Form Group -->
                     <div class="row form-group">
                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Telegram</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-sm-down-break">
                                <input type="text" class="form-control" name="telegram" value="{{ $profiles->telegram }}" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <!-- End Form Group -->
                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Github</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-sm-down-break">
                                <input type="text" class="form-control" name="github" value="{{ $profiles->github }}" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <!-- End Form Group -->
                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Whatsapp</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-sm-down-break">
                                <input type="text" class="form-control" name="whatsapp" value="{{ $profiles->whatsapp }}" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <!-- End Form Group -->
                     <!-- Form Group -->
                     <div class="row form-group">
                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Instagram</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-sm-down-break">
                                <input type="text" class="form-control" name="instagram" value="{{ $profiles->instagram }}" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <!-- End Form Group -->
                   
                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="firstNameLabel" class="col-sm-3 col-form-label input-label">Facebook</label>
                        <div class="col-sm-9">
                            <div class="input-group input-group-sm-down-break">
                                <input type="text" class="form-control" name="facebook" value="{{ $profiles->facebook }}" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <!-- End Form Group -->
                   
                </div>
                <!-- End Body -->

                <!-- Footer -->
                <div class="card-footer d-flex justify-content-end align-items-center">
                    <button type="submit" name="submit" class="btn btn-success">
                        <i class="tio-edit"></i> Update
                    </button>

                </div>
                <!-- End Footer -->
            </div>
            <!-- End Card -->
    </form>

</div>
<!-- End Content Step Form -->


</div>
<!-- End Content -->

</main><!-- Footer -->
@endsection