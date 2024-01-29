@extends('templates.main_layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h4>Nova tarefa</h4>
                <hr>
                <form action="{{ route('new_task_submit') }}" method="post">
                    @csrf
                    {{-- task name --}}
                    <div class="mb-3">
                        <label for="text_task_name" class="form-label">Nome da tarefa</label>
                        <input type="text" name="text_task_name" id="text_task_name" class="form-control"
                            placeholder="Nome da tarefa" required value="{{ old('text_task_name') }}">
                        @error('text_task_name')
                            <div class="text-warning">
                                {{ $errors->get('text_task_name')[0] }}
                            </div>
                        @enderror
                    </div>

                    {{-- task description --}}
                    <div class="mb-3">
                        <label for="text_task_description" class="form-label">Descrição da tarefa</label>
                        <textarea class="form-control" name="text_task_description" id="text_task_description" rows="5" required
                            value="{{ old('text_task_description') }}">{{ old('text_task_description') }}</textarea>
                        @error('text_task_description')
                            <div class="text-warning">
                                {{ $errors->get('text_task_description')[0] }}
                            </div>
                        @enderror
                    </div>

                    {{-- cancel or submit --}}
                    <div class="mb-3 text-center">
                        <a href="{{ route('index') }}" class="btn btn-dark px-5 m-1">
                            <i class="bi bi-x-circle me-2">Cancelar</i>
                        </a>

                        <button type="submit" class="btn btn-secondary px-5 m-1">
                            <i class="bi bi-floppy me-2">Guardar</i>
                        </button>
                    </div>
                </form>

                @if (session()->has('task_error'))
                    <div class="alert alert-danger text-center p-1">
                        {{ session()->get('task_error') }}
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
