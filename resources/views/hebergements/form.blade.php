<div class="modal fade" id="hebergementModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$title}}</h5>
                <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="text-left" id="hebergementModalForm" method="POST" action="{{$action}}">
                @csrf
                <div class="modal-body p-5">
                    <div class="row ">
                        <div class="col-sm-12">
                            <div class="form-group row">
                                <label for="participant_id" class="font-weight-bold ">Participant:</label>
                                <select class="custom-select" name="participant_id" required>
                                    @foreach($participants as $participant)
                                        <option value="{{$participant->id}}"
                                                @if($participant->id == $hebergement->participant_id) selected @endif>
                                            {{$participant->nom_par.' '.$participant->prenom_par}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="site_heberg" class="font-weight-bold ">Site d' hébergement:</label>
                                <select class="custom-select" name="site_heberg" required>
                                    @foreach($site_heberg as $siteheberg)
                                        <option value="{{$siteheberg}}"
                                                @if($siteheberg=='Atlas Sky Airport') selected @endif>{{$siteheberg}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label for="type_cham" class="font-weight-bold ">Type de chambre:</label>
                                <select class="custom-select" aria-label="Default select example" name="type_cham">
                                    <option value="true">Single</option>
                                    <option value="false">Double</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-column">
                            <div class="form-group row ">
                                <label for="date_checkin" class="font-weight-bold ">Date Check in:</label><br>
                                <input type="date" class="custom-select" name="date_checkin"
                                       @if($hebergement->date_checkin) value={{old('date_checkin',$hebergement->date_checkin)}} @else value="{{date("Y-m-d")}}" @endif >
                            </div>
                            <div class="form-group row ">
                                <label for="date_checkout" class="font-weight-bold ">Date Check out:</label><br>
                                <input type="date" class="custom-select" name="date_checkout"
                                       @if($hebergement->date_checkout) value={{old('date_checkout',$hebergement->date_checkout)}} @else value="{{date("2025-m-d")}}" @endif>
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

