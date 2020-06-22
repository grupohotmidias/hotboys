@extends('layouts.painel')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">CADASTRO DE CENAS</h4>
                <form class="forms-sample" method="POST" action="{{ route('modelo.store') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-12 col-md-6 col-lg-6">
                            <label for="titulo">Titulo</label>
                            <input id="titulo" name="titulo" type="text" class="form-control" id="exampleInputUsername1" placeholder="Nome" autofocus>
                        </div>
                        <div class="form-group col-12 col-md-3 col-lg-3">
                            <label for="exibicao">Titulo Curto</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-12 col-md-3 col-lg-3">
                            <label for="exibicao">Subtitulo</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-md-6 col-lg-6">
                            <label for="descricao">Descrição da Imagem Principal</label>
                            <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-6">
                            <label for="participantes">Participantes</label>
                            <select name="participantes" id="participantes" class="form-control" multiple>
                                @foreach ($modelos as $modelo)
                                    <option value="{{ $modelo->id }}">{{ $modelo->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="">Texto da Noticia</label>
                            <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-md-6 col-lg-3">
                            <label for="cena_lista">Imagem Destaque</label>
                            <input name="cena_lista" id="cena_lista" type="file" class="form-control" accept="image/*">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-3">
                            <label for="cena_lista_mobile">Imagem dos Slides</label>
                            <input name="cena_lista_mobile" id="cena_lista_mobile" type="file" class="form-control" accept="image/*">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-3">
                            <label for="cena_lista_mobile">Imagem Lista</label>
                            <input name="cena_lista_mobile" id="cena_lista_mobile" type="file" class="form-control" accept="image/*">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-3">
                            <label for="cena_lista_mobile">Imagem da Noticia</label>
                            <input name="cena_lista_mobile" id="cena_lista_mobile" type="file" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-md-4 col-lg-4">
                            <label for=""></label>
                            <input name="" id="" type="text" class="form-control">
                        </div>
                        <div class="form-group col-12 col-md-4 col-lg-4">
                            <label for=""></label>
                            <input name="" id="" type="text" class="form-control">
                        </div>
                        <div class="form-group col-12 col-md-4 col-lg-4">
                            <label for=""></label>
                            <input name="" id="" type="text" class="form-control">
                        </div>
                        <div class="form-group col-12 col-md-4 col-lg-4">
                            <label for=""></label>
                            <input name="" id="" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mr-2">Salvar</button>
                            <a href="{{ route('home.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
