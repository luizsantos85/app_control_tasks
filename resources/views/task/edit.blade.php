@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Atualizar Tarefa
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('task.update', $task->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Título</label>
                            <input type="text" name="tarefa" class="form-control" value='{{$task->tarefa}}'>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Data limite de conclusão</label>
                            <input type="date" name="data_limite_conclusao" class="form-control" value='{{$task->data_limite_conclusao}}'>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection