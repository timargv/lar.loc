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
                <a href="{{route('tags.create')}}" class="btn btn-success">Добавить</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="60px">ID</th>
                  <th>Название</th>
                  <th width="80px">Действия</th>
                </tr>
                </thead>
                <tbody>

                  @foreach ($tags as $tag)
                    <tr>
                      <td>{{$tag->id}}</td>
                      <td><a href="{{route('tags.edit', $tag->id)}}">{{$tag->title}}</a></td>
                      <td class="table_form"><a href="{{ route('tags.edit', $tag->id) }}" class="fa fa-pencil"></a>

                          {{Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'delete'])}}
  												<button onclick="return confirm('Вы уверены?')" type="submit" class="fa fa-remove btn btn-default btn-xs delete"></button>
  												{{Form::close()}}

                      </td>
                    </tr>
                  @endforeach

                  @if (count($tags) == null)
                    <tr>
                      <td colspan="5" align="center">
                      Теги не найдены
                      </td>
                    </tr>
                  @endif

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
