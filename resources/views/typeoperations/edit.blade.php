@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Typeoperation
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($typeoperation, ['route' => ['typeoperations.update', $typeoperation->id], 'method' => 'patch']) !!}

                        @include('typeoperations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection