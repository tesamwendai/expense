<x-master-layout>
    <x-slot:pageTitle>
        {{ __('Reset Password') }}
        </x-slot>

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <x-slot:headerFiles>
            <!--  BEGIN CUSTOM STYLE FILE  -->
            @vite(['resources/scss/light/assets/authentication/auth-boxed.scss'])
            @vite(['resources/scss/dark/assets/authentication/auth-boxed.scss'])
            <!--  END CUSTOM STYLE FILE  -->
            </x-slot>
            <!-- END GLOBAL MANDATORY STYLES -->
            <div class="auth-container d-flex" style="border:'none';background: url({{ Vite::asset('resources/images/background-image-1.jpg');}});background-repeat:no-repeat;background-size:cover">

                <div class="container mx-auto align-self-center">
                    <form action="{{ route('password.update') }}" method="post">
                        @csrf
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

                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <h2 class="float-start">{{ trans('auth.reset_password') }}</h2>
                                                <img style="cursor:pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Change language" onclick="changeLanguage(this,`{{ \App::currentLocale() }}`)" class="float-end" width="16px" src="{{ Vite::asset('resources/images/1x1/' . \App::currentLocale() . '.svg') }}" class="flag-width" alt="flag">
                                                <!--  make clear float -->
                                                <div class="clearfix"></div>
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
                                                    <label class="form-label">{{ trans('auth.email') }}</label>
                                                    <input type="hidden" name="token" value="{{ $request->token }}">
                                                    <input type="email" name="email" value="{{$request->email}}" readonly contenteditable="false" autofocus class="form-control @error('email') is-invalid @enderror">
                                                    <div class="invalid-feedback">
                                                        @error('email')
                                                        {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-4">
                                                    <label class="form-label">{{ trans('auth.password') }}</label>
                                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                                    <div class="invalid-feedback">
                                                        @error('password')
                                                        {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-4">
                                                    <label class="form-label">{{ trans('auth.confirm_password') }}</label>
                                                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                                                    <div class="invalid-feedback">
                                                        @error('password_confirmation')
                                                        {{ $message }}
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="mb-4">
                                                    <button type="submit" onclick="spin()" class="btn btn-secondary w-100 btn-update-password">{{ trans('auth.reset_password') }}</button>
                                                </div>
                                            </div>

                                            {{-- <div class="col-12 mb-4">
                                                <div class="">
                                                    <div class="seperator">
                                                        <hr>
                                                        <div class="seperator-text">
                                                            <span>{{ trans('auth.or_continue_with') }}</span>
                                                        </div>
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
                                            </div> --}}

                                            {{-- <div class="col-12">
                                                <div class="text-center">
                                                    <p class="mb-0">{{ trans('auth.not_receive_email') }} <a href="{{ route('register') }}" class="text-success">
                                                            {{ trans('auth.resent') }}</a>
                                                    </p>
                                                </div>
                                            </div> --}}

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>

            </div>


            <!--  BEGIN CUSTOM SCRIPTS FILE  -->
            <x-slot:footerFiles>
                <script>
                    function spin() {
                        document.querySelector('.btn-update-password').innerHTML =
                            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sending...';
                        document.querySelector('.btn-update-password').disabled = true;
                        document.querySelector('input[name=email]').readOnly = true;
                        document.querySelector('input[name=password]').readOnly = true;
                        document.querySelector('input[name=password_confirmation]').readOnly = true;
                        $('form').submit();;
                    }

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
                                    element.src = `{{ Vite::asset('resources/images/1x1/vn.svg') }}`;
                                } else {
                                    element.src = `{{ Vite::asset('resources/images/1x1/us.svg') }}`;
                                }
                                location.reload();
                            }
                        });
                    }
                </script>
                </x-slot>
                <!--  END CUSTOM SCRIPTS FILE  -->
</x-master-layout>