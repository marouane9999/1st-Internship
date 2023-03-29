<div class="modal fade" id="volontaireModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-tag fa-flip"></i> {{$title}}</h5>
                <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="text-left" id="volontaireModalForm" method="POST" action="{{$action}}">
                @csrf
                <div class="modal-body p-5">
                    <div class="row ">
                        <div class="col-sm-12">
                            <div class="form-group row">
                                <label for="participant_id"  class="font-weight-bold ">Reference COJAR:</label>
                                <input type="number" class="custom-select" name="ref_cojar" @if($volontaire->ref_cojar) value={{old('ref_cojar',$volontaire->ref_cojar)}}  @endif>
                            </div><div class="form-group row">
                                <label for="tel"  class="font-weight-bold ">Tel:</label>
                                <input type="number" class="custom-select" name="tel" @if($volontaire->tel) value={{old('tel',$volontaire->tel)}}  @endif>
                            </div>

                            <div class="form-group row">
                                <label for="participant_id"  class="font-weight-bold ">Volontaire:</label>
                                <select class="custom-select" name="participant_id"  required>
                                    @foreach($participants as $participant)
                                        @if($participant->categorie->id==1)
                                        <option value="{{$participant->id}}" @if($participant->id == $volontaire->participant_id) selected  @endif>{{$participant->nom_par.' '.$participant->prenom_par}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="site_heberg"  class="font-weight-bold ">Site d' Affectation:</label>
                                <select class="custom-select" name="site_aff"  required>
                                    @foreach($site_aff as $siteaff)
                                        <option value="{{$siteaff}}" @if($siteaff==$volontaire->site_aff) selected @endif>{{$siteaff}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="type_cham"  class="font-weight-bold ">Role:</label>
                                <select class="custom-select" aria-label="Default select example" name="role">
                                    @foreach($roles as $role)
                                    <option value="{{$role}}">{{$role}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-column">
                            <div class="form-group row ">
                                <label for="date_checkin"  class="font-weight-bold " >Debut Contrat:</label><br>
                                <input type="date" class="custom-select" name="debut_contrat" @if($volontaire->debut_contrat) value={{old('debut_contrat',$volontaire->debut_contrat)}} @else value="{{date("Y-m-d")}}" @endif >
                            </div>
                            <div class="form-group row ">
                                <label for="date_checkout"  class="font-weight-bold " >Fin Contrat:</label><br>
                                <input type="date" class="custom-select" name="fin_contrat" @if($volontaire->fin_contrat) value={{old('fin_contrat',$volontaire->fin_contrat)}} @else value="{{date("2025-m-d")}}" @endif>
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

