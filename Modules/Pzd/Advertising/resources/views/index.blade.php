@extends('Panel::layouts.master')

@section('title', 'لیست تبلیغات')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="float-right">
                        <form method="get" id="create_advertising"
                              action="{{route('advertisings.create')}}">
                        </form>
                        <i onclick="event.preventDefault();document.getElementById('create_advertising').submit();" class="mdi mdi-folder-plus-outline mdi-24px"></i>
                    </div>
                    <h4 class="mt-0 header-title">لیست تمامی تبلیغات</h4>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>عکس تبلیغ</th>
                                    <th>عنوان تبلیغ</th>
                                    <th>لوکیشن</th>
                                    <th>کاربر</th>
                                    <th>تاریخ ساخت</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($advertisings as $advertising)
                                    <tr class="text-center">
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            <img src="{{ $advertising->imagePath }}" width="80">
                                        </td>
                                        <td>{{ $advertising->title }}</td>
                                        <td>
                                            @lang($advertising->location)
                                        </td>
                                        <td>{{ $advertising->user->name }}</td>
                                        <td>{{ jdate($advertising->created_at)->format('Y-m-d') }}</td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <form id="edit_user-{{$advertising->id}}" action="{{route('advertisings.edit', $advertising->id)}}">

                                            </form>
                                            <a><i  onclick="event.preventDefault();document.getElementById('edit_user-{{$advertising->id}}').submit()" class="mdi mdi-folder-edit-outline mr-1 mdi-18px"></i></a>


                                            <a><i onclick="event.preventDefault();document.getElementById('delete_advertising-{{$advertising->id}}').submit();" class="mdi mdi-folder-remove-outline mdi-18px"></i></a>
                                            <form method="POST" action="{{route('advertisings.destroy',$advertising->id)}}" id="delete_advertising-{{$advertising->id}}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $advertisings->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
