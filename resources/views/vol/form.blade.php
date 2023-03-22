<div class="modal fade" id="volModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$title}}</h5>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="text-left" id="volModalForm" method="POST" action="{{$action}}">
                    @csrf
                <div class="modal-body p-5">
                        <div class="row ">
                            <div class="col-sm-12">
                                <div class="form-column">
                                    <div class="form-group row">
                                        <label for="inputEmail4" class="font-weight-bold ">Numéro de vol:</label>
                                        <input type="text" class="form-control @error('numero_vol') is-invalid @enderror" id="inputEmail4" placeholder="Ajouter un numéro" name="numero_vol" value={{old('numero_vol',$vol->numero_vol)}}>
                                        @error('numero_vol')
                                            <div class="is-invalid text-red ml-2" >
                                                <i class='fas fa-exclamation-circle mr-2'></i>{{$message}}
                                            </div>
                                        @enderror
                                            </div>

                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword4"  class="font-weight-bold ">Type de vol:</label>
                                        <select class="custom-select @error('type_vol') is-invalid @enderror" aria-label="Default select example" name="type_vol" value="">
                                            <option value="true">Départ</option>
                                            <option value="false">Arrivée</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-column">
                                    <div class="form-group row ">
                                        <label for=""  class="font-weight-bold " >Date de vol:</label><br>
                                        <input type="datetime-local" class="custom-select  @error('date_vol') is-invalid @enderror" name="date_vol" value={{old('date_vol')}}>
                                        @error('date_vol')
                                        <div class="is-invalid text-red ml-2" >
                                            <i class='fas fa-exclamation-circle mr-2'></i>{{$message}}
                                        </div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword4"  class="font-weight-bold ">Aéroport:</label>
                                        <select class="custom-select" name="terminal"  required>
                                            @foreach($aeroport as $aero)
                                                <option value="{{$aero}}" @if($aero=='Aéroport de Ouarzazate') selected @endif>{{$aero}}</option>
                                            @endforeach

                                        </select>
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

