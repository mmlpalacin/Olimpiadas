@extends('layouts.app')
@section('title', 'Ajustes de Usuario')
@section('nav')
    @include('navigation-menu')
@endsection
@section('content')
    <p class="h5">{{$user->name}}</p>
    <table class="table">
        <form action="{{route('admin.users.update', $user)}}" method="post">
            @csrf
            @method('PUT')
                <thead>
                    <tr>
                        <th>Rol</th>
                        <th colspan="1"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            @foreach ($roles as $role)
                                <x-label for="role[]">{{$role->name}}
                                <input type="radio" name="role[]" value="{{ $role->id }}" @if($user->roles->contains($role->id)) checked @endif class="rm-1"></x-label>
                                <br>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td><x-button type="submit">Asignar</x-button></td>
                    </tr>
                </tfoot>
        </form>
    </table>
@endsection