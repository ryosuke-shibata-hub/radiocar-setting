<div>
    @if($settingList->isEmpty())
        <p
            class="block font-sans text-base antialiased font-light leading-relaxed text-center text-inherit text-blue-gray-500"
        >
            投稿されたセッティング情報がありません...<i class="fa-regular fa-comment-dots"></i>
        </p>
    @else
        <section class="py-5 text-gray-600 body-font">
            @foreach($settingList as $setting_list)
                <div class="container px-5 mx-auto">
                    <div class="flex flex-col items-center mx-auto mb-3 border-b border-gray-200 pb-53 lg:w-3/5 sm:flex-row">
                        <div class="inline-flex items-center justify-center flex-shrink-0 w-20 h-20 sm:w-32 sm:h-32 sm:mr-10">
                            <img src="{{ Storage::url($setting_list->image_1) }}" class="rounded-lg">
                        </div>
                        <div class="flex-grow mt-6 text-center sm:text-left sm:mt-0">
                            <h2 class="text-sm font-medium text-right text-gray-900 title-font">
                                {{ Carbon\Carbon::parse($setting_list->update_date)->format('Y年m月d日') }}
                            </h2>
                            <h2 class="text-lg font-medium text-gray-900 title-font">
                                {{ $setting_list->chassis }}
                            </h2>

                            <p class="text-xs leading-relaxed">
                                <a href="">
                                    @if($setting_list->genre == 0)
                                        #オンロード
                                    @elseif($setting_list->genre == 1)
                                        #オフロード
                                    @elseif($setting_list->genre == 2)
                                        #ドリフト
                                    @else
                                        #その他
                                    @endif
                                </a>
                            </p>
                            <p class="mb-2">
                                <a href="/rc-setting/setting/{{ $setting_list->setting_id }}" class="inline-flex items-center mt-3 text-indigo-500">セッティング詳細
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </p>
                            <p class="text-right">
                                <a href="" class="text-sm"><i class="pr-1 fa-regular fa-heart"></i>3</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
    @endif
</div>
