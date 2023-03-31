<div class="modal fade" id="restaurationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient-olive">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-utensils fa-flip"></i> {{$title}}</h5>
                <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="text-left" id="restaurationModalForm" method="POST" action="{{$action}}">
                @csrf
                <div class="modal-body p-5">
                    <div class="row ">
                        <div class="col-sm-12">
                            <div class="form-group row">
                                <label for="numero_rest" class="font-weight-bold">Numéro de réstauration:</label>
                                <input type="number" class="form-control" id="numero_rest"
                                       placeholder="Numéro de restauration" name="numero_rest">
                            </div>
                            <div class="form-group row">
                                <label for="site_restau" class="font-weight-bold ">Site de réstauration:</label>
                                <select class="custom-select" name="site_restau" required>
                                    @foreach($site_restau as $siterestau)
                                        <option value="{{$siterestau}}" @if($siterestau=='AGORA BEACH') selected @endif>
                                            {{$siterestau}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="ville" class="font-weight-bold ">Ville:</label>
                                <input type="search" class="form-control" id="ville" name="ville">
                            </div>
                            <div class="form-group row">
                                <label for="prestataire" class="font-weight-bold ">Préstataire:</label>
                                <input type="search" class="form-control" id="prestataire" placeholder="Prestataire"
                                       name="prestataire">
                            </div>
                            <div class=" form-group row">
                                <label for="rep_id" class="font-weight-bold" name="rep_id">Catégorie de
                                    repas:</label><br>
                                <select class="custom-select" name="rep_id" required>
                                    @foreach($repas as $rep)
                                        <option value="{{$rep->id}}"
                                                @if($rep->id==$restauration->rep_id) selected @endif>
                                            {{ucfirst($rep->des_rep)}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class=" form-group row">
                                <label for="participant_id" class="font-weight-bold ">Participant:</label>
                                <select class="custom-select" name="participant_id" required>
                                    @foreach($participants as $participant)
                                        <option value="{{$participant->id}}"
                                                @if($participant->id == $restauration->participant_id) selected @endif>
                                            {{$participant->nom_par.' '.$participant->prenom_par}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                </div>
            </form>


        </div>
    </div>
</div>

