@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Typecompte
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('typecomptes.show_fields')
                    <a href="{{ route('typecomptes.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
