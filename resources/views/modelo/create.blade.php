@extends('layouts.painel')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">CADASTRO DE MODELO</h4>
                <form class="forms-sample" method="POST" action="{{ route('modelo.store') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-8 col-md-8 col-lg-8">
                            <label for="nome">Nome</label>
                            <input id="nome" name="nome" type="text" class="form-control" id="exampleInputUsername1" placeholder="Nome" autofocus>
                        </div>
                        <div class="form-group col-4 col-md-2 col-lg-2">
                            <label for="idade">Idade</label>
                            <input id="idade" name="idade" type="text" class="form-control" id="exampleInputUsername1" placeholder="Idade">
                        </div>
                        <div class="form-group col-12 col-md-2 col-lg-2">
                            <label for="posicao_sexual">Posição Sexual</label>
                            <select  name="posicao_sexual" id="posicao_sexual" class="form-control">
                                <option value="Ativo">Ativo</option>
                                <option value="Passivo">Passivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-md-6 col-lg-6">
                            <label for="foto_perfil">Foto Perfil</label>
                            <input name="foto_perfil" id="foto_perfil"  type="file" class="form-control" accept="image/*">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-6">
                            <label for="foto_principal">Foto Principal</label>
                            <input name="foto_principal" id="foto_principal"  type="file" class="form-control" accept="image/*" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-md-4 col-lg-4">
                            <label for="foto_assine">Foto Assinante</label>
                            <input name="foto_assine" id="foto_assine"  type="file" class="form-control" accept="image/*" >
                        </div>
                        <div class="form-group col-12 col-md-4 col-lg-4">
                            <label for="foto_busto_p">Foto De Busto P</label>
                            <input name="foto_busto_p" id="foto_busto_p"  type="file" class="form-control" accept="image/*" >
                        </div>
                        <div class="form-group col-12 col-md-4 col-lg-4">
                            <label for="foto_busto_g">Foto De Busto G</label>
                            <input name="foto_busto_g" id="foto_busto_g"  type="file" class="form-control" accept="image/*" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 form-group">
                            <label for="video_apresentacao">Video de apresentação</label>
                            <input name="video_apresentacao" id="video_apresentacao" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="frase">Frase</label>
                            <textarea class="form-control" name="frase" id="frase" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-md-5 col-lg-5">
                            <label for="estado">Estado</label>
                            <input name="estado" id="estado" type="text" class="form-control" maxlength="2">
                        </div>
                        <div class="form-group col-12 col-md-5 col-lg-5">
                            <label for="cidade">Cidade</label>
                            <input name="cidade" id="cidade" type="text" class="form-control" maxlength="2">
                        </div>
                        <div class="form-group col-12 col-md-2 col-lg-2">
                            <label for="">Exibição</label>
                            <select name="exibicao" id="exibicao" class="form-control">
                                <option value="Todos">Todos</option>
                                <option value="Vips">Vips</option>
                            </select>
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
