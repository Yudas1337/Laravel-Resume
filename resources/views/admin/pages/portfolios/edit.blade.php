@extends('admin.layouts.app')

@section('konten')
<main id="content" role="main" class="main">
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title">Update Portfolios</h1>
            </div>

        </div>
    </div>
    <form method="POST" action="{{ url('admin/portfolios/'.$portfolios->id) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="col-lg-12">
            <!-- Card -->
            <div class="card mb-3 mb-lg-5">
                <div class="card-header">
                    <h2 class="card-title h4">Portfolios Data</h2>
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
                        <label for="icon" class="col-sm-3 col-form-label input-label">Title</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Make Ecommerce WebApps" autocomplete="off" class="form-control" name="title" value="{{ $portfolios->title }}">
                        </div>
                    </div>
                    <!-- End Form Group -->
                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="description" class="col-sm-3 col-form-label input-label">Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="description" rows="8">{{ $portfolios->description }}</textarea>
                        </div>
                    </div>
                    <!-- Form Group -->
                    <div class="row form-group">
                        <label class="col-sm-3 col-form-label input-label">Photo<i class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top" title="Photo will display in Portfolios section"></i></label>
                        <div class="col-sm-9">
                            <div class="d-flex align-items-center">
                                <!-- Avatar -->
                                <label class="avatar avatar-xl avatar-circle avatar-uploader mr-5" for="avatarUploader">
                                    <img id="avatarImg" class="avatar-img" src="https://drive.google.com/uc?export=view&id={{ $portfolios->photo }}" alt="{{ auth()->user()->name }}">
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
                        <label for="category" class="col-sm-3 col-form-label input-label">Category</label>

                        <div class="col-sm-9">
                            <input type="text" placeholder=".web" autocomplete="off" class="form-control" name="category" value="{{ $portfolios->category }}">
                        </div>
                    </div>
                    <!-- End Form Group -->
                    <div class="row form-group">
                        <label class="col-sm-3 col-form-label input-label">Projects Type</label>

                        <div class="col-sm-9">
                            <div class="input-group input-group-sm-down-break">
                                <!-- Custom Radio -->
                                <div class="form-control">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" {{ ($portfolios->isPrivate == 1 ? 'checked' : '') }} value="1" class="custom-control-input" name="isPrivate" id="userAccountTypeRadio1">
                                        <label class="custom-control-label" for="userAccountTypeRadio1">Private</label>
                                    </div>
                                </div>
                                <!-- End Custom Radio -->

                                <!-- Custom Radio -->
                                <div class="form-control">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" {{ ($portfolios->isPrivate == 0 ? 'checked' : '') }} value="0" class="custom-control-input" name="isPrivate" id="userAccountTypeRadio2">
                                        <label class="custom-control-label" for="userAccountTypeRadio2">Public</label>
                                    </div>
                                </div>
                                <!-- End Custom Radio -->
                            </div>
                        </div>
                    </div>
                     <!-- Form Group -->
                     <div class="row form-group">
                        <label for="technology" class="col-sm-3 col-form-label input-label">Technology</label>

                        <div class="col-sm-9">
                            <input type="text" placeholder="Laravel Mysql Database" autocomplete="off" class="form-control" name="technology" value="{{ $portfolios->technology }}">
                        </div>
                    </div>
                    <!-- End Form Group -->
                    <!-- Form Group -->
                    <div class="row form-group">
                        <label for="download" class="col-sm-3 col-form-label input-label">Download <i class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top" title="Default Nullable Data"></i></label>

                        <div class="col-sm-9">
                            <input type="text" placeholder="Laravel Mysql Database" autocomplete="off" class="form-control" name="download" value="{{ $portfolios->download }}">
                        </div>
                    </div>
                    <!-- End Form Group -->
                </div>
                <!-- End Body -->
                <!-- Footer -->

                <div class="card-footer d-flex justify-content-end align-items-center">
                    <button type="submit" class="btn btn-success">
                        <i class="tio-edit"></i> Update Portfolios
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