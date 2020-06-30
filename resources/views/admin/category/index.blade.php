@extends('admin.templates.default')
@section('title', 'Data Categories')
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('default') }}">Home</a></li>
        <li class="breadcrumb-item active">Category dashboard</li>
    </ol>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data Category</h3>
                        <a href="{{ route('admin.categories.create') }}" class="float-right"><i class="fa fa-plus"></i> Add Category</a>
                    </div>
                    <div class="card-body">
                        @if(session('message'))
                            <div id="notif" class="alert alert-info">{{ session('message') }}</div>
                        @endif
                        <table id="dataTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

<!--- Sweet alert -->
<link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme/bootstrap-4.min.css') }}">
@endpush

@push('scripts')
<!-- DataTables -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<!-- Sweet alert -->
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

<script>
    $(function(){
        //DataTable
        $('#dataTable').DataTable({
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "autoWidth": true,
            ajax: '{{ route('admin.data.categories') }}',
            columns: [
                {data: 'DT_RowIndex', orderable: false, searchable: false}, //off kan sort kolom
                {data: 'name'},
                {data: 'slug'},
                {data: 'action'}
            ]
        });

         //Sweet Alert
        $('#dataTable').on('click', 'button#delete', function(e){
            e.preventDefault();
            var id = $(this).data('id'); //ambil dari data-id

            Swal.fire({
                title: 'Yakin hepus data ini?',
                text: "Data yang terhapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batalkan!',
                }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "DELETE",
                        url: "/admin/categories/" + id,
                        data: {
                            "id": id,
                            "_token": "{{ csrf_token() }}"
                        }, 

                        //setelah berhasil hapus data
                        success: function(data){
                            Swal.fire(
                            'Hapus data!',
                            'Data telah di hapus.',
                            'success'
                            )
                            //setelah alert succes, maka reload halaman
                            location.reload(true);
                        },
                    });
                }
            })
        });

        //notif
        $('#notif').fadeTo(2000, 500).slideUp(500, function(){
            $('#notif').slideUp(500);
        })

    //batas
    });
</script>

@endpush