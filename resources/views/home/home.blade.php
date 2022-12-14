<x-master-layout>
    <x-slot:pageTitle>
        Home
        </x-slot>
        <x-slot:headerFiles>
            </x-slot>
            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Home page</li>
                    </ol>
                </nav>
            </div>
            <!-- /BREADCRUMB -->
            <div class="layout-top-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        @if(session('success'))
                        <h1>{{session('success')}}</h1>
                        @endif
                        <h1>Hello <strong style="color:purple">{{auth()->user()->name}}</strong>! Welcome to my website </h1>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/ab/Icon-Mac.svg" width="32px" alt="">
                    </div>
                    <div class="widget-content widget-content-area">
                        Các tính năng chỉ mang tính chất thử nghiệm, không phải là sản phẩm chính thức.
                    </div>
                </div>
            </div>

            <x-slot:footerFiles>

                </x-slot>
</x-master-layout>