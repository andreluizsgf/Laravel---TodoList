@extends('layouts.panel')

@section('title', 'Gerenciar Tarefas')
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="/panel/js/plugins/datatables/dataTables.bootstrap4.css">
@endsection
@section('content')
<div class="card">
    <!-- /.card-header -->
    <div class="card-header">
        <a href="{{ route('panel.task.create') }}" class="btn btn-primary float-left" role="button">Adicionar
            Tarefa</a>
    </div>
    <div class="card-body">
        <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12">
                    <table id="datatable" class="table table-bordered table-hover dataTable" role="grid">
                        <thead>
                            <tr role="row">
                                <th>Descrição</th>
                                <th style="width:70px">Status</th>
                                <th style="width:150px">Data de Criação</th>
                                <th style="width:150px">Data de Finalização</th>
                                <th style="width:175px">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                            <tr>
                                <td>{{$task->description}}</td>
                                <td>{{$task->is_done_str}}</td>
                                <td>{{$task->created_at->format('Y-m-d')}}</td>
                                <td>{{$task->done_date}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{route('panel.task.edit', $task->id)}}">
                                        <i class="fa fa-pencil-alt white"></i> Finalizar
                                    </a>
                                    /
                                    <a class="btn btn-danger btn-sm" href="#" data-toggle="modal"
                                        data-target="#deleteRatificationModal-{{$task->id}}">
                                        <i class="fa fa-trash white"></i> Apagar
                                    </a>
                                </td>
                            </tr>
                            <div class=" modal fade" id="deleteRatificationModal-{{$task->id}}" role="dialog"
                                aria-labelledby="ratificationMsg" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="ratificationMsg">
                                                Confirmar exclusão
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            Quer mesmo deletar esta tarefa?
                                        </div>
                                        <div class="modal-footer">
                                            <form method="POST" action="{{ route('panel.task.destroy', $task->id ) }}">
                                                @method('DELETE') @csrf
                                                <button type="button" class="btn btn-primary"
                                                    data-dismiss="modal">Cancelar</button>
                                                <input type="submit" name="submit" value="Delete"
                                                    class='btn btn-danger'>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
@stop

@section('js')
<!-- DataTables -->
<script src="/panel/js/plugins/datatables/jquery.dataTables.js"></script>
<script src="/panel/js/plugins/datatables/dataTables.bootstrap4.js"></script>
<script>
    $(function () {
        $("#datatable").DataTable({
            "ordering": false,
            "language": {
                "info": "Mostrando _END_ de _MAX_ tarefas",
                "emptyTable": "Nenhuma tarefa cadastrada",
                "paginate": {
                    "next": "Próximo",
                    "previous": "Anterior"
                },
                "lengthMenu": "Mostrar _MENU_ Tarefas",
                "search": "Filtrar tarefas",
                "infoEmpty": "Mostrando 0 de 0 tarefas"

            }
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>
@stop
