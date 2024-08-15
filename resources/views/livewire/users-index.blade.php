<div>
    <div class="card-header">
        <br>
        <input type="text" wire:model.live="search" class="form-control" placeholder="Ingrese nombre de usuario o mail...">
        <br>
    </div>
    @if ($users->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th colspan="3"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td width="10px"><a class="btn btn-primary mr-2" href="{{route('admin.users.edit', $user)}}">editar</a></td>
                        <td width="10px">
                            <form action="{{route('admin.users.destroy', $user)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ml-2">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{$users->links()}}
        </div>    
        @else
        <strong>No hay alumnos con ese nombre o mail</strong>
    @endif
    </div>
