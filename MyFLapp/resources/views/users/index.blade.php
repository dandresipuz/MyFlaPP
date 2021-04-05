<div class="tab-pane fade show active mt-3" id="users">
    <a class="btn btn-success" href="{{ url('admin/users/create') }}"><i class="fas fa-plus"></i> Agregar usuario</a>
    <hr>
    <h1 class="container mt-2 text-center bg-dark text-white"><i class="fas fa-users"></i> Usuarios</h1>
    <table class="table table-hover table-striped container" id="tableId">
        <thead>
            <tr>
                <th scope="col" onclick="sortTable(0)">Nombres <i class="fas fa-sort float-right"></i></th>
                <th scope="col" onclick="sortTable(1)">Apellidos <i class="fas fa-sort float-right"></i></th>
                <th scope="col" onclick="sortTable(2)">Correo <i class="fas fa-sort float-right"></i></th>
                <th scope="col" onclick="sortTable(3)">Rol <i class="fas fa-sort float-right"></i></th>
                <th scope="col" onclick="sortTable(4)">Foto</th>
                <th scope="col" onclick="sortTable(5)">Teléfono <i class="fas fa-sort float-right"></i></th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->lastname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td><img src="{{ asset($user->photo) }}" width="36px"></td>
                    <td>{{ $user->phone }}</td>
                    <td>
                        <a href="{{ url('admin/users/' . $user->id) }}" class="btn btn-sm btn-light"><i
                                class="fa fa-search"></i></a>
                        <a href="{{ url('admin/users/' . $user->id . '/edit') }}" class="btn btn-sm btn-light"><i
                                class="fa fa-pen"></i></a>
                        <form action="{{ url('admin/users/' . $user->id) }}" method="POST" class="d-inline">
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
    {{ $users->links('pagination::bootstrap-4') }}
</div>
