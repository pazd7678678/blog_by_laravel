@extends('Panel::layouts.master')


@section('title' ,'پنل مدیریتی')


@section('content')
    <div class="container-fluid">

          @include('Panel::parts.counter')
          @include('Panel::parts.latest_authors')
          @include('Panel::parts.latest_articles')


    </div>
@endsection
