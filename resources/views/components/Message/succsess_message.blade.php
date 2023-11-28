@if(session('accountName'))
<!-----
      add this code to this very first div:
      fixed inset-0 z-10
    -->
<div class="absolute z-10 w-full overflow-x-auto border-stone-500" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center px-4 pt-4 pb-20 text-center min- sm:block sm:p-0">
        <!--This is the background that overlays when the modal is active. It  has opacity, and that's why the background looks gray.-->
        <!-----
      add this code to this very first div:
      fixed inset-0
    -->
        <div class="transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:" aria-hidden="true">​</span>
        <!--Modal panel : This is where you put the pop-up's content, the div on top this coment is the wrapper -->
        <div class="inline-block p-5 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-2xl lg:p-16 sm:my-8 sm:align-middle sm:max-w-xl sm:w-full">
            <div>
                <div class="mt-3 text-left sm:mt-5">
                    <div class="py-6 text-center">
                        <p class="mb-8 text-2xl font-semibold leading-none tracking-tighter text-neutral-600">
                            アカウント登録が完了しました。
                        </p>
                        <p class="mt-1 text-sm text-gray-500">ログインボタンからログインしてRC-SETTINGをお楽しみください！</p>
                    </div>
                </div>
            </div>
            <div class="justify-between w-full mx-auto mt-4 overflow-hidden rounded-lg wt-10 sm:flex">
                <div class="flex flex-row w-full">
                    <a href="/rc-setting/login" class="flex items-center justify-center w-full px-4 py-4 text-lg font-bold text-white bg-blue-500 border border-transparent hover:bg-gray-800 sm:text-sm">
                        ログイン
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif


@if(session('succsess_message'))
<div class="p-2">
    <div class="p-1 font-bold text-center text-white bg-blue-500 text-normal rounded-xl">
        <p class="">
            {{ session('succsess_message') }}
        </p>
    </div>
</div>
@endif
