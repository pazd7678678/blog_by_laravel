@extends('Panel::layouts.master')


@section('title' , 'لیست نظرات کاربران')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <div class="d-flex justify-content-between align-content-center-center">
                    <h4 class="mt-0 header-title">لیست نظرات کاربران</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0 text-center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>وضعیت</th>
                            <th>برای</th>
                            <th>پاسخ ها</th>
                            <th>تعداد پاسخ ها</th>
                            <th>کاربر </th>
                            <th>کامنت</th>
                            <th>تاریخ ایجاد </th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>

                                <td>
                                    <i class="mdi mdi-emoticon-{{$comment->getStatusComment()}}">

                                    </i>
                                </td>
                                <td>
                                    {{ $comment->commentable->title }}
                                </td>
                                <td>
                                    @foreach($comment->comments() as $com)
                                        <div>{{$com->body}}</div>
                                    @endforeach
                                </td>
                                <td>{{$comment->comments->count()}}</td>
                                <td>{{$comment->user->name}}</td>
                                <td>{{$comment->body}}</td>
                                <td>
                                    {{jdate($comment->created_at)->ago()}}
                                </td>
                                <td class="d-flex justify-content-center align-items-center">

                                    <form  id="change-status-{{$comment->id}}" action="{{route('comments.change.status',[ 'id'=>$comment->id,'status'=> $comment->status])}}"
                                           method="POST">
                                        @csrf
                                        @method('PATCH')
                                    </form>
                                    <div class="spinner-border spinner-border-sm text-custom m-2"
                                         onclick="event.preventDefault();document.getElementById('change-status-{{$comment->id}}').submit()"
                                         role="status">
                                        <span class="sr-only"></span>
                                    </div>

                                    <a><i onclick="event.preventDefault();document.getElementById('delete_user-{{$comment->id}}').submit();"
                                          class="mdi mdi-folder-remove-outline mdi-18px"></i></a>
                                    <form  method="POST" action="{{route('comments.destroy',$comment->id)}}" id="delete_user-{{$comment->id}}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>


                        @endforeach
                        </tbody>
                    </table>
                    {{$comments->links()}}
                </div>

            </div>

        </div>
    </div>

@endsection
