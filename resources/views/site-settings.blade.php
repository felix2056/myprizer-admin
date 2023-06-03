@extends('layouts.app')

@section('content')
<div class="body-content px-8 py-8 bg-slate-100">
    <div class="flex justify-between mb-10">
        <div class="page-title">
            <h3 class="mb-0 text-[28px]">Site Settings</h3>
        </div>
    </div>

    <!-- content here -->

    <div class="bg-white rounded-md">
        <form id="site-setting-form" action="" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}

            <div class="px-6 md:px-10 py-7  border-b border-gray6 sm:flex justify-between items-center">
                <h5 class="text-lg mb-5 sm:mb-0">Basic Information</h5>
                <div class="sm:text-end">
                    <button class="tp-btn px-10 py-2">Save</button>
                </div>
            </div>
            <div class="px-0 md:px-10 py-10">
                <div class="grid grid-cols-12 px-6 py-6 gap-6">
                    <div class="col-span-12 sm:col-span-5 lg:col-span-4">
                        <h6 class="mb-1">Site Information</h6>
                        <p class="mb-0 leading-[18px] text-tiny">Recommended to include relevant keywords and avoid using duplicate or spammy titles.</p>
                    </div>
                    <div class="col-span-12 sm:col-span-7 lg:col-span-8">
                        <div class="mb-3">
                            <label class="text-black">Site Header Logo</label>
                            <div class="text-center @error('site_header_logo') border-red @enderror">
                                <img id="siteHeaderLogo-display" class="w-[100px] h-auto mx-auto" src="{{ $site_settings->site_header_logo ?? '/images/upload.png' }}" alt="">
                            </div>
                            @error('site_header_logo')
                                <p class="text-red text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <span class="text-tiny text-center w-full inline-block mb-3">Image size must be less than 5Mb</span>
                            <div class="">
                                <input name="site_header_logo" type="file" id="siteHeaderLogo" class="hidden">
                                <label for="siteHeaderLogo" class="text-tiny w-full inline-block py-1 px-4 rounded-md border border-gray6 text-center hover:cursor-pointer hover:bg-theme hover:text-white hover:border-theme transition">Upload Image</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="text-black">Site Footer Logo</label>
                            <div class="text-center @error('site_footer_logo') border-red @enderror">
                                <img id="siteFooterLogo-display" class="w-[100px] h-auto mx-auto" src="{{ $site_settings->site_footer_logo ?? '/images/upload.png' }}" alt="">
                            </div>
                            @error('site_footer_logo')
                                <p class="text-red text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <span class="text-tiny text-center w-full inline-block mb-3">Image size must be less than 5Mb</span>
                            <div class="">
                                <input name="site_footer_logo" type="file" id="siteFooterLogo" class="hidden">
                                <label for="siteFooterLogo" class="text-tiny w-full inline-block py-1 px-4 rounded-md border border-gray6 text-center hover:cursor-pointer hover:bg-theme hover:text-white hover:border-theme transition">Upload Image</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="text-black">Site Name</label>
                            <input name="site_name" type="text" class="input rounded-md h-11 w-full border border-gray6 text-black" value="{{ $site_settings->site_name }}">
                            @error('site_name')
                                <p class="text-red text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="">
                            <label class="text-black">Description</label>
                            <textarea name="site_description" class="input py-4 rounded-md h-[200px] resize-none w-full border border-gray6 text-black @error('site_description') border-red @enderror">{{ $site_settings->site_description }}</textarea>
                            @error('site_description')
                                <p class="text-red text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-12 px-6 py-6 gap-6 items-center">
                    <div class="col-span-12 sm:col-span-5 lg:col-span-4">
                        <h6 class="mb-0">Site URL</h6>
                    </div>
                    <div class="col-span-12 sm:col-span-7 lg:col-span-8">
                        <div class="">
                            <input name="site_url" type="text" class="input rounded-md h-11 w-full border border-gray6 text-black @error('site_url') border-red @enderror" placeholder="https://siteurl.com" value="{{ $site_settings->site_url }}">
                            @error('site_url')
                                <p class="text-red text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-12 px-6 py-6 gap-6 items-center">
                    <div class="col-span-12 sm:col-span-5 lg:col-span-4">
                        <h6 class="mb-0">Site Email</h6>
                    </div>
                    <div class="col-span-12 sm:col-span-7 lg:col-span-8">
                        <div class="">
                            <input name="site_email" type="text" class="input rounded-md h-11 w-full border border-gray6 text-black @error('site_email') border-red @enderror" placeholder="Email" value="{{ $site_settings->site_email }}">
                            @error('site_email')
                                <p class="text-red text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-12 px-6 py-6 gap-6 items-center">
                    <div class="col-span-12 sm:col-span-5 lg:col-span-4">
                        <h6 class="mb-0">Default Currency</h6>
                    </div>
                    <div class="col-span-12 sm:col-span-7 lg:col-span-8">
                        <div class="currency-format-select select-bordered">
                            <select name="site_currency" class="@error('site_currency') border-red @enderror">
                                <option value="USD" {{ $site_settings->site_currency == 'usd' ? 'selected' : '' }}>
                                    US Dollar
                                </option>
                                <option value="CAD" {{ $site_settings->site_currency == 'cad' ? 'selected' : '' }}>
                                    Canadian Dollar
                                </option>
                                <option value="AUD" {{ $site_settings->site_currency == 'aud' ? 'selected' : '' }}>
                                    Australian Dollar
                                </option>
                                <option value="GBP" {{ $site_settings->site_currency == 'gbp' ? 'selected' : '' }}>
                                    British Pound
                                </option>
                                <option value="EUR" {{ $site_settings->site_currency == 'eur' ? 'selected' : '' }}>
                                    Euro
                                </option>
                                <option value="AED" {{ $site_settings->site_currency == 'aed' ? 'selected' : '' }}>
                                    Emirati Dirham
                                </option>
                            </select>
                            @error('site_currency')
                                <p class="text-red text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-12 px-6 py-6 gap-6 items-center">
                    <div class="col-span-12 sm:col-span-5 lg:col-span-4">
                        <h6 class="mb-0">Date Format</h6>
                    </div>
                    <div class="col-span-12 sm:col-span-7 lg:col-span-8">
                        <div class="date-format-select select-bordered">
                            <select>
                                <option value="">DD/MM/YY</option>
                                <option value="">MM/DD/YY</option>
                                <option value="">YY/MM/DD</option>
                                <option value="">YY/DD/MM</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-12 px-6 py-6 gap-6">
                    <div class="col-span-12 sm:col-span-5 lg:col-span-4">
                        <h6 class="mb-1">Supported Payment Methods</h6>
                        <p class="mb-0 leading-[18px] text-tiny">Select Payment methods to show on website.</p>
                    </div>
                    <div class="col-span-12 sm:col-span-7 lg:col-span-8">
                        <div class="flex flex-col space-y-5">
                            <div class="tp-checkbox flex items-center">
                                <input id="paypal" type="checkbox">
                                <label for="paypal"><img class="w-[44px] h-[25px] border border-gray6 mr-1" src="fonts/paypal.svg" alt=""> Paypal</label>
                            </div>
                            <div class="tp-checkbox flex items-center">
                                <input id="visa" type="checkbox">
                                <label for="visa"><img class="w-[44px] h-[25px] border border-gray6 mr-1" src="fonts/visa.svg" alt=""> Visa Card</label>
                            </div>
                            <div class="tp-checkbox flex items-center">
                                <input id="americanexpress" type="checkbox">
                                <label for="americanexpress"><img class="w-[44px] h-[25px] border border-gray6 mr-1" src="fonts/american-express.svg" alt=""> AmericanExpress</label>
                            </div>
                            <div class="tp-checkbox flex items-center">
                                <input id="mastercard" type="checkbox">
                                <label for="mastercard"><img class="w-[44px] h-[25px] border border-gray6 mr-1" src="fonts/mastercard.svg" alt=""> Master Card</label>
                            </div>
                            <div class="tp-checkbox flex items-center">
                                <input id="unionpay" type="checkbox">
                                <label for="unionpay"><img class="w-[44px] h-[25px] border border-gray6 mr-1" src="fonts/unionpay.svg" alt=""> Union Pay</label>
                            </div>
                            <div class="tp-checkbox flex items-center">
                                <input id="discover" type="checkbox">
                                <label for="discover"><img class="w-[44px] h-[25px] border border-gray6 mr-1" src="fonts/discover.svg" alt=""> Discover</label>
                            </div>
                            <div class="tp-checkbox flex items-center">
                                <input id="bankTransfer" type="checkbox">
                                <label for="bankTransfer"><img class="w-[44px] h-[25px] border border-gray6 mr-1" src="fonts/bank.svg" alt=""> Bank Transfer</label>
                            </div>
                            <div class="tp-checkbox flex items-center">
                                <input id="cod" type="checkbox">
                                <label for="cod"><img class="w-[44px] h-[25px] border border-gray6 mr-1" src="fonts/cod.svg" alt=""> Cash On Delivery</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-12 px-6 py-6 gap-6 items-center">
                    <div class="col-span-12 sm:col-span-5 lg:col-span-4">
                        <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-span-12 sm:col-span-7 lg:col-span-8">
                        <div class="">
                            <input name="site_address" type="text" class="input rounded-md h-11 w-full border border-gray6 text-black" @error('site_address') border-red @enderror placeholder="Address" value="{{ $site_settings->site_address }}">
                            @error('site_address')
                                <p class="text-red text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-12 px-6 py-6 gap-6 items-center">
                    <div class="col-span-12 sm:col-span-5 lg:col-span-4">
                        <h6 class="mb-0">Post Code</h6>
                    </div>
                    <div class="col-span-12 sm:col-span-7 lg:col-span-8">
                        <div class="">
                            <input name="site_postcode" type="text" class="input rounded-md h-11 w-full border border-gray6 text-black @error('site_postcode') border-red @enderror" placeholder="Postcode" value="{{ $site_settings->site_postcode }}">
                            @error('site_postcode')
                                <p class="text-red text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-12 px-6 py-6 gap-6 items-center">
                    <div class="col-span-12 sm:col-span-5 lg:col-span-4">
                        <h6 class="mb-0">Keywords (comma-separated)</h6>
                    </div>
                    <div class="col-span-12 sm:col-span-7 lg:col-span-8">
                        <div class="">
                            <input name="site_keywords" type="text" class="input rounded-md h-11 w-full border border-gray6 text-black @error('site_keywords') border-red @enderror" placeholder="Keywords" value="{{ $site_settings->site_keywords }}">
                            @error('site_keywords')
                                <p class="text-red text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="text-end mt-5">
        <button onclick="document.getElementById('site-setting-form').submit()" class="tp-btn px-10 py-2">Save</button>
    </div>
</div>
@endsection

@section('scripts')
<script>
    window.addEventListener('load', function() {
        // add event listener to categories select box
        document.getElementById('siteHeaderLogo').addEventListener('change', function(e) {
            let file = e.target.files[0];
            let reader = new FileReader();

            reader.readAsDataURL(file);
            reader.onload = function(e) {
                document.getElementById('siteHeaderLogo-display').src = e.target.result;
            }
        });

        document.getElementById('siteFooterLogo').addEventListener('change', function(e) {
            let file = e.target.files[0];
            let reader = new FileReader();

            reader.readAsDataURL(file);
            reader.onload = function(e) {
                document.getElementById('siteFooterLogo-display').src = e.target.result;
            }
        });
    });
</script>    
@endsection
