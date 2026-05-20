@extends('layouts.app')

@section('content')
    <div style="background: white; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);
                max-width: 600px; padding: 2rem;">

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
            <h1 style="color: #2c3e50; margin: 0;">{{ $contact->name }}</h1>
            <span style="font-size: 1.8rem;">{{ $contact->favorite ? '💛' : '🤍' }}</span>
        </div>

        <div style="display: flex; flex-direction: column; gap: 12px; margin-bottom: 2rem;">
            <div style="display: flex; gap: 10px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                <span style="color: #888; min-width: 100px;">Email</span>
                <span>{{ $contact->email ?? '-' }}</span>
            </div>
            <div style="display: flex; gap: 10px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                <span style="color: #888; min-width: 100px;">Teléfono</span>
                <span>{{ $contact->phone ?? '-' }}</span>
            </div>
            <div style="display: flex; gap: 10px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                <span style="color: #888; min-width: 100px;">Categoría</span>
                <span style="padding: 3px 10px; border-radius: 12px; font-size: 0.85rem;
                    background-color:
                        {{ $contact->category === 'work'     ? '#d4edff' :
                          ($contact->category === 'family'   ? '#d4ffda' :
                          ($contact->category === 'personal' ? '#f0d4ff' : '#ffe8d4')) }};">
                    {{ ucfirst($contact->category) }}
                </span>
            </div>
            <div style="display: flex; gap: 10px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                <span style="color: #888; min-width: 100px;">Notas</span>
                <span>{{ $contact->notes ?? '-' }}</span>
            </div>
            <div style="display: flex; gap: 10px;">
                <span style="color: #888; min-width: 100px;">Registrado</span>
                <span>{{ $contact->created_at->format('d/m/Y') }}</span>
            </div>
        </div>

        <div style="display: flex; gap: 10px; flex-wrap: wrap;">
            <a href="{{ route('contacts.edit', $contact) }}"
                style="padding: 8px 18px; background: #f39c12; color: white;
                       border-radius: 6px; text-decoration: none;">
                Editar
            </a>
            <form action="{{ route('contacts.destroy', $contact) }}" method="POST"
                onsubmit="return confirm('¿Estás seguro de eliminar este contacto?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                    style="padding: 8px 18px; background: #e74c3c; color: white;
                           border: none; border-radius: 6px; cursor: pointer;">
                    Eliminar
                </button>
            </form>
            <a href="{{ route('contacts.index') }}"
                style="padding: 8px 18px; background: #aaa; color: white;
                       border-radius: 6px; text-decoration: none;">
                Volver
            </a>
        </div>
    </div>
@endsection