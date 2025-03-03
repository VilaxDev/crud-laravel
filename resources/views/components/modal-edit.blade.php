<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}Label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="{{ $id }}Label">{{ $label }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ $action }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    @foreach ($fields as $field)
                        <div class="mb-3">
                            <label for="{{ $field['name'] }}" class="form-label">{{ $field['label'] }}</label>

                            @if ($field['input_type'] === 'textarea')
                                <textarea class="form-control" id="{{ $field['name'] }}" name="{{ $field['name'] }}" required>{{ $field['value'] }}</textarea>
                            @else
                                <input type="{{ $field['input_type'] }}" class="form-control"
                                    id="{{ $field['name'] }}" name="{{ $field['name'] }}"
                                    value="{{ $field['value'] }}" required>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
