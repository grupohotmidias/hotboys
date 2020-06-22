@extends('layouts.painel')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">CADASTRO DE CENAS</h4>
                <form class="forms-sample" method="POST" action="{{ route('cena.store') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-12 col-md-6 col-lg-6">
                            <label for="titulo">Titulo</label>
                            <input id="titulo" name="titulo" type="text" class="form-control" id="exampleInputUsername1" placeholder="Nome" autofocus>
                        </div>
                        <div class="form-group col-12 col-md-3 col-lg-3">
                            <label for="cenas_serie">Serie</label>
                            <select name="cenas_serie" id="cenas_serie" class="form-control">
                                <option value="1">Serie 1</option>
                                <option value="2">Serie 2</option>
                                <option value="3">Serie 3</option>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-3 col-lg-3">
                            <label for="exibicao">Exibição</label>
                            <select name="exibicao" id="exibicao" class="form-control">
                                <option value="Serie 1">Serie 1</option>
                                <option value="Serie 1">Serie 2</option>
                                <option value="Serie 1">Serie 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-md-6 col-lg-6">
                            <label for="descricao">Descrição</label>
                            <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-6">
                            <label for="participantes">Participantes</label>
                            <select name="participantes[]" id="participantes" class="form-control" multiple>
                                @foreach ($modelos as $modelo)
                                    <option value="{{ $modelo->id }}">{{ $modelo->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-md-6 col-lg-6">
                            <label for="cena_lista">Imagem</label>
                            <input name="cena_lista" id="cena_lista" type="file" class="form-control" accept="image/*">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-6">
                            <label for="cena_lista_mobile">Imagem Mbile</label>
                            <input name="cena_lista_mobile" id="cena_lista_mobile" type="file" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-md-3 col-lg-3">
                            <label for="teaser_code">Teaser Code</label>
                            <input name="teaser_code" id="teaser_code" type="file" class="form-control" accept="image/*">
                        </div>
                        <div class="form-group col-12 col-md-3 col-lg-3">
                            <label for="video_code">Video Sprout</label>
                            <input name="video_code" id="video_code" class="form-control">
                        </div>
                        <div class="form-group col-12 col-md-3 col-lg-3">
                            <label for="ordem">Ordem</label>
                            <input name="ordem" id="order"  type="text" class="form-control" placeholder="ordem">
                        </div>
                        <div class="form-groupt col-12 col-md-3 col-lg-3">
                            <label for="tempo_duracao">Tempo de duração</label>
                            <input name="tempo_duracao" id="tempo_duracao"  type="time" class="form-control" placeholder="Order">
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
