

@extends('admin.layout.main')

@section('title')
{{ $title }}
@endsection

@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <x-card-title title="{{$title}}" button="<button id='delete-selected' class='btn btn-danger mt-3'>Delete Selected</button>" />
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped datatable">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="select-all"></th> 
                                    <th>Email</th>
                                    <th class="text-center">Created At</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




@push('css-lib')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />



<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.min.css">

@endpush

@push('style')
<style>
    .dt-length label {
        margin-left: 5px !important;
    }

    thead tr th {
        padding: 10px !important;
    }

    tbody tr td {
        padding: 10px !important;
    }

    td {
        margin: 10px !important;
        padding: 10px !important;
    }

    td.dt-type-date {
        text-align: center !important;
    }

    td:last-child {
        text-align: right !important;
    }

    .dropdown .dropdown-menu {
        top: 20px;
        right: 30px;
        font-size: 0.812rem;
        box-shadow: 0px 1px 15px 1px rgba(230, 234, 236, 0.35);
    }

    .dropdown.text-right .action-dropdown-btn {
        padding: 5px;
    }

    .dt-paging {
        background: #c4c8cb;
        border-radius: 10px;
    }


    td.select-checkbox:before{
        border: 0 !important;
    }


    /* .dropdown-menu */
</style>
@endpush


@push('js-lib')
<script src="{{ asset('aset/assets/js/jquery.js') }}"></script>
<script src="{{ asset('aset/assets/js/dataTables.js') }}"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.all.min.js"></script>

@endpush

@push('script')


<script type="text/javascript">
    $(document).ready(function() {
        const table = $('.datatable').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: '{{ route("admin.site_setting.newsletter.index") }}'
            },
            columns: [
                {
                    data: 'checkbox',
                    name: 'checkbox',
                    orderable: false,
                    searchable: false,
                    className: 'select-checkbox'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    className: "text-center"
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
            columnDefs: [{
                targets: 0, // Target the checkbox column
                render: function(data, type, row) {
                    return '<input type="checkbox" class="row-select" value="' + row.id + '">';
                }
            }]
        });

        // Select all checkboxes
        $('#select-all').on('click', function() {
            const rows = table.rows({ 'search': 'applied' }).nodes();
            $('input[type="checkbox"]', rows).prop('checked', this.checked);
        });

        // Delete selected rows
        $('#delete-selected').on('click', function() {
            const selectedIds = [];
            $('.row-select:checked').each(function() {
                selectedIds.push($(this).val());
            });

            if (selectedIds.length > 0) {
                Swal.fire({
                    title: "Are you sure?",
                    text: "Do you really want to delete the selected rows?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete them!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route("admin.site_setting.newsletter.delete-multiple") }}',
                            type: 'POST',
                            data: {
                                ids: selectedIds,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "The selected rows have been deleted.",
                                    icon: "success"
                                }).then(() => {
                                    table.ajax.reload(); // Reload the DataTable
                                });
                            },
                            error: function(response) {
                                Swal.fire({
                                    title: "Error!",
                                    text: "An error occurred while deleting the rows.",
                                    icon: "error"
                                });
                            }
                        });
                    }
                });
            } else {
                Swal.fire({
                    title: "No Selection",
                    text: "Please select at least one row to delete.",
                    icon: "info"
                });
            }
        });

        // Delete single row
        $(document).on('click', '.delete-btn', function() {
            const id = $(this).data('id'); // Get the ID of the row to delete

            Swal.fire({
                title: "Are you sure?",
                text: "Do you really want to delete this row?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route("admin.site_setting.newsletter.delete") }}',
                        type: 'POST',
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire({
                                title: "Deleted!",
                                text: "The row has been deleted.",
                                icon: "success"
                            }).then(() => {
                                table.ajax.reload(); // Reload the DataTable
                            });
                        },
                        error: function(response) {
                            Swal.fire({
                                title: "Error!",
                                text: "An error occurred while deleting the row.",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        });
    });
</script>


@endpush