<x-app-layout>

    {{-- Exibir mensagens de sucesso e erro --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Lista de Utilizadores</h5>
                    <a href="{{ route('users.new') }}" class="btn btn-success">Novo Utilizador</a>
                </div>
                <div class="card-body">
    
                <div class="table-responsive" style="overflow: hidden;">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Name
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                      </th>
                    </thead>
                    <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Editar</a> 
                                
                                        <form action="{{ route('users.destroy' ,$user->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Apagar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                  </table>
                </div>
                </div>
            </div>
        </div>
    </div>


    


</x-app-layout>