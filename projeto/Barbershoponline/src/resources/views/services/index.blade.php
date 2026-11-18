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
                    <h5 class="card-title">Lista de serviços</h5>
                    <a href="{{ route('services.new') }}" class="btn btn-success">Novo Serviço</a>
                </div>
                <div class="card-body">
    
                <div class="table-responsive" style="overflow: hidden;">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>Nome </th>
                      <th>Preço </th>
                      <th>Status </th>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <td>{{ $service->name }}</td>
                                <td>{{ $service->price }}</td>
                                <td>
                                    @if ($service->status == 1 )
                                        Ativo
                                    @else
                                        Inativo
                                    @endif
                                    
                                </td>
                                <td class="text-right">
                                    <a href="{{ route('services.edit', $service->id) }}" class="btn btn-primary">Editar</a> 
                            
                                    <form action="{{ route('services.destroy' ,$service->id) }}" method="POST" class="d-inline">
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