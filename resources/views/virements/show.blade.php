@extends('layouts.app')

@section('css')
    <link href="assets/libs/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom box css -->
    <link href="assets/libs/custombox/custombox.min.css" rel="stylesheet">
@endsection

@section('chemin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Utilisateurs</li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title">Buttons example</h4>
                <p class="sub-header">
                    The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                </p>

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Prénoms</th>
                            <th>Préfix</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Montant</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($details as $detail)
                            <tr>
                                <td>{{ $detail[0] }}</td>
                                <td>{{ $detail[1] }}</td>
                                <td>{{ $detail[2] }}</td>
                                <td>{{ $detail[3] }}</td>
                                <td>{{ $detail[4] }}</td>
                                <td>{{ $detail[5] }}</td>
                                <td>{{ $detail[6] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-md-12 text-center">
                    {{-- <a href="#custom-modal" class="btn btn-success waves-effect width-md" data-animation="contentscale" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">Lancer le virement</a> --}}
                    <a href="{{ route('virements.action', ['id' => $virement_id]) }}" class="btn btn-success waves-effect width-md">Lancer le virement</a>
                </div>
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
    <!-- Modal-Effect -->
    <script src="assets/libs/custombox/custombox.min.js"></script>

    <!-- Datatables init -->
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
@endsection
