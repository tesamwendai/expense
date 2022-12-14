<x-master-layout>
    <x-slot:pageTitle>
        View User
        </x-slot>
        <x-slot:headerFiles>
            <link rel="stylesheet" href="{{asset('plugins/table/datatable/datatables.css')}}">
            @vite(['resources/scss/light/plugins/table/datatable/dt-global_style.scss','resources/scss/light/plugins/table/datatable/custom_dt_custom.scss'])
            </x-slot>
            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User page</li>
                    </ol>
                </nav>
            </div>
            <!-- /BREADCRUMB -->
            <div class="layout-top-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header p-3">
                        <h1>Danh sách người dùng</h1>
                    </div>
                    <div class="widget-content widget-content-area pt-3 p-3">
                        <table id="user-table" class="table style-3 dt-table-hover table-bordered">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>#</th>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

            <x-slot:footerFiles>
                <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->
                <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> -->
                <script src="{{asset('plugins/table/datatable/jquery.dataTables.min.js')}}"></script>
                <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
                <script src="{{asset('plugins/table/datatable/dataTables.bootstrap4.min.js')}}"></script> 
                <script type="text/javascript">
                    $(function() {
                        var table = $('#user-table').DataTable({
                            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                                "<'table-responsive'tr>" +
                                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                            "oLanguage": {
                                "oPaginate": {
                                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                                },
                                "sInfo": "Showing page _PAGE_ of _PAGES_",
                                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                                "sSearchPlaceholder": "Search...",
                                "sLengthMenu": "Results :  _MENU_",
                            },
                            "stripeClasses": [],
                            "lengthMenu": [5, 10, 20, 50],
                            "pageLength": 10,
                            processing: true,
                            serverSide: true,
                            ajax: "{{ route('user-manager.get-user') }}",
                            columns: [{
                                    data: 'id',
                                    name: 'id'
                                },
                                {
                                    data: 'name',
                                    name: 'name'
                                },
                                {
                                    data: 'email',
                                    name: 'email'
                                },
                                {
                                    data: 'status',
                                    name: 'status',
                                    className: 'text-center'
                                },
                                {
                                    data: 'created_at',
                                    name: 'created_at'
                                },
                                {
                                    data: 'action',
                                    name: 'action',
                                    className: 'text-center',
                                    orderable: false,
                                },
                            ]
                        });

                    });
                </script>

                </x-slot>
</x-master-layout>