{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: Pauk--}}
 {{--* Date: 21.01.2018--}}
 {{--* Time: 15:45--}}
 {{--*/--}}


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
                <a href="create.html" class="btn btn-success">Добавить</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Текст</th>
                  <th>Пользователь</th>
                  <th>ID Пост</th>
                  <th>Действия</th>
                </tr>
                </thead>
                <tbody>

                  @foreach ($comments as $comment)
                    <tr>
                      <td>{{ $comment->id }}}</td>
                      <td>{{ $comment->text }}</td>
                      <td>{{ $comment->user_id }}</td>
                      <td>{{ $comment->post_id }}</td>
                      <td>

                        <a href="edit.html" class="fa fa-thumbs-o-up">
                        </a> <a href="#" class="fa fa-remove"></a>

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
