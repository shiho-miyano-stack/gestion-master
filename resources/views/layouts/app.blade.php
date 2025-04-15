<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion Coopérative |</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body {
            overflow-x: hidden;
        }
        .sidebar {
            overflow-y: auto;
            height: 100vh;
            position: fixed;
            width: 230px;
            background-color: rgba(0, 0, 0, 0.5); 
            color: white;
            backdrop-filter: blur(10px); 
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);
            z-index: 1000;
        }
        .slidecontent{
            margin-top: 50px;
        }
        .sidebar a {
            color: white;
            display: block;
            padding: 12px 20px;
            text-decoration: none;
            transition: background-color 0.3s, padding-left 0.3s;
        }

        .sidebar a:hover {
            background-color: rgba(255, 255, 255, 0.15); 
            padding-left: 30px; 
            border-left: 3px solid #81ccae; 
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .deconnecter{
            margin-top: 0;
        }
        .profil{
            margin-top: 30px;
        }
    </style>
</head>
<body>

    {{-- Sidebar --}}
    <div class="sidebar">
        <div class="slidecontent">
            <a href="{{ route('cooperatives.index') }}">Coopératives</a>
            <a href="{{ route('membres.index') }}">Membres</a>
            <a href="{{ route('collaborateurs.index') }}">Collaborateurs</a>
            <a href="{{ route('provinces.index') }}">Provinces</a>
            <a href="{{ route('communes.index') }}">Communes</a>
            <a href="{{ route('secteurs.index') }}">secteurs</a>
            <a href="{{ route('categories.index') }}">Catégories</a>
            <a href="{{ route('demande_subventions.index') }}">Demande de subvention</a>
            <a href="{{ route('subventions.index') }}">Subvention</a>
            <a href="{{ route('versements.index') }}">Versement</a>
            
        </div>
        <a href="{{ route('profil') }}" class="profil"><i class="bi bi-person-circle" style="margin-right: 5px;"></i>Profil</a>
        <a href="{{ route('login.logout') }}" class="deconnecter"><i class="fas fa-sign-out-alt" style="margin-right: 5px;"></i>Déconnecter</a>
        @yield('scripts')
    </div>
    
    {{-- Contenu --}}
    <div class="content">
        @yield('content')
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

