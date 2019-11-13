<!DOCTYPE html>
<html style="height:100%!important">

<head>

    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Tarefas</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' href={{ asset('css/bootstrap.css') }}>
    <link rel='stylesheet' type='text/css' href={{ asset('css/style.css') }}>
    <link rel="shortcut icon" href={{ asset('img/mobapps.png') }} />
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <style>
        body {
            background-image: linear-gradient(#7edda3, #47e7df)!important;
            background-repeat:no-repeat;
        }

        .mini-card {
            background:white;
            border-radius:3px;
            padding:10px;
            margin-bottom:10px;
            paddin-top:20px;
            padding-bottom:20px;
            box-shadow:silver 1px 2px 1px;
            color:#666666;
        }
    </style>

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1">Gerenciador de tarefas</span>
    </nav>
    <!-- /Navbar -->

    <div class="container-fluid">
        <div class="card" style="margin-top:3%">
            <div class="card-header">
                    <button onClick="modalCadastrarEditarTarefa('{{route('modal.cadastrar.editar')}}')" class='btn btn-success btn-sm float-right'>
                        Nova Tarefa
                    </button>
            </div>
            <div class="col py-3 px-md-5 border">
                <div class="card-deck">
                    
                    <div class="card border-warning mb-3">
                        <div class="card-header border-warning mb-3" style="background:#fbbb51">
                            A fazer
                        </div>
                        <div class="card-body" style="background:#e2e4e6">
                                <tbody>
                                    @foreach ($tarefasAFazer as $tarefa)
                                        <div class="col-md 12 mini-card">
                                            {{$tarefa->nome}} <br> 
                                            <small>{{date('d/m/Y', strtotime($tarefa->created_at))}}</small>
                                            <span style="float:right">
                                                <button class="btn btn-sm btn-defoult" onClick="modalCadastrarEditarTarefa('{{route('modal.cadastrar.editar')}}','{{$tarefa->id}}')"><i class="fas fa-pen-square"></i></button>
                                                <button class="btn btn-sm btn-defoult" onClick="confirmarExclusao({{$tarefa->id}})"><i class="fas fa-trash-alt"></i></button>
                                            </span>
                                        </div>
                                    @endforeach
                                </tbody>
                        </div>
                    </div>

                    <div class="card border-primary mb-3">
                        <div class="card-header border-primary mb-3" style="background:#51d2fc">
                            Tarefas em andamento
                        </div>
                        <div class="card-body" style="background:#e2e4e6">  
                            @foreach ($tarefasEmAndamento as $tarefa)
                                <div class="col-md 12 mini-card">
                                    {{$tarefa->nome}} <br> 
                                    <small>{{date('d/m/Y', strtotime($tarefa->created_at))}}</small>
                                    <span style="float:right">
                                                <button class="btn btn-sm btn-defoult" onClick="modalCadastrarEditarTarefa('{{route('modal.cadastrar.editar')}}','{{$tarefa->id}}')"><i class="fas fa-pen-square"></i></button>
                                                <button class="btn btn-sm btn-defoult" onClick="confirmarExclusao({{$tarefa->id}})"><i class="fas fa-trash-alt"></i></button>
                                    </span> 
                                </div>    
                            @endforeach                                 
                        </div>
                    </div>

                    <div class="card border-success mb-3">
                        <div class="card-header border-success mb-3" style="background:#7edda3">
                            Tarefas concluidas
                        </div>
                        <div class="card-body" style="background:#e2e4e6">                        
                            @foreach ($tarefasConcluidas as $tarefa)
                                <div class="col-md 12 mini-card">
                                    {{$tarefa->nome}} <br> 
                                    <small>{{date('d/m/Y', strtotime($tarefa->created_at))}}</small>
                                    <span style="float:right">
                                                <button class="btn btn-sm btn-defoult" onClick="modalCadastrarEditarTarefa('{{route('modal.cadastrar.editar')}}','{{$tarefa->id}}')"><i class="fas fa-pen-square"></i></button>
                                                <button class="btn btn-sm btn-defoult" onClick="confirmarExclusao({{$tarefa->id}})"><i class="fas fa-trash-alt"></i></button>
                                    </span> 
                                </div>  
                            @endforeach                                                                  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--Modal Cadastrar e Editar-->
<div id="modal-cadastrar-editar-tarefa" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" data-backdrop="static">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tarefa</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
 
            <div class="modal-body">
                <div id="modal-body-content">
                    <center><h3>Carregando...</h3></center>
                </div> 
            </div>   
        </div>
    </div>
</div>

<!-- Modal de deletar tarefa -->
<div class="modal fade" id="remover" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" data-backdrop="static">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title " >ATENÇÃO</h3>
            </div>
        <div class="modal-body">
        
        <h4>Tem certeza de que deseja excluir o item selecionado?</h4>
    </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
          <a href="#" id="href" class="btn btn-danger">Sim</a>
      </div>

    </div>
  </div>
</div>


<script type="text/javascript"  src="{{asset('js/jquery.min.js')}}" ></script>
<script type="text/javascript"  src="{{asset('js/bootstrap.min.js')}}" ></script>

<script>

    function modalCadastrarEditarTarefa(rota, tarefaId)
    {
        var url = null;

        if (tarefaId){
            url = rota + "/" + tarefaId  
        }else{
            url = rota;
        }

        $("#modal-cadastrar-editar-tarefa").modal('show');
        $('#modal-body-content').load(url);
    }

    function confirmarExclusao(id)
    {
        url = "/deletar/" + id;
        $('#href').attr('href', url);  
        $("#remover").modal('show');
    }
</script>

</body>

</html>