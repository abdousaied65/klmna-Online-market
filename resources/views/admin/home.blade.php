@extends('admin.layouts.master')
<style>
    .currency {
        font-size: 13px;
    }
</style>
@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

@endsection
