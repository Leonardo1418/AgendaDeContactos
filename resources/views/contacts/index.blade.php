@extends('layouts.app')

@section('content')
    <h1 style="margin-bottom: 1.5rem; color: #2c3e50;">Contactos</h1>

    <form action="{{ route('contacts.index') }}" method="GET"
        style="display: flex; gap: 10px; margin-bottom: 1.5rem; flex-wrap: wrap;">
        <input type="text" name="search" placeholder="Buscar por nombre o email"
            value="{{ request('search') }}"
            style="padding: 8px 12px; border: 1px solid #ccc; border-radius: 6px; flex: 1; min-width: 200px;">
        <select name="category"
            style="padding: 8px 12px; border: 1px solid #ccc; border-radius: 6px;">
            <option value="">Todas las categorias</option>
            <option value="personal" {{ request('category') === 'personal' ? 'selected' : '' }}>Personal</option>
            <option value="work"     {{ request('category') === 'work'     ? 'selected' : '' }}>Trabajo</option>
            <option value="family"   {{ request('category') === 'family'   ? 'selected' : '' }}>Familia</option>
            <option value="other"    {{ request('category') === 'other'    ? 'selected' : '' }}>Otro</option>
        </select>
        <button type="submit"
            style="padding: 8px 18px; background-color: #2c3e50; color: white; border: none; border-radius: 6px; cursor: pointer;">
            Buscar
        </button>
        <a href="{{ route('contacts.index') }}"
            style="padding: 8px 18px; background-color: #aaa; color: white; border-radius: 6px; text-decoration: none;">
            Limpiar
        </a>
    </form>

    <div style="background: white; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); overflow: hidden;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #2c3e50; color: white;">
                    <th style="padding: 12px 16px; text-align: left;">Nombre</th>
                    <th style="padding: 12px 16px; text-align: left;">Email</th>
                    <th style="padding: 12px 16px; text-align: left;">Teléfono</th>
                    <th style="padding: 12px 16px; text-align: left;">Categoría</th>
                    <th style="padding: 12px 16px; text-align: center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $contact)
                    <tr style="background-color: {{ $contact->favorite ? '#ffefc1' : 'white' }};
                                border-bottom: 1px solid #eee;">
                        <td style="padding: 12px 16px;">{{ $contact->name }}</td>
                        <td style="padding: 12px 16px;">{{ $contact->email ?? '-' }}</td>
                        <td style="padding: 12px 16px;">{{ $contact->phone ?? '-' }}</td>
                        <td style="padding: 12px 16px;">
                            <span style="padding: 4px 10px; border-radius: 12px; font-size: 0.85rem;
                                background-color:
                                    {{ $contact->category === 'work'     ? '#d4edff' :
                                      ($contact->category === 'family'   ? '#d4ffda' :
                                      ($contact->category === 'personal' ? '#f0d4ff' : '#ffe8d4')) }};
                                color: #333;">
                                {{ ucfirst($contact->category) }}
                            </span>
                        </td>
                        <td style="padding: 12px 16px; text-align: center; white-space: nowrap; display: flex; justify-content: center; gap: 5px;">
                            <a href="{{ route('contacts.show', $contact) }}"
                                style="padding: 5px 10px; background: #3498db; color: white;
                                       border-radius: 5px; text-decoration: none; font-size: 0.85rem;">
                                Ver
                            </a>
                            <a href="{{ route('contacts.edit', $contact) }}"
                                style="padding: 5px 10px; background: #f39c12; color: white;
                                       border-radius: 5px; text-decoration: none; font-size: 0.85rem;">
                                Editar
                            </a>
                            <form action="{{ route('contacts.destroy', $contact) }}" method="POST"
                                onsubmit="return confirm('¿Estás seguro de eliminar este contacto?')"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    style="padding: 5px 10px; background: #e74c3c; color: white;
                                           border: none; border-radius: 5px; cursor: pointer; font-size: 0.85rem;">
                                    Eliminar
                                </button>
                            </form>
                            <form action="{{ route('contacts.favorite', $contact) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                    style="border: none; background: none; cursor: pointer; font-size: 1.2rem;">
                                    {{ $contact->favorite ? '💛' : '🤍' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="padding: 2rem; text-align: center; color: #888;">
                            No se encontraron contactos.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top: 1.5rem;">
        {{ $contacts->links() }}
    </div>
@endsection