@extends('layout')
@section('header title',' Enregistrements des Abscences ')
@section('content')

    <div class="container">
        <div class="row">
            <table
                class="table table-borderless table-bordered table-hover w-100 mt-2 shadow-lg mb-5 bg-white rounded">
                <thead class="table-secondary">
                <tr class="text-center">
                    <th scope="col">Reference Cojar</th>
                    <th scope="col">Nom & prenom</th>
                    <th scope="col">Date Debut Contrat</th>
                    <th scope="col">Date Fin Contrat</th>
                    <th scope="col">Site Affectation</th>
                    <th scope="col">Role</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($voltpr as $volontaire)
                    <tr class="text-center">
                        <th scope="row">{{$volontaire->ref_cojar}}</th>
                        <td>{{$volontaire->participant->nom_par}} {{$volontaire->participant->prenom_par}}</td>
                        <td>{{$volontaire->debut_contrat}}</td>
                        <td>{{$volontaire->fin_contrat}}</td>
                        <td>{{$volontaire->site_aff}}</td>
                        <td>{{$volontaire->role}}</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input bg-danger btn-lg statutvolt" data-id="{{$volontaire->id}}" value="{{$volontaire->id}}" name="statutvolt" type="checkbox"
                                >
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
                <button action="{{route('volontaires.controle')}}" class="btn bg-gradient-primary rounded-pill float-end mb-2" id="updatestatutvolt"><i class="fas fa-square-check text-light fa-lg  mr-2 "></i><span class="text-light fw-bold">Marquer Abscence</span></button>
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
            $(document).on('click','.statutvolt',function () {
                console.log('lkökjkk');
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



            $("#updatestatutvolt").click(function(e){

                e.preventDefault();
                console.log('before')
                var $this = $(this);
                var $action = $this.attr('action');
                var form={"ids_participants":ids_participants};
                $.ajax({
                    url: "{{route('volontaires.controle.update')}}",
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
