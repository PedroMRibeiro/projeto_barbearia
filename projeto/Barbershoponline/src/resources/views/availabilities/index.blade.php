<x-app-layout>
    <div class="row">
        <div class="col-md-12">

    @if ($errors->any())
            <div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 10px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Disponibilidades</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('availabilities.weekplan') }}" method="POST">
                        @csrf

                        <!-- Selecionar Barbeiro -->
                        <label for="barber">Selecione o Barbeiro:</label>
                        <select id="barber" name="barber_id" class="form-select mb-3" required>
                            <option value="" disabled selected>Escolha um barbeiro</option>
                            <option value="1">Henrique</option>
                            <option value="2">Matos</option>
                        </select>

                        <p></p>

                        <!-- Selecionar Semana -->
                        <label for="week">Selecione uma Semana:</label>
                        <input type="week" id="week" name="week" required>

                        <!-- Dias de Trabalho -->
                        <div class="d-flex flex-wrap gap-3 mt-3">
                            @foreach($workingDays as $index => $day)
                                <div class="form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="working_days[]" value="{{ $index }}:{{ $day }}" id="{{ $day }}">
                                    <label class="form-check-label" for="{{ $day }}">{{ $day }}</label>
                                </div>
                            @endforeach
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Salvar</button>
                    </form>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Disponibilidades atuais</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive" style="overflow: hidden;">
                        <table class="table">
                            <thead class="text-primary">
                                <tr>
                                    <th>Barbeiro</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barbers as $barber)
                                    <tr>
                                        <td>{{ $barber->name }}</td>
                                        <td class="text-right">
                                            <!-- Botão para abrir o modal -->
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalBarber{{ $barber->id }}">
                                                Ver Disponibilidades
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal para cada barbeiro -->
                                    <div class="modal fade" id="modalBarber{{ $barber->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $barber->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel{{ $barber->id }}">Disponibilidades de {{ $barber->name }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @php
                                                        // Filtrar e agrupar disponibilidades por dia
                                                        $barberAvailabilities = $availabilities
                                                            ->where('barber_id', $barber->id)
                                                            ->where('status', 1)
                                                            ->sortBy('date');
                                                        $groupedAvailabilities = $barberAvailabilities->groupBy(function($availability) {
                                                            return \Carbon\Carbon::parse($availability->date)->format('d/m/Y');
                                                        });
                                                    @endphp

                                                    @if ($groupedAvailabilities->isEmpty())
                                                        <p>Nenhuma disponibilidade encontrada.</p>
                                                    @else
                                                        @foreach ($groupedAvailabilities as $day => $times)
                                                            <h6 class="mt-3">{{ $day }}</h6>
                                                            <ul>
                                                                @foreach ($times as $availability)
                                                                    <li>{{ \Carbon\Carbon::parse($availability->date)->format('H:i') }}</li>
                                                                @endforeach
                                                            </ul>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>