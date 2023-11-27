@extends('layouts.app')
@section('content')
@section('title', 'アカウントセッティング')
<!-- component -->
<section>
    <div class="w-9/12 py-4 mx-auto">
        <div class="flex-wrap rounded-xl">
            <div class="justify-center order-first pl-5 font-bold text-gray-600 lg:block">
                <span>
                    アカウント情報
                </span>
            </div>
            <div class="w-full px-6 py-3">
                @include('components.Message.error_message')
                <form action="/rc-setting/user/update/account_data" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="py-5 mt-6 space-y-2 font-sans text-gray-600">
                        <div class="py-2">
                            <label for="account_img" class="text-sm">アカウントイメージ</label>
                            <img
                                alt="profil"
                                src={{ Storage::url(Auth::user()->account_logo) }}
                                class="object-cover w-24 h-24 border-4 border-gray-500 rounded-full dark:border-gray-800"
                            />
                            <input
                                type="file"
                                name="account_img"
                                id="account_img"
                                class="block w-full px-5 py-3 text-base placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg text-neutral-600 bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300"
                                required
                            >
                        </div>
                        <div class="py-2">
                            <label for="account_id" class="text-sm">アカウントID</label>
                            <input
                                type="text"
                                name="account_id"
                                id="account_id"
                                value={{ Auth::user()->account_id }}
                                class="block w-full px-5 py-3 text-base placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg text-neutral-600 bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300"
                                required
                                disabled
                            >
                        </div>
                        <div class="py-2">
                            <label for="account_name" class="text-sm">アカウント名</label>
                            <input
                                type="text"
                                name="account_name"
                                id="account_name"
                                value={{ Auth::user()->account_name }}
                                class="block w-full px-5 py-3 text-base placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg text-neutral-600 bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300"
                                required
                            >
                        </div>
                        <div class="py-2">
                            <label for="email" class="text-sm">メールアドレス</label>
                            <input
                                type="text"
                                name="email"
                                id="email"
                                value={{ Auth::user()->email }}
                                class="block w-full px-5 py-3 text-base placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg text-neutral-600 bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300"
                                required
                            >
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="px-10 py-2.5 text-xs font-medium text-center text-blue-600 transition duration-500 ease-in-out transform border-2 border-white shadow-md rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 ">
                            アカウント情報を保存
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="flex items-center">
            <div class="w-full border-t-2 border-gray-300"></div>
        </div>

        <div class="flex-wrap pt-5 rounded-xl">
            <div class="justify-center order-first pl-5 font-bold text-gray-600 lg:block">
                <span>
                    パスワード変更
                </span>
            </div>
            <div class="w-full px-6 py-3">
                @include('components.Message.error_message')
                <form action="/rc-setting/user/update/password" method="POST">
                    @csrf
                    <div class="py-5 mt-6 space-y-2 font-sans text-gray-600">
                        <div class="py-2">
                            <label for="current_password" class="text-sm">現在のパスワード</label>
                            <input
                                type="password"
                                name="current_password"
                                id="current_password"
                                class="block w-full px-5 py-3 text-base placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg text-neutral-600 bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300"
                                placeholder="現在のパスワードを入力してください。"
                                required
                            >
                        </div>
                        <div class="py-2">
                            <label for="new_password" class="text-sm">新しいパスワード</label>
                            <input
                                type="password"
                                name="new_password"
                                id="new_password"
                                class="block w-full px-5 py-3 text-base placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg text-neutral-600 bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300"
                                required
                                placeholder="新しいパスワードを入力してください。"
                            >
                        </div>
                        <div class="py-2">
                            <label for="new_password_confirm" class="text-sm">新しいパスワード(確認用)</label>
                            <input
                                type="password"
                                name="new_password_confirm"
                                id="new_password_confirm"
                                class="block w-full px-5 py-3 text-base placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg text-neutral-600 bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300"
                                required
                                placeholder="新しいパスワードと同じものを入力してください。"
                            >
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="px-10 py-2.5 text-xs font-medium text-center text-blue-600 transition duration-500 ease-in-out transform border-2 border-white shadow-md rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 ">
                            パスワードを変更する
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="flex items-center">
            <div class="w-full border-t-2 border-gray-300"></div>
        </div>

        <div class="flex-wrap pt-5 rounded-xl">
            <div class="justify-center order-first pl-5 font-bold text-gray-600 lg:block">
                <span>
                    アカウントの削除
                </span>
            </div>
            <div class="w-full px-6 py-3">
                @include('components.Message.error_message')
                <form action="/rc-setting/user/delete" method="POST">
                    @csrf
                    <div class="py-5 mt-6 space-y-2 font-sans text-gray-600">
                        <div class="py-2">
                            <span class="text-xs text-red-500">
                                ※アカウントを一度削除すると、再度アカウントを有効にすることはできません。また、保存したセッティングデータなども全て削除されます。
                            </span>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="px-10 py-2.5 text-center text-white font-bold transition duration-500 ease-in-out transform border-2 bg-red-600 border-white shadow-md rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 text-xs">
                            アカウントを削除する
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>
@endsection
