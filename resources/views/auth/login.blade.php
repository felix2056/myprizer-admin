@extends('layouts.auth')

@section('content')
@php
    $site_settings = \App\Models\SiteSetting::first();
@endphp

<div class="tp-main-wrapper h-screen">
    <div class="container mx-auto my-auto h-full flex items-center justify-center">
        <div class="pt-[120px] pb-[120px]">
            <div class="grid grid-cols-12 shadow-lg bg-white overflow-hidden rounded-md ">
                <div class="col-span-4 lg:col-span-6 relative h-full hidden lg:block">
                    <div class="data-bg absolute top-0 left-0 w-full h-full bg-cover bg-no-repeat" data-bg="{{ $site_settings->site_header_logo_path }}"></div>
                </div>
                <div class="col-span-12 lg:col-span-6 md:w-[500px] mx-auto my-auto  pt-[50px] py-[60px] px-5 md:px-[60px]">
                    <div class="text-center">
                        <h4 class="text-[24px] mb-1">Login Now.</h4>
                        <p>Don't have an account? <span> <a href="register.html" class="text-theme">Sign Up</a> </span></p>
                    </div>
                    <div class="">
                        <a href="#" class="flex items-center justify-center space-x-3 border border-gray6 py-3 px-4 rounded-md hover:border-black">
                            <img src="/fonts/google.svg" alt="">
                            <span>Sign up with google</span>
                        </a>
                    </div>
                    <div class="my-6 flex items-center space-x-3">
                        <div class="h-px flex-1 bg-slate-200"></div>
                        <p class="mb-0">OR</p>
                        <div class="h-px flex-1 bg-slate-200"></div>
                    </div>
                    <div class="">
                        <form action="" method="POST">
                            @csrf
                            <div class="mb-5">
                                <p class="mb-0 text-base text-black">Email <span class="text-red">*</span></p>
                                <input name="email" class="input w-full h-[49px] rounded-md border border-gray6 px-6 text-base @error('email') border-red @enderror" type="email" placeholder="Enter Your Email">
                                @error('email')
                                    <span class="text-tiny w-full text-red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <p class="mb-0 text-base text-black">Password <span class="text-red">*</span></p>
                                <input name="password" class="input w-full h-[49px] rounded-md border border-gray6 px-6 text-base @error('password') border-red @enderror" type="password" placeholder="Password">
                                @error('password')
                                    <span class="text-tiny w-full text-red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="tp-checkbox flex items-start space-x-2 mb-3">
                                    <input name="remember" id="product-1" type="checkbox">
                                    <label for="product-1" class="text-tiny">Remember Me</label>
                                </div>
                                <div class="mb-4">
                                    <a href="{{ route('forgot') }}" class="text-tiny font-medium text-theme border-b border-transparent hover:border-theme">Forgot Password ?</a>
                                </div>
                            </div>
                            <button type="submit" class="tp-btn h-[49px] w-full justify-center">Sign In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
