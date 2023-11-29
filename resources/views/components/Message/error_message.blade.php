@if(session('err_message'))
<div class="p-2">
    <div class="p-1 text-xs font-bold text-center text-white bg-red-500 rounded-xl">
        <p class="">
            {{ session('err_message') }}
        </p>
    </div>
</div>
@endif
@if ($errors->any() && session('err_message_password'))
 @foreach ($errors->all() as $error)
<div class="p-2">
    <div class="p-1 text-xs font-bold text-center text-white bg-red-500 rounded-xl">
        <p class="">
            {{ $error }}
        </p>
    </div>
</div>
@endforeach
@endif
