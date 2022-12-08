<x-master-layout>
    <x-slot:pageTitle>
        View User
        </x-slot>
        <x-slot:headerFiles>
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
                    <div class="widget-header">
                        <h1>Danh sách người dùng</h1>
                    </div>
                    <div class="widget-content widget-content-area">
                        <table>
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Create Date</th>
                                <th>Create Date</th>

                            </thead>
                        </table>
                    </div>
                </div>
            </div>

            <x-slot:footerFiles>

                </x-slot>
</x-master-layout>
