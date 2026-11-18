<x-app-layout>

<div class="container">
    <h1>Editar Barbeiro</h1> 
    <form action="{{ route('barbers.update', $barber->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $barber->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Estado</label>
            <select class="form-control" id="status" name="status" required>
                <option value="1" {{ old('status', $barber->status) == 1 ? 'selected' : '' }}>Ativo</option>
                <option value="0" {{ old('status', $barber->status) == 0 ? 'selected' : '' }}>Inativo</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>

</x-app-layout>
