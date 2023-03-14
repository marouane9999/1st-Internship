@extends('layout')
@section('content')
    <center>

        <form class="w-75 text-left" method="POST" action="{{route('participants.store')}}">
            @csrf
            @method('POST')
            <div class="row ">
                <div class="col-sm-6">
                    <div class="form-column">
                        <div class="form-group col-xl-9">

                            <label for="inputEmail4 " class="font-weight-bold">Nom Participant</label>
                            <input type="text" class="form-control col-xs-10 " id="inputEmail4" placeholder="Nom Participant" name="nom_par">
                        </div>
                        <div class="form-group col-xl-9">
                            <label for="inputPassword4"  class="font-weight-bold">Prenom Participant</label>
                            <input type="text" class="form-control" id="inputPassword4" placeholder="Prenom Participant" name="prenom_par">
                        </div>
                    </div>
                    <div class="form-column">
                        <div class="form-group col-md-6 mt-1">
                            <label for=""  class="font-weight-bold" >Genre</label><br>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="genre" class="custom-control-input" value="true" checked>
                                <label class="custom-control-label font-weight-normal" for="customRadioInline2">Homme</label>
                            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="genre" class="custom-control-input" value="false">
                                <label class="custom-control-label font-weight-normal " for="customRadioInline1" >Femme</label>
                            </div>

                        </div>
                        <div class="form-group col-xl-9">
                            <label for="inputPassword4"  class="font-weight-bold">Numero d'accreditation</label>
                            <input type="text" class="form-control" id="inputPassword4" placeholder="Numero Accrediation" name="num_acc">
                        </div>

                        <div class="form-group col-xl-9">
                            <label for="inputPassword4"  class="font-weight-bold">Numero de Passport</label>
                            <input type="text" class="form-control" id="inputPassword4" placeholder="Numero de Passport" name="num_pass">
                        </div>
                        <div class="form-group col-xl-9">
                            <label for=""  class="font-weight-bold">Pays Delegation</label><br>
                            <select class="custom-select" name="pays_delg" required>
                                @foreach($countries as $key => $country)
                                    <option value="{{$key}}" @if($key=='MA') selected @endif>{{$country}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-column">
                        <div class="form-group col-xl-9">
                            <label for=" " name="site_compet" class="font-weight-bold">Site de Competition</label><br>
                            <select class="custom-select" name="site_compet" pay required>
                                @foreach($site_compet as $site_c)
                                <option value="{{$site_c}}" @if($site_c=='Stade olympique de Rome') selected @endif>{{$site_c}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group col-xl-9">
                            <label for=""  class="font-weight-bold" name="cat_id">Categorie</label><br>
                            <select class="custom-select" name="cat_id" required>
                                @foreach($categories as $cat)
                                    <option value={{$cat->id}}>{{ucfirst($cat->des_cat)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-xl-9">
                            <label for=""   class="font-weight-bold" >Discipline</label><br>
                            <select class="custom-select" name="discipline" required>
                                @foreach($discipline as $dsc)
                                    <option value="{{$dsc}}">{{ucfirst($dsc)}}</option>
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
                            <label for="inputEmail4"   class="font-weight-bold">Nom Chef de Mission</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Nom Chef Mission" name="nom_chef">
                        </div><br>
                        <div class="form-group col-xl-9">
                            <label for="inputPassword4"    class="font-weight-bold">Prenom Chef de Mission</label>
                            <input type="text" class="form-control" id="inputPassword4" placeholder="Prenom Chef Mission" name="prenom_chef">
                        </div>
                    </div><br>
                    <div class="form-column">
                        <div class="form-group col-xl-9">
                            <label for="inputEmail4"   class="font-weight-bold">Telephone</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Telephone" name="tel">
                        </div><br>
                        <div class="form-group col-xl-9">
                            <label for="inputPassword4"    class="font-weight-bold">Numero Passport</label>
                            <input type="text" class="form-control" id="inputPassword4" placeholder="Numero Passport" name="num_passport">
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end ">
                <button type="reset" class="btn btn-danger "> <i class="nav-icon fas fa-trash"></i>&nbsp;&nbsp;Renitialiser</button>&nbsp;&nbsp;
                <button type="submit" class="btn btn-primary "> <i class="nav-icon fas fa-save"></i>&nbsp;&nbsp;Enregistrer</button>
            </div>
            <br>



        </form>
    </center>



@endsection
