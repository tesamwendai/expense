<x-master-layout>
    <x-slot:pageTitle>
        View User
        </x-slot>
        <x-slot:headerFiles>
            <link rel="stylesheet" href="{{asset('plugins/table/datatable/datatables.css')}}">
            @vite([
            'resources/scss/light/plugins/table/datatable/dt-global_style.scss',
            'resources/scss/dark/plugins/table/datatable/dt-global_style.scss',
            'resources/scss/light/plugins/table/datatable/custom_dt_custom.scss',
            'resources/scss/dark/plugins/table/datatable/custom_dt_custom.scss',
            'resources/scss/light/assets/components/modal.scss',
            'resources/scss/dark/assets/components/modal.scss'
            ])

            </x-slot>
            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Danh sách vai trò</li>
                    </ol>
                </nav>
            </div>
            <!-- /BREADCRUMB -->
            <div class="layout-top-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header p-3">
                        <h1>Danh sách vai trò</h1>
                        <!-- <button class="btn btn-success">Thêm vai trò</button> -->
                        <button type="button" class="btn btn-success mr-2 _effect--ripple waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Thêm vai trò
                        </button>
                        <button onclick="reloadTable()" class="btn btn-danger">Reload</button>
                    </div>
                    <div class="widget-content widget-content-area pt-3 p-3">
                        <table id="user-table" class="table style-3 dt-table-hover table-bordered">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Guard Name</th>
                                <th>Created At</th>
                                <th>#</th>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Thêm vai trò</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <svg> ... </svg>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group mb-4">
                                    <label for="role_name">Role Name</label>
                                    <input type="text" class="form-control" name="role_name" placeholder="Enter role name">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn btn-light-dark" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i>Đóng</button>
                            <button type="button" onclick="addRole()" class="btn btn-primary btn-save">Thêm vai trò</button>
                        </div>
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
                            ajax: "{{ route('role-manager.get-role') }}",
                            columns: [{
                                    data: 'id',
                                    name: 'id'
                                },
                                {
                                    data: 'name',
                                    name: 'name'
                                },
                                {
                                    data: 'guard_name',
                                    name: 'guard_name'
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
                    
                    // make function reload datatable
                    function reloadTable() {
                        table.ajax.reload();
                    }
                    function addRole(){
                        // make ajax add role
                        addSpin('btn-save','role_name');
                        $.ajax({
                            url: "{{ route('role-manager.insert-role') }}",
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                name: $('input[name="role_name"]').val(),
                            },
                            success: function(response) {
                                console.log(response);
                                if (response.status == "success") {
                                    // reload table
                                    reloadTable();
                                    // close modal
                                    $('#exampleModal').modal('hide');
                                    // reset form
                                    $('input[name="role_name"]').val('');
                                }else{
                                    removeSpin('btn-save','Thêm vai trò','role_name');
                                }
                            },
                            error: function(response) {
                                $('#exampleModal').modal('hide');
                                $('input[name="role_name"]').val('');
                                removeSpin('btn-save','Thêm vai trò','role_name');
                            }
                        });
                    }
                    function deleteRole(id){
                        // make ajax delete role
                        addSpin('delete');
                        $.ajax({
                            url: "{{ route('role-manager.delete-role') }}",
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: id,
                            },
                            success: function(response) {
                                console.log(response);
                                if (response.status == "success") {
                                    // reload table
                                    reloadTable();
                                }else{
                                    removeSpin('delete');
                                }
                            },
                            error: function(response) {
                                removeSpin('delete');
                            }
                        });
                    }
                </script>

                </x-slot>
</x-master-layout>