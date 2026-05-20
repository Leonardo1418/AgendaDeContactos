<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda de Contactos</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f0f2f5;
            color: #333;
        }

        header {
            background-color: #2c3e50;
            color: white;
            width: 100%;
            height: 65px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.3);
        }

        nav {
            height: 100%;
        }

        ul {
            display: flex;
            list-style: none;
            gap: 10px;
            justify-content: flex-end;
            align-items: center;
            padding-right: 2rem;
            height: 100%;
        }

        ul li a {
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 0.95rem;
            transition: background-color 0.2s;
        }

        ul li a:hover {
            background-color: #3d5166;
        }

        .flash-message {
            background-color: #2ecc71;
            color: white;
            padding: 12px 20px;
            text-align: center;
            font-size: 0.95rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .container {
            max-width: 1100px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        .page-link {
        color: #2c3e50;
        border-radius: 6px;
        border: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <header>
        <nav style="display: flex; justify-content: space-between; align-items: center; height: 100%; padding: 0 2rem;">
            <a href="/" style="color: white; text-decoration: none; font-size: 1.2rem; font-weight: bold;">
                Agenda de Contactos
            </a>
            <ul>
                <li><a href="{{ route('contacts.index') }}">Contactos</a></li>
                <li><a href="{{ route('contacts.create') }}">+ Crear Contacto</a></li>
            </ul>
        </nav>
    </header>

    @if(session('success'))
        <div class="flash-message">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        @yield('content')
    </div>
</body>
</html>