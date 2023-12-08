@extends('layouts.app')
@section('content')
<div class="" style="min-height: 500px">
    @include('components.Message.succsess_message')
    <div class="hidden opacity-0" id="MySetting" role="tabpanel">
        @include('components.setting.setting_list')
    </div>
</div>
@endsection
