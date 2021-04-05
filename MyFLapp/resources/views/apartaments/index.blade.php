<div class="tab-pane fade mt-3" id="apartaments">
    <a class="btn btn-success" href="{{ url('admin/apartaments/create') }}"><i class="fas fa-plus"></i> Agregar apartamento</a>
    <hr>
    <h1 class="container mt-2 text-center bg-dark text-white"><i class="fas fa-house-user"></i> Apartamentos
    </h1>
    <table class="table table-hover table-striped container" id="tableId_Three">
        <thead>
            <tr>
                <th scope="col" onclick="stTable(0)">Apto <i class="fas fa-sort"></i></th>
                <th scope="col" onclick="stTable(1)"class="d-none d-sm-table-cell">Descripción <i class="fas fa-sort float-right"></i></th>
                <th scope="col" onclick="stTable(2)"class="d-none d-sm-table-cell">Foto</th>
                <th scope="col" onclick="stTable(3)">Pecio <i class="fas fa-sort"></i></th>
                <th scope="col" onclick="stTable(4)">Disponible <i class="fas fa-sort"></i></th>
                <th scope="col" onclick="stTable(5)" class="d-none d-sm-table-cell">Conjunto <i class="fas fa-sort"></i></th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($apartaments as $index => $a)
                <tr>
                    <td>{{ $a->number }}</td>
                    <td class="d-none d-sm-table-cell">{{ $a->description }}</td>
                    <td class="d-none d-sm-table-cell"><img src="{{ asset($a->photo) }}" width="36px"></td>
                    <td>$ {{ $a->price }}</td>
                    <td>
                        @if ($a->active == 1)
                            <button class="btn btn-success"> <i class="fa fa-check"></i> Si </button>
                        @else
                            <button class="btn btn-dark"> <i class="fa fa-times"></i> No </button>
                        @endif
                    </td>
                    <td class="d-none d-sm-table-cell">{{ $a->residential->name }}</td>
                    <td>
                        <a href="{{ url('admin/apartaments/' . $a->id) }}" class="btn btn-sm btn-light"><i
                                class="fa fa-search"></i></a>
                        <a href="{{ url('admin/apartaments/' . $a->id . '/edit') }}" class="btn btn-sm btn-light"><i
                                class="fa fa-pen"></i></a>
                        <form action="{{ url('admin/apartaments/' . $a->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-sm btn-danger btn-delete"><i
                                    class="fa fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        {{-- {{ $apartaments->links('pagination::bootstrap-4') }} --}}
    </table>
</div>
