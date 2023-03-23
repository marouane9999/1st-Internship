
@extends('layout')
@section('content')
    <div class="">
        <form class="w-75 text-left m-auto rounded shadow-lg p-3 mb-5 bg-white rounded  " method="POST" action="{{$action}}">
            @csrf
            <div class="row m-3 ">
                <div class="col-sm-6">
                    <div class="form-column">
                        <div class="form-group col-xl-9">
                            <label for="inputEmail4 " class="font-weight-bold">Nom Participant*</label>
                            <input type="search" class="form-control col-xs-10 @error('nom_par') is-invalid @enderror" id="inputEmail4" placeholder="Nom Participant" name="nom_par" value={{ old('nom_par', $participant->nom_par) }}>
                            @error('nom_par')
                            <div class="is-invalid text-red ml-2" >
                                <i class='fas fa-exclamation-circle mr-2'></i>{{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-xl-9">
                            <label for="prenom_par"  class="font-weight-bold">Prenom Participant*</label>
                            <input type="search" class="form-control @error('prenom_par') is-invalid @enderror" id="inputPassword4" placeholder="Prenom Participant" name="prenom_par" value={{old('nom_par', $participant->prenom_par)}}>
                            @error('prenom_par')
                            <div class="is-invalid text-red ml-2" >
                                <i class='fas fa-exclamation-circle mr-2'></i>{{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-column">
                        <div class="form-group col-md-6 mt-1">
                            <label for=""  class="font-weight-bold" >Sexe</label><br>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="genre" class="custom-control-input" value="1" @if($participant->genre == 1) checked @endif>
                                <label class="custom-control-label font-weight-normal" for="customRadioInline2">Homme</label>
                            </div>&nbsp;&nbsp;&nbsp;
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="genre" class="custom-control-input" value="0" @if($participant->genre == 0) checked @endif >
                                <label class="custom-control-label font-weight-normal " for="customRadioInline1" >Femme</label>
                            </div>
                        </div>
                        <div class="form-group col-xl-9">
                            <label for="inputPassword4"  class="font-weight-bold">Numero d'accreditation</label>
                            <input type="number" class="form-control @error('num_acc') is-invalid @enderror " id="inputPassword4" min="1"   placeholder="Numero Accrediation" name="num_acc" value={{old('num_acc', $participant->num_acc )}}>
                            @error('num_acc')
                            <span class="is-invalid text-red ml-2"  >
                                <i class='fas fa-exclamation-circle mr-2'></i>{{$message}}
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-xl-9">
                            <label for="inputPassword4"  class="font-weight-bold">Numero de Passport*</label>
                            <input type="number" class="form-control @error('num_pass') is-invalid @enderror" min="1" id="inputPassword4" placeholder="Numero de Passport" name="num_pass" value={{old('num_pass', $participant->num_pass )}} >
                            @error('num_pass')
                            <span class="is-invalid ml-2 text-red" >
                              <i class='fas fa-exclamation-circle mr-2'></i>{{$message}}
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-xl-9">
                            <label for=""  class="font-weight-bold">Pays Delegation</label><br>
                            <select class="custom-select" name="pays_delg" required>
                                @foreach($countries as $key => $country)
                                    <option value="{{$key}}"  @if($key=='MA' || $key==$participant->pays_delg ) selected @endif>{{$country}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-column">
                        <div class="form-group col-xl-9">
                            <label for=" " name="site_compet" class="font-weight-bold">Site de Competition</label><br>
                            <select class="custom-select" name="site_compet" pay required>
                                @foreach($site_compet as $site_c)
                                    <option value="{{$site_c}}" @if($site_c==$participant->site_compet) selected @elseif($site_c=="") selected @endif>{{$site_c}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-xl-9">
                            <label for=""  class="font-weight-bold" name="cat_id">Categorie</label><br>
                            <select class="custom-select" name="cat_id" required>
                                @foreach($categories as $cat)
                                    <option value="{{$cat->id}}" @if($cat->id==$participant->cat_id) selected @endif>{{ucfirst($cat->des_cat)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-xl-9">
                            <label for=""   class="font-weight-bold" >Discipline</label><br>
                            <select class="custom-select" name="discipline" required>
                                @foreach($discipline as $dsc)
                                    <option value="{{$dsc}}" @if($dsc==$participant->discipline) selected @elseif($dsc=="") selected @endif >{{ucfirst($dsc)}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-xl-9">
                            <label for=""   class="font-weight-bold" >Vol Depart</label><br>
                            <select class="custom-select" name="vol_dep">
                                @foreach($vols as $vol)
                                    @if($vol->type_vol==1)
                                    <option value="{{$vol->id}}" @if($participant->vols_depart() && $vol->id == $participant->vols_depart()->id)  selected @endif >{{ucfirst($vol->numero_vol)}}--{{ucfirst($vol->terminal)}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-xl-9">
                            <label for=""   class="font-weight-bold" >Vol Arrivee</label><br>
                            <select class="custom-select" name="vol_arr" required>
                                @foreach($vols as $vol)
                                    @if($vol->type_vol==0)
                                        <option value="{{$vol->id}}" @if($participant->vols_arrive() && $vol->id == $participant->vols_arrive()->id) selected @endif >{{ucfirst($vol->numero_vol)}}--{{ucfirst($vol->terminal)}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-column">
                        <div class="form-group col-xl-9">
                            {{--                            <div class="alert bg-gradient-dark" role="alert">--}}
                            {{--                                <h4 ><span class="font-weight-bold">Chef Mission</span></h4>--}}
                            {{--                            </div>--}}
                            <label for="inputEmail4" class="font-weight-bold">Nom Chef de Mission*</label>
                            <input type="search" class="form-control @error('nom_chef') is-invalid @enderror " id="inputEmail4" placeholder="Nom Chef Mission" name="nom_chef" value={{old('nom_chef',$participant->chef_mission->nom_chef??'')}}>
                            @error('nom_chef')
                            <span class="is-invalid ml-2 text-red" >
                                <i class='fas fa-exclamation-circle mr-2'></i>{{$message}}
                            </span>
                            @enderror
                        </div>

                        <br>
                        <div class="form-group col-xl-9">
                            <label for="inputPassword4"    class="font-weight-bold">Prenom Chef de Mission*</label>
                            <input type="search" class="form-control @error('prenom_chef') is-invalid @enderror " id="inputPassword4" placeholder="Prenom Chef Mission" name="prenom_chef" value={{old('prenom_chef',$participant->chef_mission->prenom_chef??'')}}>
                            @error('prenom_chef')
                            <span class="is-invalid ml-2 text-red" >
                                <i class='fas fa-exclamation-circle mr-2 '></i>{{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>

                    <br>
                    <div class="form-column">
                        <div class="form-group col-xl-9">
                            <label for="inputEmail4"   class="font-weight-bold">Telephone</label>
                            <input type="number" class="form-control @error('tel') is-invalid @enderror " id="inputEmail4" placeholder="Telephone" name="tel" value={{old('tel',$participant->chef_mission->tel??'')}}>
                            @error('tel')
                            <span class="is-invalid ml-2 text-red" >
                                <i class='fas fa-exclamation-circle mr-2'></i>{{$message}}
                            </span>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group col-xl-9">
                            <label for="inputPassword4"    class="font-weight-bold">Numero Passport*</label>
                            <input type="number" class="form-control @error('num_passport') is-invalid @enderror " min="1" id="inputPassword4" placeholder="Numero Passport" name="num_passport" value={{old('num_passport',$participant->chef_mission->num_passport??'')}}>
                            @error('num_passport')
                            <span class="is-invalid ml-2 text-red" >
                              <i class='fas fa-exclamation-circle mr-2'></i>{{$message}}
                          </span>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end ">
                <button type="submit" class="btn btn-primary bg-gradient-primary "> <i class="nav-icon fas fa-save"></i>&nbsp;Enregistrer</button>
            </div>
            <br>



        </form>
    </div>


@endsection
