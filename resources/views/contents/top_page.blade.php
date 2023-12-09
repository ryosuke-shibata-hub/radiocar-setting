@extends('layouts.app')
@section('content')
@section('title', 'トップ')
<div class="" style="min-height: 500px">
    @include('components.Message.succsess_message')
    <div class="">
        @include('components.search')
        @include('components.setting.setting_list')
    </div>
</div>
@endsection
