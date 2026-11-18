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
                <h5 class="card-title">{{ ucfirst(\Carbon\Carbon::now()->locale('pt')->translatedFormat('l, d \d\e F \d\e Y')) }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive" style="overflow: hidden;">
                    <table class="table">
                        <thead class="text-primary">
                            <th>Nome</th>
                            <th>Data</th>
                        </thead>
                        <tbody>
                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->name }} {{ $appointment->surname }}</td>
                                    <td>{{ $appointment->availability->date }}</td>
                                    <td class="text-right">
                                    <!-- Botão para abrir o modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailsModal{{ $appointment->id }}">
                                            Ver detalhes
                                        </button>

                                        <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Apagar</button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Modal de Detalhes -->
                                    <div class="modal fade" id="detailsModal{{ $appointment->id }}" tabindex="-1" aria-labelledby="detailsModalLabel{{ $appointment->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="detailsModalLabel{{ $appointment->id }}">Detalhes da Marcação</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>Nome:</strong> {{ $appointment->name }}</p>
                                                    <p><strong>Sobrenome:</strong> {{ $appointment->surname }}</p>
                                                    <p><strong>Contacto:</strong> {{ $appointment->contact }}</p>
                                                    <p><strong>Barbeiro:</strong> {{ $appointment->barber->name }}</p>
                                                    <p><strong>Serviço:</strong> {{ $appointment->service->name }}</p>                                                  
                                                    <p><strong>Data:</strong> {{ $appointment->availability->date }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- Fim do Modal -->

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>