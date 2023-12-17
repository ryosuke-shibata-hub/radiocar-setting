@extends('layouts.app')
@section('content')
@section('title', 'セッティング詳細')
<section class="text-gray-600 body-font">
    <div class="container flex flex-col px-5 py-5 mx-auto">
        <div class="mx-auto lg:w-4/6">
            <div class="py-5 pl-5 border-l-4">
                <p class="font-bold text-gray-500">セッティング詳細</p>
            </div>
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
                <p class="mb-4 text-lg leading-relaxed">SetingMemo</p>
                <p class="mb-4 text-sm leading-relaxed">{{ $targetSetting->memo ?? "セッティングのメモはありません..." }}</p>
                </div>
            </div>
            <div class="overflow-hidden rounded-lg">
                <div class="grid grid-cols-1 gap-4 text-sm gap-y-2 lg:grid-cols-3">
                    <div class="text-gray-600">
                        <p class="text-lg font-medium">DrivingScene</p>
                    </div>
                    <div class="lg:col-span-4">
                        <div class="grid grid-cols-1 gap-4 text-sm gap-y-2 md:grid-cols-3">
                            <div class="text-xs md:col-span-1">
                                <label>コース・場所</label>
                                <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="{{ $targetSetting->driving_scene }}" disabled />
                            </div>
                            <div class="text-xs md:col-span-1">
                                <label>ジャンル</label>
                                @if($targetSetting->genre === config('const.RCSETTING.GENRE.ONROAD'))
                                    <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="ONROAD" disabled />
                                @elseif($targetSetting->genre === config('const.RCSETTING.GENRE.OFFROAD'))
                                    <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="OFFROAD" disabled />
                                @elseif($targetSetting->genre === config('const.RCSETTING.GENRE.DRIFT'))
                                    <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="DRIFT" disabled />
                                @else
                                    <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="OTHER" disabled />
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4 text-sm gap-y-2 lg:grid-cols-3">
                    <div class="text-gray-600">
                        <p class="text-lg font-medium">MainDetail</p>
                    </div>

                    <div class="lg:col-span-4">
                        <div class="grid grid-cols-1 gap-4 text-sm gap-y-2 md:grid-cols-3">
                            <div class="text-xs md:col-span-1">
                                <label>シャーシ</label>
                                <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="{{ $targetSetting->chassis }}" disabled/>
                            </div>
                            <div class="text-xs md:col-span-1">
                                <label>プロポ</label>
                                <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="{{ $targetSetting->transmitter }}" disabled />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4 text-sm gap-y-2 lg:grid-cols-3">
                    <div class="text-gray-600">
                        <p class="text-lg font-medium">SubDetail</p>
                    </div>

                    <div class="lg:col-span-4">
                        <div class="grid grid-cols-2 gap-4 text-sm gap-y-2 md:grid-cols-5">
                            <div class="text-xs md:col-span-1">
                                <label>アンプ</label>
                                <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="{{ $targetSetting->amp ?: '-' }}" disabled/>
                            </div>

                            <div class="text-xs md:col-span-1">
                                <label>サーボ</label>
                                <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="{{ $targetSetting->servo ?: '-'  }}" disabled/>
                            </div>
                            <div class="text-xs md:col-span-1">
                                <label>ジャイロ</label>
                                <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="{{ $targetSetting->gyro ?: '-' }}" disabled/>
                            </div>
                            <div class="text-xs md:col-span-1">
                                <label>モーター</label>
                                <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="{{ $targetSetting->motor ?: '-' }}" disabled/>
                            </div>
                            <div class="text-xs md:col-span-1">
                                <label>ボディ</label>
                                <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="{{ $targetSetting->body ?: '-' }}" disabled/>
                            </div>
                            <div class="text-xs md:col-span-1">
                                <label>Other</label>
                                <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="{{ $targetSetting->other_1 ?: '-' }}" disabled/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4 text-sm gap-y-2 lg:grid-cols-3">
                    <div class="text-gray-600">
                        <p class="text-lg font-medium">CarSettingParameters</p>
                    </div>

                    <div class="lg:col-span-4">
                        <div class="grid grid-cols-2 gap-4 text-sm gap-y-2 md:grid-cols-4">
                            <div class="text-xs md:col-span-1">
                                <label>キャンバー/F</label>
                                <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="{{ $targetSetting->camber_f ?: '-' }}" disabled/>
                            </div>

                            <div class="text-xs md:col-span-1">
                                <label>キャンバー/R</label>
                                <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="{{ $targetSetting->camber_r ?: '-' }}" disabled/>
                            </div>
                            <div class="text-xs md:col-span-1">
                                <label>トー/F</label>
                                <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="{{ $targetSetting->toe_f ?: '-' }}" disabled/>
                            </div>
                            <div class="text-xs md:col-span-1">
                                <label>トー/R</label>
                                <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="{{ $targetSetting->toe_r ?: '-' }}" disabled/>
                            </div>
                            <div class="text-xs md:col-span-1">
                                <label>車高/F/mm</label>
                                <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="{{ $targetSetting->height_f ?: '-' }}" disabled/>
                            </div>

                            <div class="text-xs md:col-span-1">
                                <label>車高/R/mm</label>
                                <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="{{ $targetSetting->height_r ?: '-' }}" disabled/>
                            </div>
                            <div class="text-xs md:col-span-1">
                                <label>キャスター/F</label>
                                <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="{{ $targetSetting->caster_f ?: '-' }}" disabled/>
                            </div>
                            <div class="text-xs md:col-span-1">
                                <label>キャスター/R</label>
                                <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="{{ $targetSetting->caster_r ?: '-' }}" disabled/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4 text-sm gap-y-2 lg:grid-cols-3">
                    <div class="text-gray-600">
                        <p class="text-lg font-medium">Gear</p>
                    </div>
                    <div class="lg:col-span-4">
                        <div class="grid grid-cols-2 gap-4 text-sm gap-y-2 md:grid-cols-4">
                            <div class="text-xs md:col-span-1">
                                <label>スパーギア</label>
                                <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="{{ $targetSetting->spur_gear ?: '-' }}" disabled/>
                            </div>

                            <div class="text-xs md:col-span-1">
                                <label>ピニオンギア</label>
                                <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="{{ $targetSetting->pinion_gear ?: '-' }}" disabled/>
                            </div>
                            <div class="text-xs md:col-span-1">
                                <label>Other</label>
                                <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="{{ $targetSetting->other_2 ?: '-' }}" disabled/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4 text-sm gap-y-2 lg:grid-cols-3">
                    <div class="text-gray-600">
                        <p class="text-lg font-medium">Suspension</p>
                    </div>
                    <div class="lg:col-span-4">
                        <div class="grid grid-cols-1 gap-4 pb-2 text-sm gap-y-2 md:grid-cols-4">
                            <div class="text-xs md:col-span-1">
                                <label>ショック</label>
                                <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="{{ $targetSetting->shock ?: '-' }}" disabled/>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 text-sm gap-y-2 md:grid-cols-4">
                            <div class="text-xs md:col-span-1">
                                <label>オイル/F/#</label>
                                <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="{{ $targetSetting->oil_f ?: '-' }}" disabled/>
                            </div>
                            <div class="text-xs md:col-span-1">
                                <label>オイル/R/#</label>
                                <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="{{ $targetSetting->oil_r ?: '-' }}" disabled/>
                            </div>
                            <div class="text-xs md:col-span-1">
                                <label>スプリング/F</label>
                                <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="{{ $targetSetting->spring_f ?: '-' }}" disabled/>
                            </div>
                            <div class="text-xs md:col-span-1">
                                <label>スプリング/R</label>
                                <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="{{ $targetSetting->spring_r ?: '-' }}" disabled/>
                            </div>
                            <div class="text-xs md:col-span-1">
                                <label>ピストン/F</label>
                                <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="{{ $targetSetting->piston_f ?: '-' }}" disabled/>
                            </div>
                            <div class="text-xs md:col-span-1">
                                <label>ピストン/R</label>
                                <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="{{ $targetSetting->piston_r ?: '-' }}" disabled/>
                            </div>
                            <div class="text-xs md:col-span-1">
                                <label>Other</label>
                                <input class="w-full h-10 px-4 mt-1 text-black border rounded bg-gray-50" value="{{ $targetSetting->other_3 ?: '-' }}" disabled/>
                            </div>
                        </div>
                    </div>
                </div>
                @if($targetSetting->image_1)
                    <div class="grid grid-cols-1 gap-4 text-sm gap-y-2 lg:grid-cols-3">
                        <div class="w-full h-full pt-5 rounded">
                            <p class="text-lg font-medium">Image</p>
                            <img
                                alt="content"
                                class="w-full h-full rounded"
                                src={{ Storage::url($targetSetting->image_1) }} >
                        </div>
                    </div>
                @endif
            </div>
            @if(Auth::check() && $targetSetting->account_uuid == Auth::user()->account_uuid)
                <div class="flex justify-end pt-5 text-sm text-left">
                    <form action="" method="POST">
                        @csrf
                        <input type="hidden" name="targetSettingId" value="{{ $targetSetting->setting_id }}">
                        <button type="submit" class="px-3 py-3 text-xs text-left text-white transition duration-500 ease-in-out transform bg-blue-500 border-2 border-blue-100 shadow-md rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">編集<i class="pl-1 fa-solid fa-pen-to-square"></i></button>
                    </form>
                        <form action="/rc-setting/setting/delete" method="POST">
                        @csrf
                        <input type="hidden" name="targetSettingId" value="{{ $targetSetting->setting_id }}">
                        <button type="submit" class="px-3 py-3 text-xs text-left text-white transition duration-500 ease-in-out transform bg-red-500 border-2 border-red-100 shadow-md rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">削除<i class="pl-1 fa-solid fa-trash-can"></i></button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
