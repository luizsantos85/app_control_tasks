@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Tarefas
                    <a href="{{route('task.create')}}" class="btn btn-primary text-light">Adicionar nova Tarefa</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Título</th>
                                <th scope="col">Data</th>
                                <th scope="col"></th>
                                <th scope="col"></th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tasks as $task)
                            <tr>
                                <th scope="row">{{$task->id}}</th>
                                <td>{{$task->tarefa}}</td>
                                <td>{{date('d/m/Y', strtotime($task->data_limite_conclusao))}}</td>
                                <td>
                                    <a href="{{route('task.edit', $task->id)}}">Editar</a>
                                </td>
                                <td>
                                    <form action="{{route('task.destroy', $task->id)}}" id="form_{{$task->id}}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" onclick="document.getElementById('form_{{$task->id}}').submit()">
                                            Excluir
                                        </a>
                                    </form>
                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td>Nenhuma tarefa cadastrada!</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                    <nav>
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="{{$tasks->previousPageUrl()}}">Voltar</a>
                            </li>
                            @for ($i = 1; $i <= $tasks->lastPage(); $i++)
                                <li class="page-item {{$tasks->currentPage() == $i ? 'active' : ''}}">
                                    <a class="page-link" href="{{$tasks->url($i)}}">{{$i}}</a>
                                </li>
                                @endfor
                                <li class="page-item">
                                    <a class="page-link" href="{{$tasks->nextPageUrl()}}">Avançar</a>
                                </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    let formId = document.getElementById('form_{{$task->id}}');
    
</script>