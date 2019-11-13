@extends('layouts.panel')

@section('title', 'Cadastro de Tasks')

@section('content')
@include('includes.alert')
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Cadastro de Task</h3>
    </div>
    {!! Form::open([
    'route' => 'panel.task.store',
    'files' => true,
    'class' => 'form-horizontal',
    'id' => 'form_id'
    ]) !!}
    @include('panel.task._form')
    {!! Form::close() !!}
</div>
@stop

@section('js')
    <script type="text/javascript" src="/vendor/jsvalidation/js/jsvalidation.js"></script>
    {!! JsValidator::formRequest('App\Http\Requests\User\StoreRequest', '#form_id'); !!}
@yield('js_form')
@endsection