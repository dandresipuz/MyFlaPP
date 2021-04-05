<div class="tab-pane fade mt-3" id="residentials">
    <a class="btn btn-success" href="{{ url('admin/residentials/create') }}"><i class="fas fa-plus"></i> Agregar conjunto</a>
    <hr>
    <h1 class="container mt-2 text-center bg-dark text-white"><i class="far fa-building"></i> Conjuntos</h1>
    <table class="table table-hover table-striped container" id="tableId_Two">
        <thead>
            <tr>
                <th scope="col" onclick="srtTable(5)">Nombres <i class="fas fa-sort float-right"></i></th>
                <th scope="col" onclick="srtTable(4)">Descripción <i class="fas fa-sort float-right"></i></th>
                <th scope="col" onclick="srtTable(3)">Foto</th>
                <th scope="col" onclick="srtTable(2)">Teléfono <i class="fas fa-sort float-right"></i></th>
                <th scope="col" onclick="srtTable(1)">Dirección <i class="fas fa-sort float-right"></i></th>
                <th scope="col" onclick="srtTable(0)">Ciudad <i class="fas fa-sort float-right"></i></th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($residentials as $r)
                <tr>
                    <td>{{ $r->name }}</td>
                    <td>{{ $r->description }}</td>
                    <td><img src="{{ asset($r->photo) }}" width="36px"></td>
                    <td>{{ $r->phone }}</td>
                    <td>{{ $r->address }}</td>
                    <td>{{ $r->city }}</td>
                    <td>
                        <a href="{{ url('admin/residentials/' . $r->id) }}" class="btn btn-sm btn-light"><i
                                class="fa fa-search"></i></a>
                        <a href="{{ url('admin/residentials/' . $r->id . '/edit') }}" class="btn btn-sm btn-light"><i
                                class="fa fa-pen"></i></a>
                        <form action="{{ url('admin/residentials/' . $r->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-sm btn-danger btn-delete"><i
                                    class="fa fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
