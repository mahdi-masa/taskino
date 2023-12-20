
@extends('layout')

@push('styles')
    @vite('resources/css/general/fontiran.css')
@endpush
@section('content')
    <!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::احراز هویت - ورود -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/sketchy-1/14.png">
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<!--begin::Logo-->
					<a href="../../demo1/dist/index.html" class="mb-12">
						<img alt="Logo" src="{{Vite::asset('resources/assets/general/logos/logo-1.svg')}}" class="h-40px" />
					</a>
					<!--end::Logo-->
					<!--begin::Wrapper-->
					<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                        @if(session('warning'))
                            
                            <div class="bg-warning p-3 mx-auto d-flex justify-content-start flex-column align-items-center rounded my-5">
                                <p class="text-center iransans-bold m-0 p-0">{{session('warning')}}</p>
                            </div>
                        @endif
						<!--begin::Form-->
						<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="../../demo1/dist/index.html" action="{{route('auth.login.simple')}}" method="POST">
                            @csrf
							<!--begin::Heading-->
							<div class="text-center mb-10">
								<!--begin::Title-->
								<h1 class="text-dark mb-3 iransans-bold">ورود  به مترونیک</h1>
								<!--end::Title-->
								<!--begin::Link-->
								<div class="text-gray-400 fw-bold fs-4 iransans-300">ثبت نام جدید؟
								<a href="../../demo1/dist/authentication/layouts/basic/sign-up.html" class="link-primary fw-bolder iransans-300">ساختن اکانت</a></div>
								<!--end::Link-->
							</div>
							<!--begin::Heading-->
							<!--begin::Input group-->
							<div class="fv-row mb-10">
								<!--begin::Tags-->
								<label class="form-label fs-6 fw-bolder text-dark iransans-bold">ایمیل</label>
								<!--end::Tags-->
								<!--begin::Input-->
								<input class="form-control form-control-lg form-control-solid" type="text" name="email" autocomplete="on" />
                                @error('email')
									<span class="text-red text-sm">{{ $message }}</span>
								@enderror
								<!--end::Input-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="fv-row mb-10">
								<!--begin::Wrapper-->
								<div class="d-flex flex-stack mb-2">
									<!--begin::Tags-->
									<label class="form-label fw-bolder text-dark fs-6 mb-0 iransans-bold">کلمه عبور</label>
									<!--end::Tags-->
									<!--begin::Link-->
									<a href="../../demo1/dist/authentication/layouts/basic/password-reset.html" class="link-primary fs-6 fw-bolder iransans-500">فراموشی رمز?</a>
									<!--end::Link-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Input-->
								<input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
                                @error('password')
									<span class="text-red text-sm">{{ $message }}</span>
								@enderror
								<!--end::Input-->
							</div>
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="text-center">
								<!--begin::ثبت button-->
								<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
									<span class="indicator-label iransans-bold">ادامه</span>
									<span class="indicator-progress iransans-bold">لطفا صبر کنید...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
								<!--end::ثبت button-->
								<!--begin::Separator-->
								<div class="text-center text-muted text-uppercase fw-bolder mb-5 iransans-100">یا</div>
								<!--end::Separator-->
								<!--begin::گوگل link-->
								<a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5 iransans-bold">
								<img alt="Logo" src="{{ Vite::asset('resources/assets/general/logos/google-icon.svg')}}" class="h-20px me-3" />ادامه  با گوگل</a>
								<!--end::گوگل link-->
								
							</div>
							<!--end::Actions-->
						</form>
						<!--end::Form-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
				<!--begin::Footer-->
				<div class="d-flex flex-center flex-column-auto p-10">
					<!--begin::Links-->
					<div class="d-flex align-items-center fw-bold fs-6">
						<a href="https://keenthemes.com" class="text-muted text-hover-primary px-2">درباره ی ما</a>
						<a href="mailto:support@keenthemes.com" class="text-muted text-hover-primary px-2">تماس با ما</a>
						<a href="https://www.rtl-theme.com/metronic-admin-html-template/" class="text-muted text-hover-primary px-2">تماس با ما</a>
					</div>
					<!--end::Links-->
				</div>
				<!--end::Footer-->
			</div>
			<!--end::احراز هویت - ورود-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		
		
@endsection


@push('scripts')
        <!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		@vite('resources/js/general/plugins.bundle.js')
		@vite('resources/general/js/scripts.bundle.js')
		<!--end::Global Javascript Bundle-->
		<!--begin::Page سفارشی Javascript(used by this page)-->
		@vite('resources/js/pages/auth/login/general.js')
		<!--end::Page custom Javascript-->
		<!--end::Javascript-->
@endpush