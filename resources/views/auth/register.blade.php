<x-master-layout :scrollspy="false">

    <x-slot:pageTitle>
        SignUp
        </x-slot>

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <x-slot:headerFiles>
            <!--  BEGIN CUSTOM STYLE FILE  -->
            @vite(['resources/scss/light/assets/authentication/auth-boxed.scss','resources/scss/dark/assets/authentication/auth-boxed.scss'])
            <link href="{{asset('plugins/filepond/cdn/filepond-plugin-image-preview.css')}}" rel="stylesheet" />
            <link href="{{asset('plugins/filepond/cdn/filepond.css')}}" rel="stylesheet">
            <!-- <link href="{{asset('plugins/filepond/cdn/filepond-plugin-image-edit.css')}}" rel="stylesheet" /> -->
            @vite(['resources/scss/light/plugins/filepond/custom-filepond.scss','resources/scss/dark/plugins/filepond/custom-filepond.scss'])
            <style>
                /* .filepond--drop-label {
                    color: #4c4e53;
                }

                .filepond--label-action {
                    text-decoration-color: #babdc0;
                }

                .filepond--panel-root {
                    background-color: #edf0f4;
                } */

                /* .filepond--root {
                    width: 170px;
                    margin: 0 auto;
                } */
            </style>
            <!--  END CUSTOM STYLE FILE  -->
            </x-slot>
            <!-- END GLOBAL MANDATORY STYLES -->

            <div class="auth-container d-flex" style="border:'none';background: url({{Vite::asset('resources/images/background-image-1.jpg')}});background-size: cover;background-repeat: no-repeat;">

                <div class="container mx-auto align-self-center">

                    <div class="row">

                        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                            <div class="card mt-3 mb-3" style="
                            border-radius: 20px;border:none">
                                <div class="card-body" style="
                                background: linear-gradient(120deg, rgba(230, 211, 245, .8),rgba(207, 231, 207, .8));
                                background-size: contain;
                                background-repeat: no-repeat;
                                border-radius: 20px;
                                backdrop-filter: blur(3px);
                            ">
                                    <form action="{{ route('register') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <h2 class="float-start">{{trans('auth.register')}}</h2>
                                                <img style="cursor:pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Change language" onclick="changeLanguage(this,`{{\App::currentLocale()}}`)" class="float-end flag-width" width="16px" src="{{Vite::asset('resources/images/1x1/'.\App::currentLocale().'.svg')}}" alt="flag">
                                                {{-- <a href="{!! route('change-language', ['en']) !!}">English</a> --}}
                                                {{-- <a href="/change-language/vi">Vietnam</a> --}}
                                                @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <input type="text" id="folder">
                                                    <label class="form-label">{{trans('auth.name')}}</label>
                                                    <input type="text" name="name" class="form-control ">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">{{trans('auth.email')}}</label>
                                                    <input type="email" name="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">{{trans('auth.password')}}</label>
                                                    <input type="text" name="password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">{{trans('auth.confirm_password')}}</label>
                                                    <input type="text" name="password_confirmation" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">{{trans('auth.avatar')}}</label>
                                                    <input type="file" class="filepond" name="avatar" accept="image/*" data-allow-reorder="true" data-max-file-size="3MB">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <div class="form-check form-check-primary form-check-inline">
                                                        <input class="form-check-input me-3" type="checkbox" id="form-check-default">
                                                        <label class="form-check-label" for="form-check-default">
                                                            {!! trans('auth.terms')!!}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="mb-4">
                                                    <button type="submit" class="btn btn-secondary w-100">{{trans('auth.btn-signup')}}</button>
                                                </div>
                                            </div>

                                            <div class="col-12 mb-4">
                                                <div class="">
                                                    <div class="seperator">
                                                        <hr>
                                                        <div class="seperator-text"> <span>{{trans('auth.or_continue_with')}}</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            

                                            <div class="col-sm-4 col-12">
                                                <div class="mb-4">
                                                    <button class="btn  btn-social-login w-100 ">
                                                        <img src="{{ Vite::asset('resources/images/google-gmail.svg') }}" alt="" class="img-fluid">
                                                        <span class="btn-text-inner">Google</span>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 col-12">
                                                <div class="mb-4">
                                                    <button class="btn  btn-social-login w-100">
                                                        <img src="{{ Vite::asset('resources/images/github-icon.svg') }}" alt="" class="img-fluid">
                                                        <span class="btn-text-inner">Github</span>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="col-sm-4 col-12">
                                                <div class="mb-4">
                                                    <button class="btn  btn-social-login w-100">
                                                        <img src="{{ Vite::asset('resources/images/twitter.svg') }}" alt="" class="img-fluid">
                                                        <span class="btn-text-inner">Twitter</span>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="text-center">
                                                    <p class="mb-0">{{trans('auth.already_have_account')}} <a href="{{ route('login') }}" class="text-success">{{trans('auth.btn-login')}}</a>
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <!--  BEGIN CUSTOM SCRIPTS FILE  -->
            <x-slot:footerFiles>
                <script src="{{asset('plugins/filepond/cdn/filepond-plugin-file-validate-type.js')}}"></script>
                <script src="{{asset('plugins/filepond/cdn/filepond-plugin-image-exif-orientation.js')}}"></script>
                <script src="{{asset('plugins/filepond/cdn/filepond-plugin-file-encode.js')}}"></script>
                <script src="{{asset('plugins/filepond/cdn/filepond-plugin-image-preview.js')}}"></script>
                <!-- <script src="{{asset('plugins/filepond/cdn/filepond-plugin-image-crop.js')}}"></script> -->
                <!-- <script src="{{asset('plugins/filepond/cdn/filepond-plugin-image-resize.js')}}"></script> -->
                <!-- <script src="{{asset('plugins/filepond/cdn/filepond-plugin-image-transform.js')}}"></script> -->
                <!-- <script src="{{asset('plugins/filepond/cdn/filepond-plugin-image-edit.js')}}"></script> -->
                <script src="{{asset('plugins/filepond/cdn/filepond-plugin-file-validate-size.js')}}"></script>

                <script src="{{asset('plugins/filepond/cdn/filepond.js')}}"></script>
                <script>
                    FilePond.registerPlugin(

                        // encodes the file as base64 data
                        FilePondPluginFileEncode,

                        // validates the size of the file
                        FilePondPluginFileValidateSize,

                        // corrects mobile image orientation
                        FilePondPluginImageExifOrientation,

                        // previews dropped images
                        FilePondPluginImagePreview,

                        FilePondPluginFileValidateType
                    );
                    FilePond.setOptions({
                        server: {
                            // url:'{{route("upload-avatar")}}',
                            url:'{{ URL::to("")}}',
                            process:{
                                url:'/upload-avatar',
                                method:'POST',
                                onload:(response)=>{

                                    // console.log(JSON.parse(JSON.parse(response).data).temp_path);
                                },
                            },
                            revert:'/revert-avatar',
                            headers:{
                                'X-CSRF-TOKEN':'{{csrf_token()}}'
                            }
                        },
                        labelIdle: '{!!trans("auth.file_pond.labelIdle")!!}',
                        labelFileWaitingForSize: '{{trans("auth.file_pond.labelFileWaitingForSize")}}',
                        labelFileSizeNotAvailable: '{{trans("auth.file_pond.labelFileSizeNotAvailable")}}',
                        labelFileLoading: '{{trans("auth.file_pond.labelFileLoading")}}',
                        labelTapToCancel: '{{trans("auth.file_pond.labelTapToCancel")}}',
                        labelMaxFileSize: '{{trans("auth.file_pond.labelMaxFileSize")}}',
                        labelMaxFileSizeExceeded: '{{trans("auth.file_pond.labelMaxFileSizeExceeded")}}',
                        labelFileProcessing: '{{trans("auth.file_pond.labelFileProcessing")}}',
                        labelFileProcessingError: '{{trans("auth.file_pond.labelFileProcessingError")}}',
                        labelTapToRetry: '{{trans("auth.file_pond.labelTapToRetry")}}',

                        labelFileProcessingComplete: '{{trans("auth.file_pond.labelFileProcessingComplete")}}',
                        labelFileProcessingAborted: '{{trans("auth.file_pond.labelFileProcessingAborted")}}',
                        labelTapToCancel: '{{trans("auth.file_pond.labelTapToCancel")}}',

                        

                    });
                    // Select the file input and use 
                    // create() to turn it into a pond
                    FilePond.create(
                        document.querySelector('.filepond')
                    );

                    function changeLanguage(element, lang) {

                        $.ajax({
                            url: '/change-language/' + (lang == "vi" ? "en" : "vi"),
                            type: 'GET',
                            data: {
                                _token: '{{ csrf_token() }}',
                                lang: lang
                            },
                            success: function(data) {
                                if (lang == 'en') {
                                    element.src = `{{Vite::asset('resources/images/1x1/vn.svg')}}`;
                                } else {
                                    element.src = `{{Vite::asset('resources/images/1x1/us.svg')}}`;
                                }
                                location.reload();
                            }
                        });


                    }
                    // FilePond.parse(document.body);
                </script>
                </x-slot>
                <!--  END CUSTOM SCRIPTS FILE  -->
</x-master-layout>