@extends('layouts.master')


@section('styles')
<link rel="stylesheet" href="#">
@endsection

@Section('content')
{{-- <h1>This is user </h1> --}}


{{-- @if(1 == 1)
    Yes this is done!
@endif --}}


{{-- @if(1==2)
    This is if part
@elseif( 1==1)
    this is else part

@endif --}}


@if(1==2)
    This is if part
@else
    this is else part

@endif

@endsection



@section('scripts')
    <script>
        @json({{$b}}); // convert into json 
    </script>
@endsection