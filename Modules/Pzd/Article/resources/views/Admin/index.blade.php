@extends('Panel::layouts.master')

@section('title', 'لیست مقالات')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="float-right">
                        <form method="get" id="create_article"
                              action="{{route('articles.create')}}">
                        </form>
                        <i onclick="event.preventDefault();document.getElementById('create_article').submit();" class="mdi mdi-folder-plus-outline mdi-24px"></i>
                    </div>
                    <h4 class="mt-0 header-title">لیست تمامی مقالات</h4>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>عکس مقالات</th>
                                    <th>عنوان مقالات</th>
                                    <th>وضعیت</th>
                                    <th>نوع</th>
                                    <th>زمان خوندن</th>
                                    <th>امتیاز</th>
                                    <th>دسته بندی</th>
                                    <th>کاربر</th>

                                    <th>تاریخ ساخت</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($articles as $article)
                                    <tr class="text-center">
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            <img src="{{ $article->imagePath }}" width="80">
                                        </td>
                                        <td>{{ $article->title }}</td>
                                        <td>
                                            <i class="mdi mdi-emoticon-{{$article->cssStatus()}}"></i>
                                        </td>
                                        <td>@lang($article->type)</td>
                                        <td>{{ $article->time_to_read }} دقیقه </td>
                                        <td>{{ $article->score }} امتیاز </td>
                                        <td>{{ $article->category->title }}</td>
                                        <td>{{ $article->user->name }}</td>
                                        <td>{{ jdate($article->created_at)->format('Y-m-d') }}</td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <form id="edit_user-{{$article->id}}" action="{{route('articles.edit', $article->id)}}">

                                            </form>
                                            <a><i  onclick="event.preventDefault();document.getElementById('edit_user-{{$article->id}}').submit()" class="mdi mdi-folder-edit-outline mr-1 mdi-18px"></i></a>


                                            <a><i onclick="event.preventDefault();document.getElementById('delete_user-{{$article->id}}').submit();" class="mdi mdi-folder-remove-outline mdi-18px"></i></a>
                                            <form method="POST" action="{{route('articles.destroy',$article->id)}}" id="delete_user-{{$article->id}}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
