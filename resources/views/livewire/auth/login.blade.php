<section>
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 mt-4">
                    <div class="card card-plain mt-6">
                        <div class="card-header pb-0 text-left bg-transparent">
                            <h3 class="font-weight-bolder text-info text-gradient">{{ __('Selamat Datang') }}</h3>
                            <p class="mb-0">{{ __('Pemetaan Tingkat Risiko Stunting')}}<br></p>
                            <p class="mb-0">{{__('Provinsi Jawa Timur') }}</p>
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent="login" action="#" method="POST" role="form text-left">
                                <div class="mb-3">
                                    <label for="email">{{ __('Email') }}</label>
                                    <div class="@error('email')border border-danger rounded-3 @enderror">
                                        <input wire:model="email" id="email" type="email" class="form-control"
                                            placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                                    </div>
                                    @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password">{{ __('Password') }}</label>
                                    <small class="ms-8">
                                        <a href="{{ route('forgot-password') }}"
                                        class="text-info text-gradient">{{ __('Lupa password?') }}</a>
                                    </small>
                                    <div class="@error('password')border border-danger rounded-3 @enderror">
                                        <input wire:model="password" id="password" type="password" class="form-control"
                                            placeholder="Password" aria-label="Password"
                                            aria-describedby="password-addon">
                                    </div>
                                    @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                                <!-- <div class="form-check form-switch">
                                    <input wire:model="remember_me" class="form-check-input" type="checkbox"
                                        id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">{{ __('Remember me') }}</label>
                                </div> -->
                                <div class="text-center">
                                    <button type="submit"
                                        class="btn bg-gradient-info w-100 mt-4 mb-0">{{ __('Sign in') }}</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center pt-0 px-lg-2 px-1">
                            <p class="mb-4 text-sm mx-auto">
                                {{ __('Belum punya akun?') }}
                                <a href="{{ route('sign-up') }}"
                                    class="text-info text-gradient font-weight-bold">{{ __('Sign up') }}</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6" >
                    <div class="mt-7">
                        <img src="../assets/img/bg-login.jpg" alt="" width="800px">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
