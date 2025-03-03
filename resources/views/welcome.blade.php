@extends('layouts.app')
@section('content')
    <!-- Modal crear -->
    @include('components.modal-create', [
        'id' => 'createAnimalModal',
        'action' => route('animal.store'),
        'label' => 'Nuevo Animal',
        'fields' => [
            [
                'label' => 'Nombre',
                'input_type' => 'text',
                'name' => 'nombre',
                'placeholder' => 'Nombre del animal',
            ],
            ['label' => 'Especie', 'input_type' => 'text', 'name' => 'especie', 'placeholder' => 'Especie'],
            ['label' => 'Raza', 'input_type' => 'text', 'name' => 'raza', 'placeholder' => 'Raza'],
            ['label' => 'Color', 'input_type' => 'color', 'name' => 'color'],
            ['label' => 'Edad', 'input_type' => 'number', 'name' => 'edad', 'placeholder' => 'Edad'],
        ],
    ])

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <!-- Header section with more color -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold m-0"><span class="border-bottom border-3 border-black pb-1">Registro de
                            Animales</span></h2>
                    <button type="button" class="btn btn-sm btn-primary rounded-pill px-3 shadow-sm" data-bs-toggle="modal"
                        data-bs-target="#createAnimalModal">
                        <i class="bi bi-plus-lg"></i> Añadir
                    </button>
                </div>

                <!-- Card with subtle borders and more color -->
                <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                    <div class="card-header bg-primary bg-opacity-10 border-bottom border-primary border-opacity-25 py-3">
                        <h6 class="m-0 fw-bold text-white">Listado de animales</h6>
                    </div>
                    <div class="card-body p-0">
                        <table class="table mb-0">
                            <thead class="bg-light border-bottom">
                                <tr>
                                    <th scope="col" class="text-center ps-4 py-3">#</th>
                                    <th scope="col" class="py-3">Nombre</th>
                                    <th scope="col" class="py-3">Especie</th>
                                    <th scope="col" class="py-3">Raza</th>
                                    <th scope="col" class="py-3">Color</th>
                                    <th scope="col" class="text-center py-3">Edad</th>
                                    <th scope="col" class="text-end pe-4 py-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($animals as $animal)
                                    <tr class="align-middle border-bottom">
                                        <td class="text-center ps-4 py-3">{{ $animal->id }}</td>
                                        <td class="fw-medium py-3">{{ $animal->nombre }}</td>
                                        <td class="py-3">{{ $animal->especie }}</td>
                                        <td class="py-3">{{ $animal->raza }}</td>
                                        <td class="py-3">
                                            <div class="d-flex align-items-center">
                                                <div class="color-dot me-2"
                                                    style="background-color: {{ $animal->color }}; width: 20px; height: 20px; border-radius: 50%; display: inline-block; border: 1px solid #e0e0e0;">
                                                </div>
                                                <span class="text-muted small">{{ $animal->color }}</span>
                                            </div>
                                        </td>
                                        <td class="text-center py-3">{{ $animal->edad }}</td>
                                        <td class="text-end pe-4 py-3">
                                            <button type="button"
                                                class="btn btn-sm btn-outline-primary rounded-pill me-1 px-2 py-1"
                                                data-bs-toggle="modal" data-bs-target="#modalEdit{{ $animal->id }}">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <button type="button"
                                                class="btn btn-sm btn-outline-danger rounded-pill px-2 py-1"
                                                data-bs-toggle="modal" data-bs-target="#modalDelete{{ $animal->id }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal edit -->
                                    @include('components.modal-edit', [
                                        'id' => 'modalEdit' . $animal->id,
                                        'action' => route('animal.update', $animal->id),
                                        'label' => 'Editar Animal',
                                        'fields' => [
                                            [
                                                'label' => 'Nombre',
                                                'input_type' => 'text',
                                                'name' => 'nombre',
                                                'value' => $animal->nombre,
                                            ],
                                            [
                                                'label' => 'Especie',
                                                'input_type' => 'text',
                                                'name' => 'especie',
                                                'value' => $animal->especie,
                                            ],
                                            [
                                                'label' => 'Raza',
                                                'input_type' => 'text',
                                                'name' => 'raza',
                                                'value' => $animal->raza,
                                            ],
                                            [
                                                'label' => 'Color',
                                                'input_type' => 'color',
                                                'name' => 'color',
                                                'value' => $animal->color,
                                            ],
                                            [
                                                'label' => 'Edad',
                                                'input_type' => 'number',
                                                'name' => 'edad',
                                                'value' => $animal->edad,
                                            ],
                                        ],
                                    ])

                                    <!-- Modal delete -->
                                    @include('components.modal-delete', [
                                        'id' => 'modalDelete' . $animal->id,
                                        'action' => route('animal.destroy', $animal->id),
                                        'label' => 'Eliminar Animal',
                                        'text' => '¿Estas seguro de elminar este registro?',
                                    ])
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-5">
                                            <div class="py-4">
                                                <i class="bi bi-inbox fs-1 text-primary opacity-50"></i>
                                                <p class="mt-2 text-muted">No hay animales registrados</p>
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-primary rounded-pill mt-2"
                                                    data-bs-toggle="modal" data-bs-target="#createAnimalModal">
                                                    <i class="bi bi-plus-lg"></i> Agregar el primero
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination with subtle color -->
                <div class="d-flex justify-content-center mt-4">
                    <nav>
                        {{ $animals->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
