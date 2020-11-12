@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div id="app">
                @method('DELETE')
                <registro-rol route="{{route('rol.create')}}" token="{{csrf_token()}}"></registro-rol>
            </div>
        </div>
    </div>
</div>
@endsection
