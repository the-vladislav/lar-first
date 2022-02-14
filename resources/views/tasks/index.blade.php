@extends('layouts.app')

@section('content')

    <a href="{{ route('tasks.create') }}" class="btn success">Create new task</a>

    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Текущая задача
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Заголовок таблицы -->
                    <thead>
                    <th>Task</th>
                    <th>&nbsp;</th>
                    </thead>

                    <!-- Тело таблицы -->
                    <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <!-- Имя задачи -->
                            <td class="table-text">
                                <div>{{ $task->name }}</div>
                            </td>

                            <!-- Кнопка Удалить -->
                            <td>
                                <form method="POST" action="{{ route('tasks.delete', $task->id) }}" >
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Удалить
                                    </button>
                                </form>
                            </td>

                            ///////////////////////////

                            <td>
                                <form method="POST" action="{{ route('tasks.edit', $task->id) }}" >
                                    {{ csrf_field() }}
                                    {{ method_field('GET') }}

                                    <button class="btn btn-warning">
                                        <i class="fa fa-trash"></i>Редактировать
                                    </button>
                                </form>
                            </td>

                            /////////////////////////////

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection