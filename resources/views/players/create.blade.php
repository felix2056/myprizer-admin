@extends('layouts.app')

@section('content')
<div class="body-content px-8 py-8 bg-slate-100">
    <div class="flex justify-between mb-10">
        <div class="page-title">
            <h3 class="mb-0 text-[28px]">Create new Player</h3>
        </div>
    </div>

    <!-- content here -->

    <div class="">
        <form action="" method="POST">
            @csrf
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 2xl:col-span-8">
                    <div class="py-10 px-10 bg-white rounded-md">
                        <h5 class="text-xl mb-6">Basic Information</h5>

                        <div class="">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <div class="mb-5">
                                    <p class="mb-0 text-base text-black">First Name <span class="text-red">*</span></p>
                                    <input name="first_name" class="input w-full h-[49px] rounded-md border border-gray6 px-6 text-base text-black @error('first_name') border-red @enderror" type="text" placeholder="first name" value="{{ old('first_name') }}">
                                    @error('first_name')
                                        <p class="text-red text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-5">
                                    <p class="mb-0 text-base text-black">Last Name <span class="text-red">*</span></p>
                                    <input name="last_name" class="input w-full h-[49px] rounded-md border border-gray6 px-6 text-base text-black @error('last_name') border-red @enderror" type="text" placeholder="last name" value="{{ old('last_name') }}">
                                    @error('last_name')
                                        <p class="text-red text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-5">
                                <p class="mb-0 text-base text-black">Email <span class="text-red">*</span></p>
                                <input name="email" class="input w-full h-[49px] rounded-md border border-gray6 px-6 text-base text-black @error('email') border-red @enderror" type="email" placeholder="e-mail address" value="{{ old('email') }}">
                                @error('email')
                                    <p class="text-red text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <div class="mb-5">
                                    <p class="mb-0 text-base text-black">Password <span class="text-red">*</span></p>
                                    <input name="password" class="input w-full h-[49px] rounded-md border border-gray6 px-6 text-base text-black @error('password') border-red @enderror" type="password" placeholder="password">
                                    @error('password')
                                        <p class="text-red text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-5">
                                    <p class="mb-0 text-base text-black">Confirm Password <span class="text-red">*</span></p>
                                    <input name="password_confirmation" class="input w-full h-[49px] rounded-md border border-gray6 px-6 text-base text-black @error('password_confirmation') border-red @enderror" type="password" placeholder="confirm password">
                                    @error('password_confirmation')
                                        <p class="text-red text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <div class="mb-5">
                                    <p class="mb-0 text-base text-black">Phone </p>
                                    <input name="phone" class="input w-full h-[49px] rounded-md border border-gray6 px-6 text-base text-black @error('phone') border-red @enderror" type="text" placeholder="phone" value="{{ old('phone') }}">
                                    @error('phone')
                                        <p class="text-red text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-5 profile-gender-select select-bordered">
                                    <p class="mb-0 text-base text-black">Gender <span class="text-red">*</span></p>
                                    <select name="gender" class="@error('gender') border-red @enderror">
                                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>
                                            Male
                                        </option>
                                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>
                                            Female
                                        </option>
                                        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>
                                            Other
                                        </option>
                                    </select>
                                    @error('gender')
                                        <p class="text-red text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                                <div class="mb-5">
                                    <p class="mb-0 text-base text-black">Address Line 1 <span class="text-red">*</span></p>
                                    <input name="address1" class="input w-full h-[49px] rounded-md border border-gray6 px-6 text-base text-black @error('address1') border-red @enderror" type="text" placeholder="address line 1" value="{{ old('address1') }}">
                                    @error('address1')
                                        <p class="text-red text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div class="mb-5 profile-gender-select select-bordered">
                                    <p class="mb-0 text-base text-black">Address Line 2</p>
                                    <input name="address2" class="input w-full h-[49px] rounded-md border border-gray6 px-6 text-base text-black @error('address2') border-red @enderror" type="text" placeholder="address line 2" value="{{ old('address2') }}">
                                    @error('address2')
                                        <p class="text-red text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-5">
                                    <p class="mb-0 text-base text-black">City</p>
                                    <input name="city" class="input w-full h-[49px] rounded-md border border-gray6 px-6 text-base text-black @error('city') border-red @enderror" type="text" placeholder="city" value="{{ old('city') }}">
                                    @error('city')
                                        <p class="text-red text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                                <div class="mb-5 profile-gender-select select-bordered">
                                    <p class="mb-0 text-base text-black">State</p>
                                    <input name="state" class="input w-full h-[49px] rounded-md border border-gray6 px-6 text-base text-black @error('state') border-red @enderror" type="text" placeholder="state" value="{{ old('state') }}">
                                    @error('state')
                                        <p class="text-red text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-5 profile-gender-select select-bordered">
                                    <p class="mb-0 text-base text-black">Postcode</p>
                                    <input name="state" class="input w-full h-[49px] rounded-md border border-gray6 px-6 text-base text-black @error('postcode') border-red @enderror" type="text" placeholder="postcode" value="{{ old('postcode') }}">
                                    @error('postcode')
                                        <p class="text-red text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-5 profile-gender-select select-bordered">
                                    <p class="mb-0 text-base text-black">Country</p>
                                    <select name="country" class="@error('country') border-red @enderror">
                                        <option value="United States" {{ old('country') == 'United States' ? 'selected' : '' }}>United States</option>
                                        <option value="United Kingdom" {{ old('country') == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                                        <option value="Argentina" {{ old('country') == 'Argentina' ? 'selected' : '' }}>Argentina</option>
                                        <option value="Austria" {{ old('country') == 'Austria' ? 'selected' : '' }}>Austria</option>
                                        <option value="Australia" {{ old('country') == 'Australia' ? 'selected' : '' }}>Australia</option>
                                        <option value="Belgium" {{ old('country') == 'Belgium' ? 'selected' : '' }}>Belgium</option>
                                        <option value="Brazil" {{ old('country') == 'Brazil' ? 'selected' : '' }}>Brazil</option>
                                        <option value="Bulgaria" {{ old('country') == 'Bulgaria' ? 'selected' : '' }}>Bulgaria</option>
                                        <option value="Canada" {{ old('country') == 'Canada' ? 'selected' : '' }}>Canada</option>
                                        <option value="Chile" {{ old('country') == 'Chile' ? 'selected' : '' }}>Chile</option>
                                        <option value="Colombia" {{ old('country') == 'Colombia' ? 'selected' : '' }}>Colombia</option>
                                        <option value="Czech Republic" {{ old('country') == 'Czech Republic' ? 'selected' : '' }}>Czech Republic</option>
                                        <option value="Denmark" {{ old('country') == 'Denmark' ? 'selected' : '' }}>Denmark</option>
                                        <option value="Egypt" {{ old('country') == 'Egypt' ? 'selected' : '' }}>Egypt</option>
                                        <option value="Finland" {{ old('country') == 'Finland' ? 'selected' : '' }}>Finland</option>
                                        <option value="France" {{ old('country') == 'France' ? 'selected' : '' }}>France</option>
                                        <option value="Germany" {{ old('country') == 'Germany' ? 'selected' : '' }}>Germany</option>
                                        <option value="Greece" {{ old('country') == 'Greece' ? 'selected' : '' }}>Greece</option>
                                        <option value="Hong Kong" {{ old('country') == 'Hong Kong' ? 'selected' : '' }}>Hong Kong</option>
                                        <option value="Hungary" {{ old('country') == 'Hungary' ? 'selected' : '' }}>Hungary</option>
                                        <option value="India" {{ old('country') == 'India' ? 'selected' : '' }}>India</option>
                                        <option value="Indonesia" {{ old('country') == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                                        <option value="Italy" {{ old('country') == 'Italy' ? 'selected' : '' }}>Italy</option>
                                        <option value="Japan" {{ old('country') == 'Japan' ? 'selected' : '' }}>Japan</option>
                                        <option value="Malaysia" {{ old('country') == 'Malaysia' ? 'selected' : '' }}>Malaysia</option>
                                        <option value="Mexico" {{ old('country') == 'Mexico' ? 'selected' : '' }}>Mexico</option>
                                        <option value="New Zealand" {{ old('country') == 'New Zealand' ? 'selected' : '' }}>New Zealand</option>
                                        <option value="Netherlands" {{ old('country') == 'Netherlands' ? 'selected' : '' }}>Netherlands</option>
                                        <option value="Norway" {{ old('country') == 'Norway' ? 'selected' : '' }}>Norway</option>
                                        <option value="Pakistan" {{ old('country') == 'Pakistan' ? 'selected' : '' }}>Pakistan</option>
                                        <option value="Peru" {{ old('country') == 'Peru' ? 'selected' : '' }}>Peru</option>
                                        <option value="Philippines" {{ old('country') == 'Philippines' ? 'selected' : '' }}>Philippines</option>
                                        <option value="Poland" {{ old('country') == 'Poland' ? 'selected' : '' }}>Poland</option>
                                        <option value="Portugal" {{ old('country') == 'Portugal' ? 'selected' : '' }}>Portugal</option>
                                        <option value="Romania" {{ old('country') == 'Romania' ? 'selected' : '' }}>Romania</option>
                                        <option value="Russia" {{ old('country') == 'Russia' ? 'selected' : '' }}>Russia</option>
                                        <option value="Saudi Arabia" {{ old('country') == 'Saudi Arabia' ? 'selected' : '' }}>Saudi Arabia</option>
                                        <option value="Singapore" {{ old('country') == 'Singapore' ? 'selected' : '' }}>Singapore</option>
                                        <option value="South Africa" {{ old('country') == 'South Africa' ? 'selected' : '' }}>South Africa</option>
                                        <option value="South Korea" {{ old('country') == 'South Korea' ? 'selected' : '' }}>South Korea</option>
                                        <option value="Spain" {{ old('country') == 'Spain' ? 'selected' : '' }}>Spain</option>
                                        <option value="Sweden" {{ old('country') == 'Sweden' ? 'selected' : '' }}>Sweden</option>
                                        <option value="Switzerland" {{ old('country') == 'Switzerland' ? 'selected' : '' }}>Switzerland</option>
                                        <option value="Taiwan" {{ old('country') == 'Taiwan' ? 'selected' : '' }}>Taiwan</option>
                                        <option value="Thailand" {{ old('country') == 'Thailand' ? 'selected' : '' }}>Thailand</option>
                                        <option value="Turkey" {{ old('country') == 'Turkey' ? 'selected' : '' }}>Turkey</option>
                                        <option value="Ukraine" {{ old('country') == 'Ukraine' ? 'selected' : '' }}>Ukraine</option>
                                        <option value="United Arab Emirates" {{ old('country') == 'United Arab Emirates' ? 'selected' : '' }}>United Arab Emirates</option>
                                        <option value="Vietnam" {{ old('country') == 'Vietnam' ? 'selected' : '' }}>Vietnam</option>
                                    </select>
                                    @error('country')
                                        <p class="text-red text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="mb-5">
                                <p class="mb-0 text-base text-black">Bio </p>
                                <textarea class="input w-full h-[200px] py-4 rounded-md border border-gray6 px-6 text-base resize-none text-black" placeholder="Bio">Hi there, this is my bio...</textarea>
                            </div> --}}

                            <div class="text-end mt-5">
                                <button type="submit" class="tp-btn px-10 py-2">Create</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-span-12 2xl:col-span-4">
                    <div class="py-10 px-10 bg-white rounded-md mb-6">
                        <h5 class="text-xl mb-6">Notification</h5>

                        <div class="space-y-3 flex flex-col">
                            <div class="tp-checkbox flex items-center mb-3 sm:mb-0">
                                <input id="follows" type="checkbox">
                                <label for="follows">Like &amp; Follows Notifications</label>
                            </div>
                            <div class="tp-checkbox flex items-center mb-3 sm:mb-0">
                                <input id="comments" type="checkbox">
                                <label for="comments">Post, Comments &amp; Replies Notifications</label>
                            </div>
                            <div class="tp-checkbox flex items-center mb-3 sm:mb-0">
                                <input id="order" type="checkbox">
                                <label for="order">New Order Notifications</label>
                            </div>

                        </div>
                    </div>

                    {{-- <div class="py-10 px-10 bg-white rounded-md">
                        <h5 class="text-xl mb-6">Security</h5>

                        <div class="">
                            <div class="mb-5">
                                <p class="mb-0 text-base text-black">Current Passowrd</p>
                                <input class="input w-full h-[49px] rounded-md border border-gray6 px-6 text-base text-black" type="password" placeholder="Current Passowrd" value="123456">
                            </div>
                            <div class="mb-5">
                                <p class="mb-0 text-base text-black">New Passowrd</p>
                                <input class="input w-full h-[49px] rounded-md border border-gray6 px-6 text-base text-black" type="password" placeholder="New Password" value="123456">
                            </div>
                            <div class="mb-5">
                                <p class="mb-0 text-base text-black">Confirm Passowrd</p>
                                <input class="input w-full h-[49px] rounded-md border border-gray6 px-6 text-base text-black" type="password" placeholder="Confirm Password" value="123456">
                            </div>
                            <div class="text-end mt-5">
                                <button class="tp-btn px-10 py-2">Save</button>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </form>
    </div>

</div>
@endsection
