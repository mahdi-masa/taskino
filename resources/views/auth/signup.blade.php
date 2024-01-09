
@extends('layout')

@push('styles')
    @vite('resources/css/general/fontiran.css')
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
@endpush
@section('content')
    <!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::احراز هویت - ثبت نام -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url({{Vite::asset('resources/assets/general/sketch/14.png')}})">
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<!--begin::Logo-->
					<a href="../../demo1/dist/index.html" class="mb-12">
						<img alt="Logo" src="{{Vite::asset('resources/assets/general/logos/logo-1.svg')}}" class="h-40px" />
					</a>
					<!--end::Logo-->
					<!--begin::Wrapper-->
					<div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<!--begin::Form-->
						@if(session('warning'))
                            
                            <div class="bg-warning p-3 mx-auto d-flex justify-content-start flex-column align-items-center rounded my-5">
                                <p class="text-center iransans-bold m-0 p-0">{{session('warning')}}</p>
                            </div>
                        @endif
						<form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" method="POST" action="{{route('auth.signup.simple')}}">
							@csrf
							<!--begin::Heading-->
							<div class="mb-10 text-center">
								<!--begin::Title-->
								<h1 class="text-dark mb-3 iransans-bold">ساختن اکانت</h1>
								<!--end::Title-->
								<!--begin::Link-->
								<div class="text-gray-400 fw-bold fs-4 iransans-300">اکانت کاربری دارید؟
								<a href="../../demo1/dist/authentication/layouts/basic/sign-in.html" class="link-primary fw-bolder">ورود</a></div>
								<!--end::Link-->
							</div>
							<!--end::Heading-->
							<!--begin::Actions-->
							<button type="button" class="btn btn-light-primary fw-bolder w-100 mb-10 iransans-bold">
								<img alt="Logo" src="{{Vite::asset('resources/assets/general/logos/google-icon.svg')}}" class="h-20px me-3" />
								<a href="{{route('auth.google.redirect')}}">
									ورود از طریق گوگل
								</a>
							
							</button>
							<!--end::Actions-->
							<!--begin::Separator-->
							<div class="d-flex align-items-center mb-10">
								<div class="border-bottom border-gray-300 mw-50 w-100"></div>
								<span class="fw-bold text-gray-400 fs-7 mx-2">یا</span>
								<div class="border-bottom border-gray-300 mw-50 w-100"></div>
							</div>
							<!--end::Separator-->
							<!--begin::Input group-->
							<div class="row fv-row mb-7">
								<!--begin::Col-->
								<div class="col-xl-6">
									<label class="form-label fw-bolder text-dark fs-6 iransans-bold">نام کوچک</label>
									<input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="fname" autocomplete="on" value="{{ old('fname')}}"/>
								@error('fname')
									<span class="text-danger iransans-300">{{ $message }}</span>
								@enderror
									
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-xl-6">
									<label class="form-label fw-bolder text-dark fs-6 iransans-bold">نام خانوادگی</label>
									<input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="lname" autocomplete="on" value="{{ old('lname') }}"/>
									@error('lname')
									<span class="text-danger iransans-300">{{ $message }}</span>
									@enderror
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="fv-row mb-7">
								<label class="form-label fw-bolder text-dark fs-6 iransans-bold">ایمیل</label>
								<input class="form-control form-control-lg form-control-solid" type="email" placeholder="example@gmail.com" name="email" autocomplete="on" value="{{ old('email') }}"/>
								@error('email')
									<span class="text-danger iransans-300">{{ $message }}</span>
								@enderror
							</div>
							<!--end::Input group-->
                            <!--begin::Input group-->
							<div class="fv-row mb-7">
								<label class="form-label fw-bolder text-dark fs-6 iransans-bold">تلفن همراه</label>
								<input class="form-control form-control-lg form-control-solid" type="phone" placeholder="09131234567" name="phone" autocomplete="on" value="{{ old('phone') }}"/>
								@error('phone')
									<span class="text-danger iransans-300">{{ $message }}</span>
								@enderror
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="mb-10 fv-row" data-kt-password-meter="true">
								<!--begin::Wrapper-->
								<div class="mb-1">
									<!--begin::Tags-->
									<label class="form-label fw-bolder text-dark fs-6 iransans-bold">کلمه عبور</label>
									<!--end::Tags-->
									<!--begin::Input wrapper-->
									<div class="position-relative mb-3">
										<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="on" value="{{ old('password') }}"/>
										<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
											<i class="bi bi-eye-fill" style="font-size: 25px" onclick="showPassword()"></i>
											<i class="bi bi-eye-slash" style="font-size: 25px" onclick="hidePassword()"></i>
										</span>
										@error('password')
											<span class="text-danger iransans-300">{{ $message }}</span>
										@enderror	
									</div>
									<!--end::Input wrapper-->
									
								</div>
								<!--end::Wrapper-->
								<!--begin::Hint-->
								<div class="text-muted iransans-300">از 8 حرف یا بیشتر با ترکیبی از حروف ، اعداد و نمادها استفاده کنید.</div>
								<!--end::Hint-->
							</div>
							<!--end::Input group=-->
							<!--begin::Input group-->
							<div class="fv-row mb-5">
								<label class="form-label fw-bolder text-dark fs-6 iransans-bold">تایید کلمه عبور</label>
								<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password_confirmation" autocomplete="on"/>
						
							</div>
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="text-center">
								<button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
									<span class="indicator-label iransans-bold">ثبت</span>
									<span class="indicator-progress">لطفا صبر کنید...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
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
			<!--end::احراز هویت - ثبت نام-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		
@endsection


@push('scripts')
        <Script>
			let passwordInput = document.forms[0].password.parentElement.children[0];
			let revealButton = document.forms[0].password.parentElement.children[1].children;
			console.log(passwordInput);
			console.log(revealButton);

			revealButton[1].style.display = 'none'


			function showPassword(e){
				passwordInput.setAttribute('type' , 'text');
				revealButton[0].style.display = 'none';
				revealButton[1].style.display = 'block'
			}

			function hidePassword(e){
				passwordInput.setAttribute('type' , 'password');
				revealButton[1].style.display = 'none';
				revealButton[0].style.display = 'block'
			}
		</Script>
@endpush