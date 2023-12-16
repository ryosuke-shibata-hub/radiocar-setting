@extends('layouts.app')
@section('content')
@section('title', 'セッティング詳細')
{{-- <div class="">
    <a href="/rc-setting/userpage/{{ $targetSetting->account_uuid }}">
        {{ $targetSetting->account_name }}
    </a>
</div> --}}
<section class="text-gray-600 body-font">
    <div class="container flex flex-col px-5 py-24 mx-auto">
        <div class="mx-auto lg:w-4/6">
            <div class="flex flex-col mt-10 sm:flex-row">
                <div class="text-center sm:w-1/3 sm:pr-8 sm:py-8">
                    <a href="/rc-setting/userpage/?account_id={{ $targetSetting->account_id }}">
                        <div class="inline-flex items-center justify-center text-gray-400 bg-gray-200 rounded-full w-50 h-50">
                            <img class="w-40 h-40 rounded-full" src="{{ Storage::url($targetSetting->account_logo) }}" />
                        </div>
                        <div class="flex flex-col items-center justify-center text-center">
                            <h2 class="mt-4 text-lg font-medium text-gray-900 title-font">{{ $targetSetting->account_name }}</h2>
                            <div class="w-12 h-1 mt-2 mb-4 bg-indigo-500 rounded"></div>
                                <p class="text-base">
                                    {{ $targetSetting->comment }}
                                </p>
                        </div>
                    </a>
                </div>
                <div class="pt-4 mt-4 text-center border-t border-gray-200 sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l sm:border-t-0 sm:mt-0 sm:text-left">
                <p class="mb-4 text-lg leading-relaxed">セッティングメモ</p>
                <p class="mb-4 text-sm leading-relaxed">{{ $targetSetting->memo ?? "セッティングのメモはありません..." }}</p>
                </div>
            </div>
            <div class="h-64 overflow-hidden rounded-lg">
                <img alt="content" class="object-cover object-center w-full h-full" src="https://dummyimage.com/1200x500">
            </div>
        </div>
    </div>
</section>
@endsection
