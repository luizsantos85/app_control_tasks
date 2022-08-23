@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tarefas</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Título</th>
                                <th scope="col">Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tasks as $task)
                            <tr>
                                <th scope="row">{{$task->id}}</th>
                                <td>{{$task->tarefa}}</td>
                                <td>{{date('d/m/Y', strtotime($task->data_limite_conclusao))}}</td>
                            </tr>

                            @empty
                            <tr>
                                <td>Nenhuma tarefa cadastrada!</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection