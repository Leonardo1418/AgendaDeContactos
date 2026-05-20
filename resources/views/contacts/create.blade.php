@extends('layouts.app')

@section('content')
    <div style="background: white; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);
                max-width: 600px; padding: 2rem;">

        <h1 style="color: #2c3e50; margin-bottom: 1.5rem;">Crear Contacto</h1>

        <form action="{{ route('contacts.store') }}" method="POST">
            @csrf

            <div style="margin-bottom: 1rem;">
                <label for="name" style="display: block; margin-bottom: 5px; color: #555; font-weight: bold;">
                    Nombre *
                </label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                    style="width: 100%; padding: 8px 12px; border: 1px solid #ccc;
                           border-radius: 6px; font-size: 1rem;">
                @error('name')
                    <div style="color: #e74c3c; font-size: 0.85rem; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>

            <div style="margin-bottom: 1rem;">
                <label for="email" style="display: block; margin-bottom: 5px; color: #555; font-weight: bold;">
                    Email
                </label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    style="width: 100%; padding: 8px 12px; border: 1px solid #ccc;
                           border-radius: 6px; font-size: 1rem;">
                @error('email')
                    <div style="color: #e74c3c; font-size: 0.85rem; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>

            <div style="margin-bottom: 1rem;">
                <label for="phone" style="display: block; margin-bottom: 5px; color: #555; font-weight: bold;">
                    Teléfono
                </label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                    style="width: 100%; padding: 8px 12px; border: 1px solid #ccc;
                           border-radius: 6px; font-size: 1rem;">
                @error('phone')
                    <div style="color: #e74c3c; font-size: 0.85rem; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>

            <div style="margin-bottom: 1rem;">
                <label for="category" style="display: block; margin-bottom: 5px; color: #555; font-weight: bold;">
                    Categoría *
                </label>
                <select id="category" name="category" required
                    style="width: 100%; padding: 8px 12px; border: 1px solid #ccc;
                           border-radius: 6px; font-size: 1rem;">
                    <option value="">Selecciona una categoria</option>
                    <option value="personal" {{ old('category') == 'personal' ? 'selected' : '' }}>Personal</option>
                    <option value="work"     {{ old('category') == 'work'     ? 'selected' : '' }}>Trabajo</option>
                    <option value="family"   {{ old('category') == 'family'   ? 'selected' : '' }}>Familia</option>
                    <option value="other"    {{ old('category') == 'other'    ? 'selected' : '' }}>Otro</option>
                </select>
                @error('category')
                    <div style="color: #e74c3c; font-size: 0.85rem; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>

            <div style="margin-bottom: 1rem;">
                <label for="notes" style="display: block; margin-bottom: 5px; color: #555; font-weight: bold;">
                    Notas
                </label>
                <textarea id="notes" name="notes" rows="3"
                    style="width: 100%; padding: 8px 12px; border: 1px solid #ccc;
                           border-radius: 6px; font-size: 1rem; resize: vertical;">{{ old('notes') }}</textarea>
                @error('notes')
                    <div style="color: #e74c3c; font-size: 0.85rem; margin-top: 4px;">{{ $message }}</div>
                @enderror
            </div>

            <div style="margin-bottom: 1.5rem; display: flex; align-items: center; gap: 8px;">
                <input type="checkbox" id="favorite" name="favorite"
                    {{ old('favorite') ? 'checked' : '' }}
                    style="width: 18px; height: 18px; cursor: pointer;">
                <label for="favorite" style="color: #555; cursor: pointer;">
                    Marcar como favorito 💛
                </label>
            </div>

            <div style="display: flex; gap: 10px;">
                <button type="submit"
                    style="padding: 10px 24px; background: #2c3e50; color: white;
                           border: none; border-radius: 6px; cursor: pointer; font-size: 1rem;">
                    Guardar Contacto
                </button>
                <a href="{{ route('contacts.index') }}"
                    style="padding: 10px 24px; background: #aaa; color: white;
                           border-radius: 6px; text-decoration: none; font-size: 1rem;">
                    Cancelar
                </a>
            </div>

        </form>
    </div>
@endsection