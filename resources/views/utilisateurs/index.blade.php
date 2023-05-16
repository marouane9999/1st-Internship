@extends('layout')
@section('header title','Participants')
@section('content')



        <div class=" mt-5 m-auto w-75 ">
            <div>
                <table
                    class="table table-borderless table-bordered table-hover w-100 mt-2 shadow-lg mb-5 bg-white rounded">
                    <thead class="thead-dark">
                    <tr class="">
                        <th scope="col">ID</th>
                        <th scope="col">Nom & Prenom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr class="text-left">
                            <th scope="row">{{$user->id}}</th>
                            <td>{{ucfirst($user->name)}}</td>
                            <td>{{{$user->email}}} </td>
                            <td>{{ucfirst($user->getRoleNames()[0])}}</td>
                            <td>
                                <a class="btn btn-outline-warning rounded-6 " data-toggle="tooltip" data-placement="top"
                                title="Modifier" href="{{route('utilisateurs.edit',$user->id)}}"><i
                                    class="fas fa-edit"></i></a>
                                <a class="btn btn-outline-danger rounded-6 delete-elm" data-toggle="tooltip"
                                   data-placement="top" title="Supprimer"
                                   href="{{route('utilisateurs.delete',$user->id)}}"><i class="fas fa-trash"></i></a>
                            </td>

                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js">
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
        $('div.alert').not('.alert-important').delay(1500).fadeOut(350);
    </script>

@endsection



