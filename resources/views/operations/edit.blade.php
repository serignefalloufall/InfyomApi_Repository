@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Operation
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($operation, ['route' => ['operations.update', $operation->id], 'method' => 'patch']) !!}

                        @include('operations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection