@extends('layouts.painel')
@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card position-relative">
            <div class="card-body">
                <p class="card-title">
                    Cenas
                </p>
                <div class="row">
                    <div class="col-12 col-lg-2 col-md-2 ml-auto">
                        <a href="{{ route('modelo.create') }}" class="btn btn-success btn-icon-text btn-block">
                            Adicionar
                            <i class="ti-plus btn-icon-append"></i>
                        </a>
                    </div>
                </div>
                <div class="row">
                    @foreach($modelos as $modelo)
                    <div class="col-sm-6 col-md-4 col-lg-3 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <img src="{{ asset('images/fotoPerfil.jpg') }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <blockquote class="blockquote border-0">
                                            <footer class="blockquote-footer text-truncate text-uppercase">{{ $modelo->nome }}</footer>
                                        </blockquote>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3 ml-auto">
                                        <button onclick=location.href="{{ route('modelo.show' , [ 'id' => $modelo->id ]) }}" type="button" class="btn btn-outline-primary btn-rounded btn-icon">
                                            <i class="ti-search"></i>
                                        </button>
                                    </div>
                                    <div class="col-3 mr-auto">
                                        <button onclick=location.href="{{ route('modelo.destroy' , [ 'id' => $modelo->id ]) }}" type="button" class="btn btn-outline-danger btn-rounded btn-icon">
                                            <i class="ti-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Modal Editar Noticia --}}
<div class="modal fade" id="modalEditNoticia" tabindex="-1" role="dialog" aria-labelledby="modalEditNoticiaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditNoticiaLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <input id="id" type="hidden">
                    <div class="row">
                        <div class="form-group col">
                            <label for="titulo">Titulo</label>
                            <input name="titulo" id="titulo" type="text" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
{{-- Fim Modal Editar Noticia --}}
@endsection
