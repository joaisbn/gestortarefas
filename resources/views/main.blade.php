@extends('templates.main_layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="row aling-items center mb-3">
                    <div class="col">
                        <h4>Tarefas</h4>
                    </div>
                    <div class="col text-end">
                        <a class="btn btn-primary" href="{{ route('new_task') }}">
                            <i class="bi bi-plus-square me-2"></i>
                            Nova tarefa</a>
                    </div>
                </div>

                @if ($tasks->count() != 0)
                    <table class="table table-striped table-bordered" id="table_tasks" width="100%">
                        <thead class="table-dark">
                            <tr>
                                <th class="w-50">Tarefa</th>
                                <th class="w-25 text-center">Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                @else
                    <p class="text-center opacity-50 my-5">Não existem tarefas registradas</p>
                @endif
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#table_tasks').DataTable({
                data: @json($tasks),
                columns: [
                    { data: 'task_name' },
                    { data: 'task_status' },
                    { data: 'id' },
                ]
            });
        });
    </script>
@endsection
