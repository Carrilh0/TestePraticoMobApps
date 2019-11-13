<!DOCTYPE html>
<html>

<head>

    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Tarefas</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' href={{ asset('css/bootstrap.css') }}>
    <link rel='stylesheet' type='text/css' href={{ asset('css/style.css') }}>
    <link rel="shortcut icon" href={{ asset('img/mobapps.png') }} />

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1">Gerenciador de tarefas</span>
    </nav>
    <!-- /Navbar -->

    <div class="container-fluid">
        <div class="card radius" style="margin-top: 3%">
            <div class="card-header">
                    <button onClick="modalCadastrarEditarTarefa('{{route('modal.cadastrar.editar')}}')" class='btn btn-success btn-sm float-right'>
                        Nova Tarefa
                    </button>
            </div>
            <div class="col py-3 px-md-5 border">
                <div class="card-deck">
                    
                    <div class="card border-warning mb-3">
                        <div class="card-header border-warning mb-3">
                            A fazer
                        </div>
                        <div class="card-body">
                            <table class="table">

                                <tbody>
                                    @foreach ($tarefasAFazer as $tarefa)
                                        <tr>                                       
                                            <td class="border-warning mb-3">{{$tarefa->nome}}</td>
                                            <td>
                                                <button onClick="modalCadastrarEditarTarefa('{{route('modal.cadastrar.editar')}}','{{$tarefa->status_id}}')" class='btn btn-success btn-sm float-right'>
                                                Alterar Status
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>

                    <div class="card border-primary mb-3">
                        <div class="card-header border-primary mb-3">
                            Tarefas em andamento
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tbody>          
                                    @foreach ($tarefasEmAndamento as $tarefa)
                                        <tr>
                                            <td class="border-primary mb-3">{{$tarefa->nome}}</td>
                                            <td>
                                                <button onClick="modalCadastrarEditarTarefa('{{route('modal.cadastrar.editar')}}','{{$tarefa->status_id}}')" class='btn btn-success btn-sm float-right'>
                                                Alterar Status
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach                                 
                                </tbody>
                            </table>


                        </div>
                    </div>

                    <div class="card border-success mb-3">
                        <div class="card-header border-success mb-3">
                            Tarefas concluidas
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-dark">

                                </thead>
                                <tbody>                                    
                                        @foreach ($tarefasConcluidas as $tarefa)
                                            <tr>
                                                <td class="border-success mb-3">{{$tarefa->nome}}</td>
                                                <td>
                                                <button onClick="modalCadastrarEditarTarefa('{{route('modal.cadastrar.editar')}}','{{$tarefa->status_id}}')" class='btn btn-success btn-sm float-right'>
                                                Alterar Status
                                                </button>
                                            </td>
                                            </tr>
                                        @endforeach                                                                  
                                </tbody>
                            </table>


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

<script type="text/javascript"  src="{{asset('js/jquery.min.js')}}" ></script>
<script type="text/javascript"  src="{{asset('js/bootstrap.min.js')}}" ></script>

<script>

    function modalCadastrarEditarTarefa(rota, id)
    {
        var url = null;

        if (id){
            url = rota + "/" + id
        }else{
            url = rota;
        }

        $("#modal-cadastrar-editar-tarefa").modal('show');
        $('#modal-body-content').load(url);
    }

</script>

</body>

</html>