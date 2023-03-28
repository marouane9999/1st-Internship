@extends('layout')
@section('header title','Dashboard')
@section('content')

                   <div class="container" >
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{$count_ptc}}</h3>
                                    <p>Total des Participants</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-alt"></i>
                                </div>
                                <a href="{{route('participants.index')}}" class="small-box-footer">Plus d'infotmations<i class="fas fa-arrow-circle-right ml-1"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{$count_volontaire}}</h3>
                                    <p>Total des Volontaires</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-tag"></i>
                                </div>
                                <a href="{{route('volontaires.index')}}" class="small-box-footer">Plus d'infotmations<i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="small-box bg-fuchsia">
                                <div class="inner">
                                    <h3>{{$count_chefm}}</h3>
                                    <p>Total des Chefs Mission</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-id-badge"></i>
                                </div>
                                <a href="#" class="small-box-footer">Plus d'infotmations<i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                           <div class="col-lg-4">
                               <div class="small-box bg-primary">
                                   <div class="inner">
                                       <h3>{{$count_rest}}</h3>
                                       <p>Total des restaurations</p>
                                   </div>
                                   <div class="icon">
                                       <i class="fas fa-hamburger"></i>
                                   </div>
                                   <a href="{{route('restaurations.index')}}" class="small-box-footer">More info<i class="fas fa-arrow-circle-right"></i></a>
                               </div>
                           </div>
                           <div class="col-lg-4">
                               <div class="small-box bg-cyan">
                                   <div class="inner">
                                       <h3>{{$count_hbg}}</h3>
                                       <p>Total des Hebergements</p>
                                   </div>
                                   <div class="icon">
                                       <i class="fas fa-bed"></i>
                                   </div>
                                   <a href="{{route('hebergements.index')}}" class="small-box-footer">Plus d'infotmations <i class="fas fa-arrow-circle-right"></i></a>
                               </div>
                           </div>
                           <div class="col-lg-4">
                               <div class="small-box  bg-gradient-dark">
                                   <div class="inner">
                                       <h3>{{$count_vol}}</h3>
                                       <p>Total des vols</p>
                                   </div>
                                   <div class="icon">
                                       <i class="fas fa-plane"></i>
                                   </div>
                                   <a href="{{route('vols.index')}}" class="small-box-footer">Plus d'infotmations <i class="fas fa-arrow-circle-right"></i></a>
                               </div>
                           </div>
                       </div>
                    <div class="row mt-5">

                       </div>
                   </div>
            </div>
@endsection