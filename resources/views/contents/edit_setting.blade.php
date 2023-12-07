@extends('layouts.app')
@section('content')
@section('title', 'セッティング登録')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
<script src="{{ asset('/static/js/upload_image.js') }}" defer></script>
<!-- component -->
<div class="flex items-center justify-center p-6">
    <div class="container max-w-screen-lg mx-auto">
        <div>
            <div class="p-4 px-4 mb-6 bg-white rounded shadow-lg md:p-8">
                <div class="gap-4 py-3 text-lg text-center text-gray-700">
                    <span class="text-lg font-bold">
                        -セッティング登録-
                    </span>
                </div>
                <div class="grid grid-cols-1 gap-4 py-3 text-sm text-red-600 gap-y-2 lg:grid-cols-2">
                    <span class="font-medium">
                        ※「DrivingScene」「MainDetail」は必須項目です。
                    </span>
                </div>
                @include('components.Message.error_message')
                <form action="/rc-setting/store/setting/mysetting" method="POST" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" name="targetAccountId" value={{ Auth::user()->account_uuid }}>
                    <div class="grid grid-cols-1 gap-4 text-sm gap-y-2 lg:grid-cols-3">
                        <div class="text-gray-600">
                            <p class="text-lg font-medium">DrivingScene</p>
                        </div>

                        <div class="lg:col-span-4">
                            <div class="grid grid-cols-1 gap-4 text-sm gap-y-2 md:grid-cols-3">
                                <div class="text-xs md:col-span-1">
                                    <label for="corse">コース・場所</label>
                                    <input type="text" name="corse" id="corse" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="RC-SETTINGサーキット" />
                                </div>

                                <div class="text-xs md:col-span-1">
                                    <label for="genre">ジャンル</label>
                                    <select
                                        id="genre"
                                        name="genre"
                                        class="block w-full p-2 mt-1 text-sm text-gray-900 border border-gray-500 rounded bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected value="">----</option>
                                        <option
                                            name="genre"
                                            value="{{ config('const.RCSETTING.GENRE.ONROAD') }}">
                                            オンロード
                                        </option>
                                        <option
                                            name="genre"
                                            value="{{ config('const.RCSETTING.GENRE.OFFROAD') }}">
                                            オフロード
                                        </option>
                                        <option
                                            name="genre"
                                            value="{{ config('const.RCSETTING.GENRE.DRIFT') }}">
                                            ドリフト
                                        </option>
                                        <option
                                            name="genre"
                                            value="{{ config('const.RCSETTING.GENRE.OTHER') }}">
                                            その他
                                        </option>
                                    </select>
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
                                    <label for="chassis">シャーシ</label>
                                    <input type="text" name="chassis" id="chassis" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="TAMIYA TT-02" />
                                </div>
                                <div class="text-xs md:col-span-1">
                                    <label for="transmitter">プロポ</label>
                                    <input type="text" name="transmitter" id="transmitter" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="SANNWA M17" />
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
                                    <label for="amp">アンプ</label>
                                    <input type="text" name="amp" id="amp" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="G-Force BLC90" />
                                </div>

                                <div class="text-xs md:col-span-1">
                                    <label for="servo">サーボ</label>
                                    <input type="text" name="servo" id="servo" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="SANNWA PGS-CL2" />
                                </div>
                                <div class="text-xs md:col-span-1">
                                    <label for="gyro">ジャイロ</label>
                                    <input type="text" name="gyro" id="gyro" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="SANNWA SGS-02" />
                                </div>
                                <div class="text-xs md:col-span-1">
                                    <label for="motor">モーター</label>
                                    <input type="text" name="motor" id="motor" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="G-Force 神威" />
                                </div>
                                <div class="text-xs md:col-span-1">
                                    <label for="body">ボディ</label>
                                    <input type="text" name="body" id="body" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="TAMIYA GR86" />
                                </div>
                                <div class="text-xs md:col-span-1">
                                    <label for="other_1">Other</label>
                                    <input type="text" name="other_1" id="other_1" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="" />
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
                                    <label for="camber_f">キャンバー/F</label>
                                    <input type="text" name="camber_f" id="camber_f" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="-3" />
                                </div>

                                <div class="text-xs md:col-span-1">
                                    <label for="camber_r">キャンバー/R</label>
                                    <input type="text" name="camber_r" id="camber_r" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="-3" />
                                </div>
                                <div class="text-xs md:col-span-1">
                                    <label for="toe_f">トー/F</label>
                                    <input type="text" name="toe_f" id="toe_f" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="-3" />
                                </div>
                                <div class="text-xs md:col-span-1">
                                    <label for="toe_r">トー/R</label>
                                    <input type="text" name="toe_r" id="toe_r" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="0" />
                                </div>
                                <div class="text-xs md:col-span-1">
                                    <label for="height_f">車高/F/mm</label>
                                    <input type="text" name="height_f" id="height_f" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="10" />
                                </div>

                                <div class="text-xs md:col-span-1">
                                    <label for="height_r">車高/R/mm</label>
                                    <input type="text" name="height_r" id="height_r" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="8" />
                                </div>
                                <div class="text-xs md:col-span-1">
                                    <label for="caster_f">キャスター/F</label>
                                    <input type="text" name="caster_f" id="caster_f" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="5" />
                                </div>
                                <div class="text-xs md:col-span-1">
                                    <label for="caster_r">キャスター/R</label>
                                    <input type="text" name="caster_r" id="caster_r" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="0" />
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
                                    <label for="spur_gear">スパーギア</label>
                                    <input type="text" name="spur_gear" id="spur_gear" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="78" />
                                </div>

                                <div class="text-xs md:col-span-1">
                                    <label for="pinion_gear">ピニオンギア</label>
                                    <input type="text" name="pinion_gear" id="pinion_gear" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="18" />
                                </div>
                                <div class="text-xs md:col-span-1">
                                    <label for="other_2">Other</label>
                                    <input type="text" name="other_2" id="other_2" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="" />
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
                                    <label for="shock">ショック</label>
                                    <input type="text" name="shock" id="shock" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="TAMIYA TRFダンパー" />
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4 text-sm gap-y-2 md:grid-cols-4">
                                <div class="text-xs md:col-span-1">
                                    <label for="oil_f">オイル/F/#</label>
                                    <input type="text" name="oil_f" id="oil_f" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="30" />
                                </div>
                                <div class="text-xs md:col-span-1">
                                    <label for="oil_r">オイル/R/#</label>
                                    <input type="text" name="oil_r" id="oil_r" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="10" />
                                </div>
                                <div class="text-xs md:col-span-1">
                                    <label for="spring_f">スプリング/F</label>
                                    <input type="text" name="spring_f" id="spring_f" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="TAMIYA ハード（青）" />
                                </div>
                                <div class="text-xs md:col-span-1">
                                    <label for="spring_r">スプリング/R</label>
                                    <input type="text" name="spring_r" id="spring_r" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="TAMIYA ソフト（赤）" />
                                </div>
                                <div class="text-xs md:col-span-1">
                                    <label for="piston_f">ピストン/F</label>
                                    <input type="text" name="piston_f" id="piston_f" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="TRFチタンコードシャフト" />
                                </div>
                                <div class="text-xs md:col-span-1">
                                    <label for="piston_r">ピストン/R</label>
                                    <input type="text" name="piston_r" id="piston_r" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="TRFチタンコードシャフト" />
                                </div>
                                <div class="text-xs md:col-span-1">
                                    <label for="other_3">Other</label>
                                    <input type="text" name="other_3" id="other_3" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-1 text-sm gap-y-1 lg:grid-cols-1">
                        <div class="text-gray-600">
                            <p class="text-lg font-medium">SettingMemo</p>
                        </div>
                        <div class="lg:col-span-4">
                            <div class="grid grid-cols-1 gap-1 pb-2 text-sm gap-y-2 md:grid-cols-1">
                                <div class="text-xs md:col-span-1">
                                    <label for="memo">Memo</label>
                                    <textarea
                                    type="text"
                                    name="memo"
                                    id="memo"
                                    class="w-full h-full px-4 mt-1 border rounded bg-gray-50"
                                    value=""
                                    placeholder="etc..."
                                    style="height:200px;"
                                    ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4 text-sm gap-y-2 lg:grid-cols-3">
                        <div class="text-gray-600">
                            <p class="text-lg font-medium">Image</p>
                        </div>
                        <div class="lg:col-span-4">
                            <div class="grid grid-cols-1 gap-4 pb-2 text-sm gap-y-2 md:grid-cols-1">
                                <div class="text-xs md:col-span-1">
                                    <label for="fileImage">Photo</label>
                                    <br>
                                    <div class="flex items-center justify-center w-full">
                                        <label for="fileImage" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                </svg>
                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                            </div>
                                            <input id="fileImage" name="setting_image" type="file" class="hidden" />
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="lg:col-span-4">
                            <div class="grid grid-cols-1 gap-4 pb-2 text-sm gap-y-2 md:grid-cols-4">
                                <div class="text-xs md:col-span-1">
                                   <div class="md:flex row" id="preview"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-1 text-sm gap-y-1 lg:grid-cols-1">
                        <div class="text-gray-600">
                            <p class="text-lg font-medium">PublishingSettings</p>
                        </div>
                        <div class="lg:col-span-4">
                            <div class="grid grid-cols-1 gap-1 pb-2 text-sm gap-y-2 md:grid-cols-5">
                                <div class="text-xs md:col-span-1">
                                    <select
                                        id="countries"
                                        name="publish_setting_flg"
                                        class="block w-full p-2 mt-1 text-sm text-gray-900 border border-gray-500 rounded bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected value="">----</option>
                                        <option
                                            name="publish_setting_flg"
                                            value="{{ config('const.RCSETTING.PUBLISHSETTING.PUBLIC') }}">
                                            公開
                                        </option>
                                        <option
                                            name="publish_setting_flg"
                                            value="{{ config('const.RCSETTING.PUBLISHSETTING.PRIVATE') }}">
                                            非公開
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-5">
                        <div class="text-right">
                            <button
                                type="submit"
                                class="px-2 py-3 text-xs text-center text-blue-600 transition duration-500 ease-in-out transform border-2 border-gray-100 shadow-md rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                            >
                                セッティングを登録する
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
