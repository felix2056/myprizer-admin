@extends('layouts.auth')

@section('content')
<div class="tp-main-wrapper h-screen">
    <div class="container mx-auto my-auto h-full flex items-center justify-center">
        <div class="w-[500px] mx-auto my-auto shadow-lg bg-white pt-[50px] py-[60px] px-[60px]">
            <div class="text-center">
                <h4 class="text-[24px] mb-1">Reset Password</h4>
                <p>Enter your email address to request password reset.</p>
            </div>
            <div class="">
                <form action="" method="POST">
                    @csrf
                    <div class="mb-5">
                        <p class="mb-0 text-base text-black">Email <span class="text-red">*</span></p>
                        <input name="email" class="input w-full h-[49px] rounded-md border border-gray6 px-6 text-base" type="email" placeholder="Enter Your Email">
                    </div>

                    <button type="submit" class="tp-btn h-[49px] w-full justify-center">Send Mail</button>

                    <div class="tp-checkbox flex items-start space-x-2 mt-5 justify-center">
                        <p class="mb-0 leading-none">Remember password ? <a href="{{ route('login') }}" class="text-theme border-b border-transparent hover:border-theme">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection