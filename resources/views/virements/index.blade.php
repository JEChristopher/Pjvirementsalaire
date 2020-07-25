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
                <div class="col-md-12 m-4 text-center">
                    <a href="#custom-modal" class="btn btn-success waves-effect width-md" data-animation="contentscale" data-plugin="custommodal" data-overlaySpeed="100" data-overlayColor="#36404a">Créer un virement</a>
                </div>

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>Créé le</th>
                            <th>libelle</th>
                            <th>description</th>
                            <th>bordereau</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($virements as $virement)
                            <tr>
                                <td>{{ $virement->created_at }}</td>
                                <td>{{ $virement->libelle }}</td>
                                <td>{{ $virement->description }}</td>
                                <td>
                                    <a class="" href="{{ asset('storage' . DIRECTORY_SEPARATOR . 'bordereaux' . DIRECTORY_SEPARATOR . $virement->bordereau) }}">
                                        Télécharger
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('virements.show', ['id' => $virement->id]) }}" class="btn btn-info btn-sm">Détails</a>
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


    <!-- Custom Modal -->
    <div id="custom-modal" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.modal.close();">
            <span>&times;</span><span class="sr-only">Close</span>
        </button>
        <h4 class="custom-modal-title">Créer un virement</h4>
        <div class="custom-modal-text">
            <div class="card-box">
                <h4 class="header-title mb-3">Création d'un ordre de virement</h4>

                <form class="form-horizontal" method="post" action="{{ route('virements.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Libellé</label>
                        <div class="col-sm-9">
                            <input type="text" name="libelle" value="{{ old('libelle') }}" class="form-control" id="inputEmail3" placeholder="Libellé">
                            @error('libelle')
                                <small class="text-warning">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            <input type="text" name="description" value="{{ old('description') }}" class="form-control" id="inputPassword3" placeholder="Description">
                            @error('description')
                                <small class="text-warning">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="inputPassword5" class="col-sm-3 col-form-label">Bordereau</label>
                        <div class="col-sm-9">
                            <input type="file" accept=".xlsx,xls" name="bordereau" class="form-control" id="inputPassword5" placeholder="">
                            @error('bordereau')
                                <small class="text-warning">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-0 justify-content-end row">
                        <div class="col-sm-9 text-right">
                            <button type="submit" class="btn btn-success waves-effect waves-light">Créer</button>
                            <button type="reset" class="btn btn-secondary waves-effect waves-light">Annuler</button>
                        </div>
                    </div>
                </form>
            </div> <!-- end card-box -->
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
