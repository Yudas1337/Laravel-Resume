 @extends('admin.layouts.app')

@section('konten')
<!-- Content -->
<main id="content" role="main" class="main">
<div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title">Certificates Page</h1>
                </div>
                <div class="col-sm-auto">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#ModalRole">
                        <i class="tio-add-circle"></i>
                        Add Certificate
                    </button>
                </div>

                <!-- Modal Tambah -->
                <div class="modal fade" id="ModalRole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Certificate</h5>
                                <button type="button" class="btn btn-xs btn-icon btn-ghost-secondary" data-dismiss="modal" aria-label="Close">
                                    <i class="tio-clear tio-lg"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action={{ url('admin/certificates') }} method="POST" enctype="multipart/form-data">
                                @method('POST')
                                @csrf
                                    <div class="form-group">
                                        <label for="nama_desa" class="control-label">Title</label>
                                        <input type="text" class="form-control" autocomplete="off" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_role" class="control-label">Description</label>
                                        <textarea rows="5" class="form-control" name="description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_role" class="control-label">Photo</label>
                                        <input class="form-control" type="file" name="photo">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="tambah" class="btn btn-primary">
                                    <i class="tio-add-circle"></i>
                                    Add Data</button>
                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <!-- End Modal -->

            </div>
        </div>

        <!-- Card -->
        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">Total</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark">{{ count($certificates) }}</span>
                        </div>

                        <div class="col-auto">
                            <span class="btn btn-soft-success p-1">
                                <i class="tio-document"></i>
                            </span>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>
            </div>
            <!-- End Card -->
        </div>
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
        <!-- Card -->
        <div class="card">
            <!-- Header -->
            <div class="card-header">
                <div class="row justify-content-between align-items-center flex-grow-1">
                    <div class="col-sm-6 col-md-4 mb-3 mb-sm-0">
                        <form>
                            <!-- Search -->
                            <div class="input-group input-group-merge input-group-flush">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tio-search"></i>
                                    </div>
                                </div>
                                <input id="datatableSearch" type="search" autocomplete="off" class="form-control" placeholder="Search...">
                            </div>
                            <!-- End Search -->
                        </form>
                    </div>
                </div>
                <!-- End Row -->
            </div>
            <!-- End Header -->

            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <table id="datatable" class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
                     "columnDefs": [{
                        "targets": [0, 2],
                        "orderable": false
                      }],
                     "order": [],
                     "info": {
                       "totalQty": "#datatableWithPaginationInfoTotalQty"
                     },
                     "search": "#datatableSearch",
                     "entries": "#datatableEntries",
                     "pageLength": 15,
                     "isResponsive": false,
                     "isShowPaging": false,
                     "pagination": "datatablePagination"
                   }'>
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Photo</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>
                                <center>Actions</center>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($certificates as $certificate)
                       <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td><img class="img-fluid" src="https://drive.google.com/uc?export=view&id={{ $certificate->photo }}" alt=""></td>
                           <td>{{ $certificate->title }}</td>
                           <td>{{ $certificate->description }}</td>
                           <td>
                            <form method="POST" action="{{ url('admin/certificates/'.$certificate->id) }}">
                                @csrf
                                @method('DELETE')
                               <a href="" class="btn btn-success p-2 btn-edit" data-toggle="modal" data-target="#ModalEdit" data-id="<?= $certificate->id ?>" data-title="<?= $certificate->title ?>" data-description="<?= $certificate->description ?>" data-photo="<?= $certificate->photo ?>"><i class=" tio-edit"></i>Edit</a>
                                    <button onclick="return confirm('Are you sure want to delete this data?')" class="btn btn-danger p-2">
                                        <i class="tio-delete"></i> Delete
                                    </button>
                                </form>
                            </td>
                       </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
            <!-- End Table -->

            <!-- Modal Edit -->
            <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Education Edit</h5>
                            <button type="button" class="btn btn-xs btn-icon btn-ghost-secondary" data-dismiss="modal" aria-label="Close">
                                <i class="tio-clear tio-lg"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="form-update" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                                <input type="hidden" name="id" id="editId">
                                <div class="form-group">
                                    <label for="nama_desa" class="control-label">Title</label>
                                    <input type="text" id="editTitle" class="form-control" autocomplete="off" name="title">
                                </div>
                                <div class="form-group">
                                        <label for="nama_role" class="control-label">Description</label>
                                        <textarea id="editDescription" rows="5" class="form-control" name="description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_role" class="control-label">Photo</label>
                                        <input id="editPhoto" class="form-control" type="file" name="photo">
                                    </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="tambah" class="btn btn-success">
                                <i class="tio-delete"></i>
                                Edit Data</button>
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <!-- End Modal -->

            <!-- Footer -->
            <div class="card-footer">
                <!-- Pagination -->
                <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                    <div class="col-sm mb-2 mb-sm-0">
                        <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                            <span class="mr-2">Showing:</span>

                            <!-- Select -->
                            <select id="datatableEntries" class="js-select2-custom" data-hs-select2-options='{
                            "minimumResultsForSearch": "Infinity",
                            "customClass": "custom-select custom-select-sm custom-select-borderless",
                            "dropdownAutoWidth": true,
                            "width": true
                          }'>
                                <option value="10">10</option>
                                <option value="15" selected>15</option>
                                <option value="20">20</option>
                            </select>
                            <!-- End Select -->

                            <span class="text-secondary mr-2">of</span>

                            <!-- Pagination Quantity -->
                            <span id="datatableWithPaginationInfoTotalQty"></span>
                        </div>
                    </div>

                    <div class="col-sm-auto">
                        <div class="d-flex justify-content-center justify-content-sm-end">
                            <!-- Pagination -->
                            <nav id="datatablePagination" aria-label="Activity pagination"></nav>
                        </div>
                    </div>
                </div>
                <!-- End Pagination -->
            </div>
            <!-- End Footer -->
        </div>
        <!-- End Card -->
    </div>
<!-- End Content -->

<script>
    $('.btn-edit').click(function() {
        $('#editId').val($(this).data('id'))
        $('#editTitle').val($(this).data('title'))
        $('#editDescription').val($(this).data('description'))

        $('#form-update').attr('action', 'certificates/' + $(this).data('id'))
    })
</script>

</main><!-- Footer -->
@endsection
