@extends('Panel::layouts.master')

@section('title' , 'لیست مقام ها ')


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
               <div class="d-flex justify-content-between align-content-center-center">
                   <h4 class="mt-0 header-title">لیست مقام ها</h4>

                  <form method="get" id="create_user"
                        action="{{route('roles.create')}}">
                  </form>
                   <i onclick="event.preventDefault();document.getElementById('create_user').submit();" class="mdi mdi-account-plus-outline mdi-24px"></i>
               </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0 text-center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>عنوان مقام</th>
                            <th>دسترسی ها</th>
                            <th>تاریخ ایجاد </th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$role->name}}</td>
                                <td>
                                    @foreach($role->permissions as $permission)
                                       <span class="badge badge-success">
                                            @lang($permission->name)
                                       </span>
                                    @endforeach
                                </td>

                                <td>
                                    {{jdate($role->created_at)->ago()}}
                                </td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <form id="edit_user-{{$role->id}}" action="{{route('roles.edit', $role->id)}}">

                                    </form>
                                    <a><i  onclick="event.preventDefault();document.getElementById('edit_user-{{$role->id}}').submit()" class="mdi mdi-folder-edit-outline mr-1 mdi-18px"></i></a>

                                    <a><i onclick="event.preventDefault();document.getElementById('delete_user-{{$role->id}}').submit();" class="mdi mdi-folder-remove-outline mdi-18px"></i></a>
                                    <form method="POST" action="{{route('roles.destroy',$role->id)}}" id="delete_user-{{$role->id}}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>


                        @endforeach
                        </tbody>
                    </table>
                    {{$roles->links()}}
                </div>

            </div>

        </div>
    </div>

@endsection
