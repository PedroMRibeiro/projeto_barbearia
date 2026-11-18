<x-app-layout>

    <h2>Crie um barbeiro</h2>

    <form action="{{ route('barbers.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text"
                id="name"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}"
            >
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

         {{-- Status --}}
        <div class="form-group">
            <label for="status">Estado</label>
            <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Ativo</option>
                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inativo</option>
            </select>
            @error('status')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn">Criar barbeiro</button>
        
    </form>

</x-app-layout>