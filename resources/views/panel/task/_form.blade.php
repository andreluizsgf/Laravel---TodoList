<div class="card-body">
    <div class="form-group row">

        {!! Form::label('description', 'Descrição', ['class' => 'col-sm-1 control-label']) !!}
        <div class="col-sm-3 ">
            {!! Form::text('description',null,['class' => 'form-control input-jqv', 'id' => 'description', 'autocomplete' =>
            'username' ]) !!}
        </div>
        @error('name')
        <span class="invalid-feedback d-block"> {{ $message }} </span>
        @enderror        
    </div>
</div>

<div class="card-footer">
    <div class="box-footer">
        <a class="btn btn-danger float-right"
            href="{{ (auth()->user()->can('index', [App\User::class, auth()->user()])) ? route('panel.task.index') : route('panel.task.index') }}">Voltar</a> {!!
        Form::submit('Salvar',['class'
        => 'btn btn-primary pull-left']) !!}
    </div>
</div>
@section('css')
<link rel="stylesheet" href="/panel/js/plugins/jquery-ui/jquery-ui.min.css">
@endsection
@section('js_form')
<script type="text/javascript" src="/panel/js/via-cep.js"></script>
<script type="text/javascript" src="/panel/js/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
    $(document).ready(function() {
            // $("#form_id").validate();
            $('.datepicker').datepicker({
                dateFormat: 'dd/mm/yy',
                dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
                dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
                nextText: 'Próximo',
                prevText: 'Anterior'
            });
        });
</script>
@stop