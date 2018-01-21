{{--/**
 * Created by PhpStorm.
 * User: Pauk
 * Date: 21.01.2018
 * Time: 10:25
 */--}}


@extends('admin.layout')

@section('content')
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Blank page
          <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Examples</a></li>
          <li class="active">Blank page</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="box">
              <div class="box-header">
                <h3 class="box-title">Листинг сущности</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="form-group">
                  <a href="{{route('users.create')}}" class="btn btn-success">Добавить</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="50px">ID</th>
                    <th width="100px">Имя</th>
                    <th >E-mail</th>
                    <th width="200px">Аватар</th>
                    <th width="80px">Действия</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($users as $user)
                      <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                          <img src="{{$user->getAvatar()}}" alt="" class="img-responsive" width="100">
                        </td>
                        <td class="table_form">
                            <a href="{{route('users.edit', $user->id)}}" class="fa fa-pencil"></a>

                            {{Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete'])}}
                            <button onclick="return confirm('Вы уверены?')" type="submit" class="fa fa-remove btn btn-default btn-xs delete"></button>
                            {{Form::close()}}

                        </td>
                      </tr>
                    @endforeach

                  </tfoot>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->
    </div>
@endsection
