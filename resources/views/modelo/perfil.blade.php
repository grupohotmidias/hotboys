@extends('layouts.painel')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h4 class="font-weight-bold mb-0">Perfil</h4>
            </div>
            <!-- <div>
                <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                    <i class="ti-clipboard btn-icon-prepend"></i>Report
                </button>
            </div> -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card position-relative">
            <div class="card-body">
                <p class="card-title">Detalhes</p>
                <div class="row">
                    <div class="col-12 col-md-12 col-xl-3 d-flex flex-column justify-content-center">
                        <div class="ml-xl-4">
                            <h1>{{ $modelo->nome }}</h1>
                            <h3 class="font-weight-light mb-xl-4">{{ $modelo->posicao_sexual }}</h3>
                            <p class="text-muted mb-2 mb-xl-0">Uma Breve Descrição</p>
                        </div>
                    </div>
                    <div class="col-md-12 col-xl-9">
                        <div class="row">
                            <div class="col-md-6 mt-3 col-xl-5 d-flex flex-column justify-content-center">
                                {{-- <canvas id="north-america-chart"></canvas>
                                <div id="north-america-legend"></div> --}}
                                <img src="{{ asset('images/fotoPerfil.jpg') }}" class="img-fluid" alt="Responsive image" style="height: 400px">
                                <a href="{{ route('modelo.edit' ,['id' => $modelo->id]) }}" class="btn btn-primary mt-2">Editar</a>
                            </div>
                            <div class="col-md-6 col-xl-7 d-flex flex-column justify-content-center">
                                <div class="table-responsive mb-3 mb-md-0">
                                    <table class="table table-borderless report-table">
                                        <tr>
                                            <td class="text-muted">Cenas</td>
                                            <td class="w-100 px-0">
                                                <div class="progress progress-md mx-4">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td><h5 class="font-weight-bold mb-0">{{ $cenas->count() }}</h5></td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Imagens</td>
                                            <td class="w-100 px-0">
                                                <div class="progress progress-md mx-4">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td><h5 class="font-weight-bold mb-0">{{ $imagens->count() }}</h5></td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Noticias</td>
                                            <td class="w-100 px-0">
                                                <div class="progress progress-md mx-4">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td><h5 class="font-weight-bold mb-0">{{ $noticias->count() }}</h5></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card position-relative">
            <div class="card-body">
                <p class="card-title">
                    CENAS
                    {{-- <button class="btn btn-primary btn-icon-text btn-rounded" style="margin-left:1000px" data-toggle="modal" data-target="#modalCadastroCena">
                        <i class="ti-upload btn-icon-prepend"></i>Upload
                    </button> --}}
                </p>
                <div class="row">
                    @foreach($cenas as $cena)
                    <div class="col-sm-6 col-md-4 col-lg-6 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        {!! $cena->video_code !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <blockquote class="blockquote border-0">
                                            <footer class="blockquote-footer text-truncate">{{ $cena->titulo }}</footer>
                                            <p class="mb-0 mt-2">Participante(s):
                                                @foreach ($participantes as $participante)
                                                    @foreach ($associados as $associador)
                                                        @if($associador->id_modelo == $participante->id AND $associador->id_conteudo == $cena->id AND $associador->tipo == "Cena")
                                                            <a href="{{ route('modelo.show' , ['id' =>$participante->id]) }}">{{ $participante->nome }}</a>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </p>
                                            <p></p>
                                        </blockquote>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3 mx-auto">
                                        <button onclick=location.href="{{ route('cena.show' , [ 'id' => $cena->id ]) }}" type="button" class="btn btn-outline-primary btn-rounded btn-icon">
                                            <i class="ti-search"></i>
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
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card position-relative">
            <div class="card-body">
                <p class="card-title">
                    IMAGENS
                    {{-- <button class="btn btn-primary btn-icon-text btn-rounded" style="margin-left:980px" data-toggle="modal" data-target="#modalCadastroImagem">
                        <i class="ti-upload btn-icon-prepend"></i>Upload
                    </button> --}}
                </p>
                <div class="row">
                    @for ($i = 0; $i < $imagens->count(); $i++)
                    @for($j = 0; $j < $associados->count(); $j++)
                    @if($imagens[$i]->id == $associados[$j]->id_conteudo)
                    <div class="col-6">
                        <img src="https://server2.hotboys.com.br/arquivos/068f1_malhado1.jpg" class="img-thumbnail img-fluid" alt="Responsive image">
                    </div>
                    @endif
                    @endfor
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card position-relative">
            <div class="card-body">
                <p class="card-title">
                    Noticias
                    {{-- <button class="btn btn-primary btn-icon-text btn-rounded" style="margin-left:980px">
                        <i class="ti-upload btn-icon-prepend"></i>Upload
                    </button> --}}
                </p>
                <div class="row">
                    @for($i = 0; $i < $noticias->count(); $i++)
                    @for($j = 0; $j < $associados->count(); $j++)
                    @if($noticias[$i]->id == $associados[$j]->id_conteudo)
                    <div class="col-12 col-md-12 col-lg-6">
                        <div class="card mb-3 bg-light shadow-none" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="https://server2.hotboys.com.br/arquivos/{!! $noticias[$i]->imagem_destaque !!}" class="card-img h-100" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title text-truncate">{{ $noticias[$i]->titulo }}</h5>
                                        <p class="card-text text-truncate">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                        <p class="card-text text-truncate"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endfor
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>

{{--  Modais  --}}

{{--  Modal Cadastro De Cena  --}}
<div class="modal fade" id="modalCadastroCena" tabindex="-1" role="dialog" aria-labelledby="modalCadastroCena" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCadastroCena">Cadastrar Cenas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $modelo->id }}">
                    <div class="row">
                        <div class="col">
                            <input id="imagem" name="imagem" type="file" class="form-control" accept="image/*" >
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--  End Modal Cadastro De Cena  --}}

{{--  Modal Cadastro De Imagem  --}}
<div class="modal fade" id="modalCadastroImagem" tabindex="-1" role="dialog" aria-labelledby="modalCadastroImagem" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCadastroImagem">Cadastrar Imagem</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $modelo->id }}">
                <input type="hidden" name="nome" value="{{ $modelo->nome }}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <input id="imagem" name="imagem" type="file" class="form-control" accept="image/*" >
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--  End Modal Cadastro De imagem  --}}

{{--  End Modais  --}}
@endsection
