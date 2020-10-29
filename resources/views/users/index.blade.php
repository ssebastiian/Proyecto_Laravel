<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class ="col-sm-8 mx-auto">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                - {{$error}} <br>
                                @endforeach
                            </div>
                            @endif
                            <form action="{{route('users.store')}}" method="POST">
                                <div class="form-row">
                                    <div class="col-sm-3">
                                        <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{old('name')}}">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="password" name="password" class="form-control" placeholder="Contraseña" value="{{old('password')}}">
                                    </div>
                                    <div class="col-auto">
                                        <!-- @csrf  significa que el fomulario es nuestro  -->
                                        @csrf 
                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>


                    <table class="table">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Nombre</td>
                                <td>Email</td>
                                <td>&nbsp;</td>
                            </tr>
                        </thead>               
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <form action="{{ route('users.destroy', $user)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="Eliminar"class="btn btn-sm btn-danger" onclick="return confirm('Desea eliminarlo ?')">
                                </form>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>     
                    </table>                
                </div>            
            </div>     
        </div>
        
    </body>
</html>
