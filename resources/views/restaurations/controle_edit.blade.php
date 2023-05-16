@extends('layout')
@section('header title',' Validations des restaurations ')
@section('content')

    <div class="container">
        <div class="row">
            <table
                class="table table-borderless table-bordered table-hover w-100 mt-2 shadow-lg mb-5 bg-white rounded  ">
                <thead class="thead-dark">
                <tr class="text-left" >
                    <th scope="col">#</th>
                    <th scope="col">Numéro de restauration</th>
                    <th scope="col">Participant</th>
                    <th scope="col">Site de restauration</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Prestataire</th>
                    <th scope="col">Catégorie de repas</th>
                    <th scope="col">Statut</th>
                </tr>
                </thead>
                <tbody>
                @foreach($restnv as $restau)
                    <tr class="text-center">
                        <th scope="row">{{$restau->id}}</th>
                        <td>{{$restau->numero_rest}}</td>
                        <td>{{$restau->participant->nom_par}}  {{$restau->participant->prenom_par}}</td>
                        <td>{{$restau->site_restau}}</td>
                        <td>{{$restau->ville}}</td>
                        <td>{{$restau->prestataire}}</td>
                        <td>{{$restau->repas->des_rep}}</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input bg-danger btn-lg statutrest" data-id="{{$restau->id}}" value="{{$restau->id}}" name="statutrest" type="checkbox">
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
                <button action="{{route('restaurations.controle')}}" class="btn bg-gradient-primary rounded-pill float-end mb-2" id="updatestatutrest"><i class="fas fa-square-check text-light fa-lg  mr-2 "></i><span class="text-light fw-bold">Valider Restaurations</span></button>
            </div>
        </div>
    </div>

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers:{
                "X-CSRF-TOKEN" : "{{csrf_token()}}"
            }
        })

        $(function () {
            var ids_participants=[];
            $(document).on('click','.statutrest',function () {
                id = $(this).data('id');
                var test = ids_participants.includes(id);
                if ($(this).is(':checked')) {
                    $(this).addClass('bg-success');
                    $(this).removeClass('bg-danger')

                }else{
                    $(this).addClass('bg-danger');
                    $(this).removeClass('bg-success')
                }

                if (test) {
                    const index = ids_participants.indexOf(id);
                    ids_participants.splice(index, 1);
                }
                else {
                    ids_participants.push(id)
                }
                console.log(ids_participants)
            });



            $("#updatestatutrest").click(function(e){

                e.preventDefault();
                console.log('before')
                var $this = $(this);
                var $action = $this.attr('action');
                var form={"ids_participants":ids_participants};
                $.ajax({
                    url: "{{route('restaurations.controle.update')}}",
                    type: 'POST',
                    dataType: 'json',
                    data:form,
                    success: function (response) {
                        if (response.success) {
                            setTimeout(
                                function () {
                                    window.location.href=$action;
                                }, 1000);

                        } else {

                        }
                    },

                }).done(function(data){

                })
            })

        });})

</script>
