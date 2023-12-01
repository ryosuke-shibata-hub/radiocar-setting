@extends('layouts.app')
@section('content')
@section('title', 'セッティング登録')
<script src="{{ asset('/static/js/upload_image.js') }}" defer></script>
<!-- component -->
<div class="flex items-center justify-center p-6">
    <div class="container max-w-screen-lg mx-auto">
        <div>
            <div class="p-4 px-4 mb-6 bg-white rounded shadow-lg md:p-8">
                <form action="/store/setting/mysetting" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="grid grid-cols-1 gap-4 text-sm gap-y-2 lg:grid-cols-3">
                        <div class="text-gray-600">
                            <p class="text-lg font-medium">DrivingScene</p>
                        </div>

                        <div class="lg:col-span-4">
                            <div class="grid grid-cols-1 gap-4 text-sm gap-y-2 md:grid-cols-5">
                                <div class="text-xs md:col-span-2">
                                    <label for="corse">コース・場所</label>
                                    <input type="text" name="corse" id="corse" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="" />
                                </div>

                                <div class="text-xs md:col-span-2">
                                    <label for="genre">ジャンル</label>
                                    <input type="text" name="genre" id="genre" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4 text-sm gap-y-2 lg:grid-cols-3">
                        <div class="text-gray-600">
                            <p class="text-lg font-medium">MainDetail</p>
                        </div>

                        <div class="lg:col-span-4">
                            <div class="grid grid-cols-1 gap-4 text-sm gap-y-2 md:grid-cols-5">
                                <div class="text-xs md:col-span-2">
                                    <label for="chassis">シャーシ</label>
                                    <input type="text" name="chassis" id="chassis" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="" />
                                </div>

                                <div class="text-xs md:col-span-2">
                                    <label for="transmitter">プロポ</label>
                                    <input type="text" name="transmitter" id="transmitter" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="" />
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
                                    <input type="text" name="amp" id="amp" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="" />
                                </div>

                                <div class="text-xs md:col-span-1">
                                    <label for="servo">サーボ</label>
                                    <input type="text" name="servo" id="servo" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="" />
                                </div>
                                <div class="text-xs md:col-span-1">
                                    <label for="gyro">ジャイロ</label>
                                    <input type="text" name="gyro" id="gyro" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="" />
                                </div>
                                <div class="text-xs md:col-span-1">
                                    <label for="motor">モーター</label>
                                    <input type="text" name="motor" id="motor" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="" />
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
                                    <input type="text" name="camber_f" id="camber_f" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="" />
                                </div>

                                <div class="text-xs md:col-span-1">
                                    <label for="camber_r">キャンバー/R</label>
                                    <input type="text" name="camber_r" id="camber_r" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="" />
                                </div>
                                <div class="text-xs md:col-span-1">
                                    <label for="toe_f">トー/F</label>
                                    <input type="text" name="toe_f" id="toe_f" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="" />
                                </div>
                                <div class="text-xs md:col-span-1">
                                    <label for="toe_r">トー/R</label>
                                    <input type="text" name="toe_r" id="toe_r" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="" />
                                </div>
                                <div class="text-xs md:col-span-1">
                                    <label for="height_f">車高/F</label>
                                    <input type="text" name="height_f" id="height_f" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="" />
                                </div>

                                <div class="text-xs md:col-span-1">
                                    <label for="height_r">車高/R</label>
                                    <input type="text" name="height_r" id="height_r" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="" />
                                </div>
                                <div class="text-xs md:col-span-1">
                                    <label for="caster_f">キャスター/F</label>
                                    <input type="text" name="caster_f" id="caster_f" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="" />
                                </div>
                                <div class="text-xs md:col-span-1">
                                    <label for="caster_r">キャスター/R</label>
                                    <input type="text" name="caster_r" id="caster_r" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="" />
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
                                    <input type="text" name="spur_gear" id="spur_gear" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="" />
                                </div>

                                <div class="text-xs md:col-span-1">
                                    <label for="pinion_gear">ピニオンギア</label>
                                    <input type="text" name="pinion_gear" id="pinion_gear" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="" />
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
                                    <input type="text" name="shock" id="shock" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="" />
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4 text-sm gap-y-2 md:grid-cols-4">
                                <div class="text-xs md:col-span-1">
                                    <label for="oil_f">オイル/F</label>
                                    <input type="text" name="oil_f" id="oil_f" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="" />
                                </div>
                                <div class="text-xs md:col-span-1">
                                    <label for="oil_r">オイル/R</label>
                                    <input type="text" name="oil_r" id="oil_r" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="" />
                                </div>
                                <div class="text-xs md:col-span-1">
                                    <label for="spring_f">スプリング/F</label>
                                    <input type="text" name="spring_f" id="spring_f" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="" />
                                </div>
                                <div class="text-xs md:col-span-1">
                                    <label for="spring_r">スプリング/R</label>
                                    <input type="text" name="spring_r" id="spring_r" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="" />
                                </div>
                                <div class="text-xs md:col-span-1">
                                    <label for="piston_f">ピストン/F</label>
                                    <input type="text" name="piston_f" id="piston_f" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="" />
                                </div>
                                <div class="text-xs md:col-span-1">
                                    <label for="piston_r">ピストン/R</label>
                                    <input type="text" name="piston_r" id="piston_r" class="w-full h-10 px-4 mt-1 border rounded bg-gray-50" value="" placeholder="" />
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
                                    placeholder=""
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
                                    <span class="pb-3 text-danger">※ファイルサイズは一枚最大5MB、4枚までアップロードが可能です。</span>
                                    <input id="fileImage" type="file" name="files[][upload_image]" class="w-full px-2 py-2 my-1 mr-3 leading-tight text-gray-700 appearance-none rouded-lg formInput" multiple accept="image/*">
                                    <input type="hidden" name="account_uuid" value="">
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
                            <div class="grid grid-cols-1 gap-1 pb-2 text-sm gap-y-2 md:grid-cols-1">
                                <div class="text-xs md:col-span-1">
                                    <label for="memo">セッティングの公開設定</label>
                                    <br>
                                    <select class="px-2 mt-3 border rounded bg-gray-50">
                                        <option class="" name="" value="">公開</option>
                                        <option class="" name="" value="">非公開</option>
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
