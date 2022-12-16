<x-master-layout>
    <x-slot:pageTitle>
        View Permissions
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
                    <h1>Danh sách vai trò </h1>
                        <button type="button" onclick="openModalAddPermission()" class="btn btn-success mr-2 _effect--ripple waves-effect waves-light">
                            Thêm vai trò
                        </button>
                        <button onclick="reloadTable()" class="btn btn-danger btn-reload" >Làm mới</button>
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
            <div class="modal fade" id="permission-modal" tabindex="-1" role="dialog" aria-labelledby="role-modalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="role-modalLabel">Thêm quyền</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <svg> ... </svg>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <input type="hidden" name="id" readonly>
                                <div class="form-group mb-4">
                                    <label for="permission_name">Tên quyền</label>
                                    <input type="text" class="form-control" name="permission_name" placeholder="Enter permission name">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn btn-light-dark close-modal" onclick="closeModal()"><i class="flaticon-cancel-12"></i>Đóng</button>
                            <button type="button" class="btn btn-primary btn-save">Thêm quyền</button>
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
                            ajax: "{{ route('permission-manager.get-permission') }}",
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
                            ],
                            drawCallback: function() {
                                removeSpin('btn-reload');
                            },
                        });
                    
                    // make function reload datatable
                     function reloadTable() {
                        addSpin('btn-reload');
                        table.ajax.reload();
                    }
                    function addRole(){
                        // make ajax add role
                        addSpin('btn-save','permission_name');
                        $.ajax({
                            url: "{{ route('permission-manager.insert-permission') }}",
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                name: $('input[name="permission_name"]').val(),
                            },
                            success: function(response) {
                                console.log(response);
                                if (response.status == "success") {
                                    // reload table
                                    reloadTable();
                                    // close modal
                                    $('#permission-modal').modal('hide');
                                    // reset form
                                    $('input[name="permission_name"]').val('');
                                    removeSpin('btn-save','permission_name');
                                }else{
                                    removeSpin('btn-save','permission_name');
                                }
                            },
                            error: function(response) {
                                $('#permission-modal').modal('hide');
                                $('input[name="permission_name"]').val('');
                                removeSpin('btn-save','permission_name');
                            }
                        });
                    }
                    // make function open modal add permission
                    function openModalAddRole(){
                        // open modal
                        // set title
                        $('#permission-modal .modal-title').text('Thêm vai trò');
                        // set button
                        $('.btn-save').text('Thêm');
                        // set action
                        $('.btn-save').attr('onclick','addRole()');
                        $('#permission-modal').modal('show');

                    }
                    // make function open modal edit permission
                    function openModalEditRole(id){
                        // open modal
                        addSpin('edit-'+id);
                        // set title
                        $('#permission-modal .modal-title').text('Sửa vai trò');
                        // set button
                        $('.btn-save').text('Cập nhật');
                        // set action
                        $('.btn-save').attr('onclick','updateRole('+id+')');
                        // make ajax get permission
                        $.ajax({
                            url: "{{ route('permission-manager.get-permission-by-id') }}",
                            type: "GET",
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: id,
                            },
                            success: function(response) {
                                console.log(response);
                                if (response.status == "success") {
                                    // set value
                                    $('input[name="permission_name"]').val(response.data.name);
                                    $('input[name="id"]').val(response.data.id);
                                    removeSpin('edit-'+id);
                                    $('#permission-modal').modal('show');
                                    
                                }
                            },
                            error: function(response) {
                                $('#permission-modal').modal('hide');
                                $('input[name="permission_name"]').val('');
                            }
                        });
                    }
                    // make function update role
                    function updateRole(id){
                        // make ajax update role
                        addSpin('btn-save','permission_name');
                        $.ajax({
                            url: "{{ route('permission-manager.update-permission') }}",
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: id,
                                name: $('input[name="permission_name"]').val(),
                            },
                            success: function(response) {
                                console.log(response);
                                if (response.status == "success") {
                                    // reload table
                                    reloadTable();
                                    // close modal
                                    $('#permission-modal').modal('hide');
                                    // reset form
                                    $('input[name="permission_name"]').val('');
                                    removeSpin('btn-save','permission_name');
                                }else{
                                    removeSpin('btn-update','permission_name');
                                }
                            },
                            error: function(response) {
                                $('#permission-modal').modal('hide');
                                $('input[name="permission_name"]').val('');
                                removeSpin('btn-save','permission_name');
                            }
                        });
                    }
                    function deleteRole(id){
                        // make ajax delete permission
                        addSpin('delete-'+id);
                        $.ajax({
                            url: "{{ route('permission-manager.delete-permission') }}",
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
                                    removeSpin('delete-'+id);
                                }
                            },
                            error: function(response) {
                                removeSpin('delete-'+id);
                            }
                        });
                    }
                    function closeModal(){
                        $('#permission-modal').modal('hide');
                        $('#permission-modal form')[0].reset();
                    }
                    // $('.btn-reload').loading();
                </script>

                </x-slot>
</x-master-layout>