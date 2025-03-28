@extends('admin.layout.main')

@section('title')
    {{ $title }}
@endsection


@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <x-card-title title="Sub Category List"
                    button="<a  class='btn btn-info' href='{{ route('admin.product.sub-category.create') }}'>+ Add Sub Category</a>" />
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-striped datatable">
                                <thead>
                                    <tr>
                                        <th>Sub Category Name</th>
                                        <th>Category Name</th>
                                        <th class="text-center">Created At</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('css-lib')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

        .action-dropdown-btn {
            padding: 5px;
        }

        .dt-paging {
            background: #c4c8cb;
            border-radius: 10px;
        }

        .action-dropdown-btn {
            padding: 5px;
        }

        .table td img {
            height: 50px;
            width: 80px;
            border-radius: 3px;
        }
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
                    url: '{{ route('admin.product.sub-category.index') }}'
                },
                columns: [{
                        data: 'subCategory_name',
                        name: 'subcategory_name',
                    },
                    {
                        data: 'category_name',
                        name: 'category.name',
                        className: "text-center"
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
                        searchable: false,
                        className: "text-end"
                    }
                ]
            });
        });
    </script>


    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.show-alert-delete-box', function(event) {
                event.preventDefault();
                var form = $(this).closest("form");
                Swal.fire({
                    title: "Are you sure?",
                    text: "Do you really want to delete this category?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
