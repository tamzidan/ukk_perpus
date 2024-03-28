@extends('layouts.perpus')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">User</div>
                    <div class="card-header">
                        <div class="mb-4">
                            <a href="{{ route('users.create') }}" class="btn btn-primary">
                                + Tambah Pengguna</a>
                        </div>
                    </div>


                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-secondary" style="color: white">
                                <tr>
                                    <th class="px-1 py-2 text-center">Id</th>
                                    <th class="px-1 py-2 text-center">Nama</th>
                                    <th class="px-1 py-2 text-center">Email</th>
                                    <th class="px-1 py-2 text-center">Role</th>
                                    <th class="col-2 px-1 py-2 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $u)
                                    <tr>
                                        <td>{{ $u->id }}</td>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td>
                                            @foreach ($u->roles as $role)
                                                {{ $role->name }}
                                            @endforeach
                                        </td>
                                        <td>
                                            <form method="post" action="{{route('users.destroy', $u->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash"></i>    
                                                </button>
                                        
                                            <a class="btn btn-warning" href="{{route('users.edit', $u->id)}}">Edit</a>
                                        </td>
                                    </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection