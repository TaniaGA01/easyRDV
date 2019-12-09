@extends('layouts.persoArea')
@section('contentPagePerso')
<div class="container">
    @if (session('status'))
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert {{ session('alert-class') }}" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('status') }}
            </div>
        </div>
    </div>
    @endif
    <div class="row justify-content-center ">
        <div class="col-md-8">

            @php
            setlocale (LC_TIME, 'fr_FR','fra');
            $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
            $dateFr = utf8_encode(strftime('%d %B %Y', strtotime($date)));

            // ######################### MOBILE ###############################
            $previousDay = date('Y-m-d', strtotime($date .' -1 day'));
            $nextDay = date('Y-m-d', strtotime($date .' +1 day'));

            $linkPrevDay = '<a href="?date='.$previousDay.'"><</a>';
            $linkNextDay = '<a href="?date='.$nextDay.'">></a>';
            @endphp

            <div id="gridMobile">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>@php echo $linkPrevDay; @endphp</th>
                            <th>@php echo $dateFr; @endphp</th>
                            <th>@php echo $linkNextDay; @endphp</th>
                    </thead>
                    <tbody>
                    @php
                    $timeStart = 8;
                    $timeEnd = 18;

                    for($i=$timeStart; $i<=$timeEnd; $i++){

                        $tartempion = $date.'_'.$i;
                        $rdv='#';
                        $add_class='data-rdv page-agenda';
                        $id_rdv='#';

                        echo '<tr>';
                        echo "<th class=\"col-hour\"> {$i}h </th>";

                        if (isset($rdvs)){
                            foreach ($rdvs as $value) {
                                if ($tartempion==$value->data_tartempion) {
                                    if (isset($value->id_client)) {
                                        $rdv=$value->id_client;
                                        $add_class.=' rdv-loaded rdv-pro';
                                    }else {
                                        $rdv=$value->content;
                                        $add_class.=' rdv-loaded';
                                    }
                                    $id_rdv=$value->id;
                                }
                            }
                        }

                        echo '<td colspan="2" class="'.$add_class.'" data-pro="'.$user->id.'" data-token="'.csrf_token().'" data-tartempion="'.$tartempion.'">'.$rdv.'</td>';
                        if ($add_class==='data-rdv page-agenda rdv-loaded') {
                            echo '<td class="btn-agenda agenda-modif" data-id="'.$id_rdv.'" data-tartempion="'.$tartempion.'" style="position: absolute;right:100px;"><a href="#">Modifier</a></td>';
                            echo '<td class="btn-agenda agenda-suppr" data-id="'.$id_rdv.'" data-tartempion="'.$tartempion.'" style="position: absolute;right:15px;"><a href="#">Supprimer</a></td>';
                        }elseif ($add_class==='data-rdv page-agenda rdv-loaded rdv-pro') {
                            echo '<td class="btn-agenda agenda-annul" data-id="'.$id_rdv.'" data-tartempion="'.$tartempion.'" style="position: absolute;right:15px;"><a href="#">Annuler</a></td>';
                        }

                        echo '</tr>';
                    }
                    @endphp
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
