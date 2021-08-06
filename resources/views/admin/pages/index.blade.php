 @extends('admin.layouts.app')

@section('konten')
<!-- Content -->
<main id="content" role="main" class="main">
 <div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <h1 class="page-header-title">Hello! Welcome {{ auth()->user()->name }}</h1>
            </div>

        </div>
    </div>
</div>
<!-- End Content -->

</main><!-- Footer -->
@endsection