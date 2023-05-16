@extends('layout')
@section('header title',' Validation des Réservations ')
@section('content')

    <div class="container">
        <div class="row">
            <table
                class="table table-borderless table-bordered table-hover w-100 mt-2 shadow-lg mb-5 bg-white rounded  ">
                <thead class="table-dark">
                <tr class="text-center">
                    <th scope="col">Nom & Prenom</th>
                    <th scope="col">Numero Passport</th>
                    <th scope="col">Numero Vol</th>
                    <th scope="col">Terminal</th>
                    <th scope="col">Date/Horraire</th>
                    <th scope="col">Validation</th>
                </tr>
                </thead>
                <tbody>
                <form>
                @foreach($participantsnv as $ptcnv)
                </form>
                    <tr class="text-center">
                        <td>{{$ptcnv->nom_par}} {{$ptcnv->prenom_par}}</td>
                        <td>{{$ptcnv->num_pass}}</td>
                        <td>{{$ptcnv->numero_vol}}</td>
                        <td>{{$ptcnv->terminal}}</td>
                        <td>{{date('d/m/y H:i',strtotime($ptcnv->date_vol))}}</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input bg-danger statutvol btn-lg " data-id="{{$ptcnv->pivot_id}}" value="{{$ptcnv->pivot_id}}" name="statut" type="checkbox"
                                       >
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $participantsnv->withQueryString()->links() }}
            </div>
            <div>
                <button action="{{route('vols.controle')}}" class="btn bg-gradient-primary rounded-pill float-end mb-2" id="updatestatut"><i class="fas fa-square-check text-light fa-lg  mr-1 "></i><span class="text-light fw-bold">Valider</span></button>
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
            $(document).on('click','.statutvol',function () {
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
                // console.log(ids_participants)
            });



            $("#updatestatut").click(function(e){

                e.preventDefault();
                var $this = $(this);
                var $action = $this.attr('action');
                var form={"ids_participants":ids_participants};
                $.ajax({
                    method: 'POST',
                    url: "{{route('vols.controle.update')}}",
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
