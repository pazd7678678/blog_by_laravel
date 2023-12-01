@extends('Panel::layouts.master')

@section('title' , 'لیست دسته بندی ها ')


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
               <div class="d-flex justify-content-between align-content-center-center">
                   <h4 class="mt-0 header-title">لیست دسته بندی ها</h4>

                  <form method="get" id="create_user"
                        action="{{route('categories.create')}}">
                  </form>
                   <i onclick="event.preventDefault();document.getElementById('create_user').submit();" class="mdi mdi-folder-plus-outline mdi-24px"></i>
               </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0 text-center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>عنوان دسته بندی</th>
                            <th>وضعیت</th>
                            <th>زیر دسته</th>
                            <th>کاربر </th>
                            <th>توضیحات</th>
                            <th>تاریخ ایجاد </th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$category->title}}</td>
                                <td>
                                    <i class="mdi mdi-emoticon-{{$category->status()}}">

                                    </i>
                                </td>
                                <td>
                                  {{$category->getSubCategory()}}
                                </td>
                                <td>{{$category->user->name}}</td>
                                <td>{{$category->description}}</td>
                                <td>
                                    {{jdate($category->created_at)->ago()}}
                                </td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <form id="edit_user-{{$category->id}}" action="{{route('categories.edit', $category->id)}}">

                                    </form>
                                    <a><i  onclick="event.preventDefault();document.getElementById('edit_user-{{$category->id}}').submit()" class="mdi mdi-folder-edit-outline mr-1 mdi-18px"></i></a>

                                    <form  id="change-status-{{$category->id}}" action="{{route('change.status', $category->id)}}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                    </form>
                                    <div class="spinner-border spinner-border-sm text-custom m-2"
                                         onclick="event.preventDefault();document.getElementById('change-status-{{$category->id}}').submit()"
                                         role="status">
                                        <span class="sr-only"></span>
                                    </div>

                                    <a><i onclick="event.preventDefault();document.getElementById('delete_user-{{$category->id}}').submit();" class="mdi mdi-folder-remove-outline mdi-18px"></i></a>
                                    <form method="POST" action="{{route('categories.destroy',$category->id)}}" id="delete_user-{{$category->id}}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>


                        @endforeach
                        </tbody>
                    </table>
                    {{$categories->links()}}
                </div>

            </div>

        </div>
    </div>

@endsection
