@extends('layouts.app')
@section('content')
@section('title', 'セッティング詳細')
<div class="">
    <a href="/rc-setting/userpage/{{ $targetSetting->account_id }}">
        {{ $targetSetting->account_name }}
    </a>
</div>
@endsection
