@extends('layouts.app')

@section('css')

@endsection

@section('chemin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Greeva</a></li>
                        <li class="breadcrumb-item active">Tableau d</li>
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
        <div class="col-md-3">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <blockquote class="card-bodyquote mb-0">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                            erat a ante.</p>
                        <footer class="blockquote-footer text-white-50"> Someone famous in <cite title="Source Title">Source Title</cite>
                        </footer>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <blockquote class="card-bodyquote mb-0">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                            erat a ante.</p>
                        <footer class="blockquote-footer text-white-50"> Someone famous in <cite title="Source Title">Source Title</cite>
                        </footer>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <blockquote class="card-bodyquote mb-0">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                            erat a ante.</p>
                        <footer class="blockquote-footer text-white-50"> Someone famous in <cite title="Source Title">Source Title</cite>
                        </footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
@endsection
