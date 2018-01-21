{{-- /**
 * Created by PhpStorm.
 * User: Pauk
 * Date: 21.01.2018
 * Time: 10:26
 */ --}}

 @extends('admin.layout')

 @section('content')
   <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
       <h1>
         Добавить пользователя
         <small>приятные слова..</small>
       </h1>
     </section>

     <!-- Main content -->
     <section class="content">

       <!-- Default box -->
       <div class="box">
         {!! Form::open(['route' => 'users.store', 'files' => true]) !!}
         <div class="box-header with-border">
           <h3 class="box-title">Добавляем пользователя</h3>
         </div>
         @include('admin.errors')
         <div class="box-body">
           <div class="col-md-6">
             <div class="form-group">
               <label for="exampleInputEmail1">Имя</label>
               <input type="text" class="form-control" id="exampleInputEmail1" placeholder="name" name="name" value="{{old('name')}}">
             </div>
             <div class="form-group">
               <label for="exampleInputEmail1">E-mail</label>
               <input type="text" class="form-control" id="exampleInputEmail1" placeholder="email" name="email" value="{{old('email')}}">
             </div>
             <div class="form-group">
               <label for="exampleInputEmail1">Пароль</label>
               <input type="password" class="form-control" id="exampleInputEmail1" placeholder="password" name="password" value="">
             </div>
             <div class="form-group">
               <label for="exampleInputFile">Аватар</label>
               <input type="file" id="exampleInputFile" name="avatar">

               <p class="help-block">Какое-нибудь уведомление о форматах..</p>
             </div>
         </div>
       </div>
         <!-- /.box-body -->
         <div class="box-footer">
           <div class="col-xs-12 clearfix">
             <a href="{{route('users.index')}}" class="btn btn-default">Назад</a>
            <button class="btn btn-success pull-right">Добавить</button>
          </div>
         </div>
         <!-- /.box-footer-->
         {!! Form::close() !!}
       </div>
       <!-- /.box -->

     </section>
     <!-- /.content -->
   </div>
 @endsection
