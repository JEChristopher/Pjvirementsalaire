@extends('layouts.app')

@section('css')
    <link href="assets/libs/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('chemin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Tableau de bord</a></li>
                        <li class="breadcrumb-item active">Utilisateurs</li>
                    </ol>
                </div>
                <h4 class="page-title">Tableau de bord des utilsateurs</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title">Liste de tous les utlisateurs connectés</h4>
                <p class="sub-header">
                Dans ce menu, nous verrons tous les utilisateurs connectés sur notre platforme
                </p>

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>Créé le</th>
                            <th>Nom</th>
                            <th>Prénoms</th>
                            <th>Email</th>
                            <th>last login</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->last_login }}</td>
                                <td>{{ $user->is_active == 1 ? 'Activé' : 'Désactivé' }}</td>
                                <td>
                                    <a href="#" class="btn btn-info btn-sm">Voir</a>
                                    <a href="#" class="btn btn-warning btn-sm">Modifier</a>
                                    <a href="#" class="btn btn-danger btn-sm">Supprimer</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@section('datatable')
    <script src="{{ asset('assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/buttons.print.min.js') }}"></script>

    <script src="{{ asset('assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/dataTables.select.min.js') }}"></script>

    <!-- Datatables init -->
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
@endsection
