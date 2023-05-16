<div class="modal fade" id="utilisateurModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient-gray-dark">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plane fa-flip"></i> {{$title}}</h5>
                <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-light">&times;</span>
                </button>
            </div>
            <form class="text-left" id="utilisateurModalForm" method="POST" action="{{$action}}">
                @csrf
                <div class="modal-body p-5">
                    <div class="row ">
                        <div class="col-sm-12">
                            <div class="form-column">
                                <div class="form-group row">
                                    <label for="inputEmail4" class="font-weight-bold ">Nom:</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           id="inputEmail4" placeholder="Nom Utilisateur" name="name"
                                           value={{old('name',$user->name)}}>
                                    @error('name')
                                    <div class="is-invalid text-red ml-2">
                                        <i class='fas fa-exclamation-circle mr-2'></i>{{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail4" class="font-weight-bold ">Email:</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                           id="inputEmail4" placeholder="Email" name="email"
                                           value={{old('name',$user->email)}}>
                                    @error('email')
                                    <div class="is-invalid text-red ml-2">
                                        <i class='fas fa-exclamation-circle mr-2'></i>{{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div>
                                    <div class="form-group row">
                                        <label for="inputEmail4" class="font-weight-bold ">Password:</label>
                                        <input type="text" class="form-control @error('password') is-invalid @enderror"
                                               id="inputEmail4" placeholder="Email" name="email"
                                               value={{old('password',$user->password)}}>
                                        @error('password')
                                        <div class="is-invalid text-red ml-2">
                                            <i class='fas fa-exclamation-circle mr-2'></i>{{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="inputPassword4" class="font-weight-bold ">Role:</label>
                                <select class="custom-select @error('type_vol') is-invalid @enderror"
                                        aria-label="Default select example" name="role" value="">
                                    @foreach($roles as $r)
                                    <option value="{{$r->id}}">{{ucfirst($r->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>


        </div>
    </div>
</div>

