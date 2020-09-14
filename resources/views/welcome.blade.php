@extends('template.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href=" {{ route('home') }}">Acceuil</a></li>
                        <li class="breadcrumb-item active">Emarger</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header text-center">
                    <h4>MERCI DE TAPER VOTRE MATRICULE</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('emargement.create') }}" autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                                <div class="col-md-6"><input type="text" name="matricule" class="form-control
                                    {{ $errors->has('matricule') ? 'is-invalid' : ''}}" value="{{ old('matricule')}}">
                                    @if($errors->has('matricule'))
                                        <div class="text-center text-danger">
                                            {{ $errors->first('matricule')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-info" value="VALIDER">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop