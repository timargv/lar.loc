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
								<a href="{{route('categories.create')}}" class="btn btn-success">Добавить</a>
							</div>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th width="60px">ID</th>
									<th>Название</th>
									<th>Описание</th>
									<th width="80px">Действия</th>
								</tr>
								</thead>
								<tbody>
								@foreach ($categories as $category)
									<tr>
										<td>{{$category->id}}</td>
										<td><a href="{{ route('categories.edit', $category->id) }}">{{$category->title}}</a></td>
										<td>{{$category->description}}</td>
										<td class="table_form"><a href="{{ route('categories.edit', $category->id) }}" class="fa fa-pencil"></a>

												{{Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete'])}}
												<button onclick="return confirm('Вы уверены?')" type="submit" class="fa fa-remove btn btn-default btn-xs delete"></button>
												{{Form::close()}}

										</td>
									</tr>
								@endforeach

								@if (count($categories) == null)
									<tr>
										<td colspan="5" align="center">
										Категорий не найдено
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
