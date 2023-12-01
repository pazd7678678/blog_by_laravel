@extends('Panel::layouts.master')

@section('title' , 'لیست کاربران سایت')


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
               <div class="d-flex justify-content-between align-content-center-center">
                   <h4 class="mt-0 header-title">لیست کاربران</h4>

                  <form method="get" id="create_user"
                        action="{{route('users.create')}}">
                  </form>
                   <i onclick="event.preventDefault();document.getElementById('create_user').submit();" class="mdi mdi-account-plus-outline mdi-24px"></i>
               </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0 text-center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام و نام خانوادگی</th>
                            <th>ایمیل</th>
                            <th>مقام ها</th>
                            <th>وضعیت تایید ایمیل</th>
                            <th>تاریخ عضویت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <ul style="list-style: none">
                                        @foreach($user->roles as $role)
                                            <li>
                                                @lang($role->name)
                                                <i onclick="event.preventDefault();document.getElementById('destroy-role-{{$role->id}}').submit()"
                                                   class="mdi mdi-trash-can-outline"></i>
                                                <form id="destroy-role-{{$role->id}}" method="POST" action="{{route('users.destroy.role', ['UserId'=>$user->id ,'roleId'=> $role->id])}}">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                            </li>

                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <i class="mdi mdi-emoticon-{{$user->getStatusVerifyEmail()}}"></i>
                                </td>
                                <td>
                                    {{jdate($user->created_at)->ago()}}
                                </td>
                                <td>
                                    <form id="edit_user" action="{{route('users.edit', $user->id)}}">

                                    </form>
                                    <form id="add-role" action="{{route('users.add.role', $user->id)}}">

                                    </form>
                                    <a><i  onclick="event.preventDefault();document.getElementById('edit_user').submit()" class="mdi mdi-lead-pencil mr-1 mdi-18px"></i></a>
                                    <a><i  onclick="event.preventDefault();document.getElementById('add-role').submit()" class="mdi mdi-plus-circle-multiple-outline mr-1 mdi-18px"></i></a>
                                    <a><i onclick="event.preventDefault();document.getElementById('delete_user').submit();" class="mdi mdi-trash-can-outline mdi-18px"></i></a>
                                    <form method="POST" action="{{route('users.destroy', $user->id)}}" id="delete_user">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>


                        @endforeach
                        </tbody>
                    </table>
                    {{$users->links()}}
                </div>

            </div>

        </div>
    </div>

@endsection
