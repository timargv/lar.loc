@extends('admin.layout')

@section('content')
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Добавить категорию
        <small>приятные слова..</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
				{!! Form::open(['route' => 'categories.store']) !!}
        <div class="box-header with-border">
          <h3 class="box-title">Добавляем категорию</h3>
        </div>
				@include('admin.errors')
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Название</label>
							<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Название категории" name="title">
							<br />
							<label for="exampleInputEmail2">Описание</label>
              <textarea class="form-control" rows="5" id="exampleInputEmail2" placeholder="Описание категории" name="description"></textarea>
            </div>
	        </div>
	      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-default">Назад</button>
          <button class="btn btn-success pull-right">Добавить</button>
        </div>
        <!-- /.box-footer-->
				{!! Form::close() !!}
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
@endsection
