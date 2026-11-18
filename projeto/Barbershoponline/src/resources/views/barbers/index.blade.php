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
                    <h5 class="card-title">Lista de Barbeiros</h5>
                    <a href="{{ route('barbers.new') }}" class="btn btn-success">Novo Barbeiro</a>
                </div>
                <div class="card-body">


    
                <div class="table-responsive" style="overflow: hidden;">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>Nome </th>
                      <th>Status </th>
                    </thead>
                    <tbody>
                        @foreach ($barbers as $barber)
                            <tr>
                                <td>{{ $barber->name }}</td>
                                <td>
                                    @if ($barber->status == 1 )
                                        Ativo
                                    @else
                                        Inativo
                                    @endif
                                    
                                </td>
                                <td class="text-right">
                                    <a href="{{ route('barbers.edit', $barber->id) }}" class="btn btn-primary">Editar</a> 
                            
                                    <form action="{{ route('barbers.destroy' ,$barber->id) }}" method="POST" class="d-inline">
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