@extends('layouts.app')
@section('content')
@section('title', 'ユーザーページ')
<div class="px-16" style="min-height: 500px">
    <div class="px-10 mx-auto bg-white shadow-lg w-100 rounded-2xl dark:bg-gray-800">
        @include('components.Message.succsess_message')
        @include('components.Message.error_message')
        <div class="w-full mb-4 rounded-t-lg h-28"></div>
        <div class="flex flex-col items-center justify-center p-4 -mt-16">
            <img
                alt="profil"
                src="{{ Storage::url($targetUser->account_logo) }}"
                class="object-cover w-24 h-24 mx-auto border-4 border-gray-500 rounded-full dark:border-gray-800"
            />
            <p class="mt-2 text-xl font-medium text-gray-800 dark:text-white">
                {{ $targetUser->account_name }}
            </p>
            <p class="mb-4 text-xs text-gray-400">
                {{ $targetUser->account_id }}
            </p>
            <p class="p-2 px-4 text-xs text-gray-800 rounded-full">
                {{ $targetUser->comment }}
            </p>
            <div class="w-full p-2 mt-4 rounded-lg">
                <div class="flex items-center justify-end text-sm text-gray-600 dark:text-gray-200">
                    @if(Auth::check() && Auth::user()->account_uuid === $targetUser->account_uuid)
                        <p class="flex flex-col pr-5">
                            <a href="/rc-setting/mypage/account/setting"
                                class="items-center block px-5 py-3 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-blue-600 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                            >
                                編集<i class="fa-solid fa-gears"></i>
                            </a>
                        </p>
                    @endif
                    <p class="flex flex-col pr-5">
                        <a href="">
                            Follows
                        </a>
                        <span class="font-bold text-black dark:text-white">
                            12
                        </span>
                    </p>
                    <p class="flex flex-col">
                        <a href="" class="">
                            Followers
                        </a>
                        <span class="font-bold text-black dark:text-white">
                            55
                        </span>
                    </p>
                </div>
            </div>
        </div>
        <div class="w-ful">
            <div class="relative right-0">
                <ul
                    class="relative flex flex-wrap p-1 list-none rounded-xl "
                    data-tabs="tabs"
                    role="list"
                >
                    <li class="z-30 flex-auto text-center">
                        <a
                            class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-slate-700 aria-selected:bg-blue-500 aria-selected:text-white"
                            data-tab-target=""
                            active=""
                            role="tab"
                            aria-selected="true"
                            aria-controls="infomation"
                        >
                            <span class="ml-1">Infomation</span>
                        </a>
                    </li>
                    <li class="z-30 flex-auto text-center">
                        <a
                            class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-slate-700 aria-selected:bg-blue-500 aria-selected:text-white"
                            data-tab-target=""
                            role="tab"
                            aria-selected="false"
                            aria-controls="MySetting"
                        >
                            <span class="ml-1">MySetting</span>
                        </a>
                    </li>
                    <li class="z-30 flex-auto text-center">
                        <a
                            class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-slate-700 aria-selected:bg-blue-500 aria-selected:text-white"
                            data-tab-target=""
                            role="tab"
                            aria-selected="false"
                            aria-controls="FavoriteSetting"
                        >
                            <span class="ml-1">FavoriteSetting</span>
                        </a>
                    </li>
                </ul>
                <div data-tab-content="" class="p-5">
                    <div class="block opacity-100" id="infomation" role="tabpanel">
                        <p
                            class="block font-sans text-base antialiased font-light leading-relaxed text-center text-inherit text-blue-gray-500"
                        >
                            お知らせはまだありません...<i class="fa-regular fa-comment-dots"></i>
                        </p>
                    </div>
                    <div class="hidden opacity-0" id="MySetting" role="tabpanel">
                        @include('components.setting.setting_list')
                    </div>
                    <div class="hidden opacity-0" id="FavoriteSetting" role="tabpanel">
                        <p
                            class="block font-sans text-base antialiased font-light leading-relaxed text-center text-inherit text-blue-gray-500">
                            お気に入りのセッティング情報がありません...<i class="fa-regular fa-comment-dots"></i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/@material-tailwind/html@latest/scripts/tabs.js"></script>
@endsection
