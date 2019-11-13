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
                    <a href={{route('index')}} class='btn btn-success btn-sm float-right'>
                        Nova Tarefa
                    </a>
            </div>
            <div class="col py-3 px-md-5 border">
                <div class="card-deck">
                    <div class="card">
                        <div class="card-header">
                            A fazer
                        </div>
                        <div class="card-body">
                            <table class="table">

                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>


                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            Tarefas em andamento
                        </div>
                        <div class="card-body">
                            <table class="table">

                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>


                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            Tarefas concluidas
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-dark">

                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>