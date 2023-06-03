@extends('layouts.app')

@section('content')
<div class="body-content px-8 py-8 bg-slate-100">
    <div class="flex justify-between mb-10">
        <div class="page-title">
            <h3 class="mb-0 text-[28px]">Players</h3>
            <ul class="text-tiny font-medium flex items-center space-x-3 text-text3">
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('index') }}" class="text-hover-primary">Home</a>
                </li>
                <li class="breadcrumb-item flex items-center">
                    <span class="inline-block bg-text3/60 w-[4px] h-[4px] rounded-full"></span>
                </li>
                <li class="breadcrumb-item text-muted">Players</li>

            </ul>
        </div>
    </div>

    <!-- table -->
    <div class="bg-white rounded-t-md rounded-b-md shadow-xs py-4">
        <div class="tp-search-box flex items-center justify-between px-8 py-8">
            <div class="search-input relative">
                <input class="input h-[44px] w-full pl-14" type="text" placeholder="Search by Customer Name">
                <button class="absolute top-1/2 left-5 translate-y-[-50%] hover:text-theme">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 17C13.4183 17 17 13.4183 17 9C17 4.58172 13.4183 1 9 1C4.58172 1 1 4.58172 1 9C1 13.4183 4.58172 17 9 17Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M18.9999 19L14.6499 14.65" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </button>
            </div>
            <div class="flex justify-end space-x-6">
                {{-- <div class="search-select mr-3 flex items-center space-x-3 ">
                    <span class="text-tiny inline-block leading-none -translate-y-[2px]">Status : </span>
                    <select>
                        <option>Active</option>
                        <option>Banned</option>
                        <option>Pending</option>
                    </select>
                </div> --}}
                <div class="product-add-btn flex ">
                    <a href="#" class="tp-btn bg-info/10 text-info hover:text-white hover:bg-theme"> <span class="mr-2">
                            <svg width="15" height="15" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 512.056 512.056">
                                <path fill="currentColor" d="M426.635,188.224C402.969,93.946,307.358,36.704,213.08,60.37C139.404,78.865,85.907,142.542,80.395,218.303 C28.082,226.93-7.333,276.331,1.294,328.644c7.669,46.507,47.967,80.566,95.101,80.379h80v-32h-80c-35.346,0-64-28.654-64-64 c0-35.346,28.654-64,64-64c8.837,0,16-7.163,16-16c-0.08-79.529,64.327-144.065,143.856-144.144 c68.844-0.069,128.107,48.601,141.424,116.144c1.315,6.744,6.788,11.896,13.6,12.8c43.742,6.229,74.151,46.738,67.923,90.479 c-5.593,39.278-39.129,68.523-78.803,68.721h-64v32h64c61.856-0.187,111.848-50.483,111.66-112.339 C511.899,245.194,476.655,200.443,426.635,188.224z"></path>
                                <path fill="currentColor" d="M245.035,253.664l-64,64l22.56,22.56l36.8-36.64v153.44h32v-153.44l36.64,36.64l22.56-22.56l-64-64 C261.354,247.46,251.276,247.46,245.035,253.664z"></path>
                            </svg>
                        </span>
                        Export
                    </a>
                </div>
                <div class="product-add-btn flex ">
                    <a href="{{ route('players.create') }}" class="tp-btn">Add Player</a>
                </div>
            </div>
        </div>
        <div class="relative overflow-x-auto  mx-8">
            <table class="w-full text-base text-left text-gray-500">

                <thead class="bg-white">
                    <tr class="border-b border-gray6 text-tiny">
                        <th scope="col" class=" py-3 text-tiny text-text2 uppercase font-semibold w-[3%]">
                            <div class="tp-checkbox -translate-y-[3px]">
                                <input id="selectAllProduct" type="checkbox">
                                <label for="selectAllProduct"></label>
                            </div>
                        </th>
                        <th scope="col" class="pr-8 py-3 text-tiny text-text2 uppercase font-semibold w-[12%]">
                            ID
                        </th>
                        <th scope="col" class="px-3 py-3 text-tiny text-text2 uppercase font-semibold">
                            Full Name
                        </th>
                        <th scope="col" class="px-3 py-3 text-tiny text-text2 uppercase font-semibold text-end">
                            Email
                        </th>
                        <th scope="col" class="px-3 py-3 text-tiny text-text2 uppercase font-semibold w-[200px] text-end">
                            Status
                        </th>
                        <th scope="col" class="px-3 py-3 text-tiny text-text2 uppercase font-semibold w-[250px] text-end">
                            Join Date
                        </th>

                        <th scope="col" class="px-9 py-3 text-tiny text-text2 uppercase  font-semibold w-[12%] text-end">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        @include('players._player-card', ['user' => $user])
                    @endforeach
                </tbody>
            </table>
        </div>
        
        {{ $users->links('vendor.pagination.default') }}
    </div>
</div>
@endsection
