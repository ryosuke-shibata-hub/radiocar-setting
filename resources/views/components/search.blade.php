<div class="text-gray-600 body-font">
  <div class="container px-5 py-3 mx-auto">
    <div class="flex flex-wrap order-first text-center md:text-left">
      {{-- <div class="w-full px-4 lg:w-1/4 md:w-1/2">
        <h2 class="mb-3 text-sm font-medium tracking-widest text-gray-900 title-font">ジャンル</h2>
        <nav class="mb-10 list-none">
          <li>
            <a class="text-gray-600 hover:text-gray-800">First Link</a>
          </li>
          <li>
            <a class="text-gray-600 hover:text-gray-800">Second Link</a>
          </li>
          <li>
            <a class="text-gray-600 hover:text-gray-800">Third Link</a>
          </li>
        </nav>
      </div> --}}
      {{-- <div class="w-full px-4 lg:w-1/4 md:w-1/2"> --}}
        {{-- <h2 class="mb-3 text-sm font-medium tracking-widest text-gray-900 title-font">CATEGORIES</h2>
        <nav class="mb-10 list-none">
          <li>
            <a class="text-gray-600 hover:text-gray-800">First Link</a>
          </li>
          <li>
            <a class="text-gray-600 hover:text-gray-800">Second Link</a>
          </li>
          <li>
            <a class="text-gray-600 hover:text-gray-800">Third Link</a>
          </li>
          <li>
            <a class="text-gray-600 hover:text-gray-800">Fourth Link</a>
          </li>
        </nav> --}}
      {{-- </div> --}}
      <div class="w-full px-4 lg:w-4/6 md:w-1/2">
        <div class="flex flex-wrap items-end justify-center xl:flex-nowrap md:flex-nowrap lg:flex-wrap md:justify-end">
          <div class="relative w-40 mr-2 sm:w-auto xl:mr-4 lg:mr-0 sm:mr-4">
            <form action="/rc-setting/top/" method="GET">
                <input type="text" name="search" class="w-full px-2 mx-10 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:bg-transparent focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500" placeholder="キーワードを入力">
            </div>
            <button type="submit" class="inline-flex flex-shrink-0 px-4 py-4 ml-8 text-white bg-indigo-500 border-0 rounded lg:mt-2 xl:mt-0 focus:outline-none hover:bg-indigo-600"><i class="fa-solid fa-magnifying-glass"></i></button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
