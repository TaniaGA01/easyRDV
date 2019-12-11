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
        <div class="form-style-5 bg-white shadow-sm col-md-9 py-4">
            <h4 class="card-title">Mon agenda</h4>

            @php
            use App\User;
            setlocale (LC_TIME, 'fr_FR','fra');
            $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
            $dateFr = utf8_encode(strftime('%d %B %Y', strtotime($date)));

            // ######################### MOBILE ###############################
            $previousDay = date('Y-m-d', strtotime($date .' -1 day'));
            $nextDay = date('Y-m-d', strtotime($date .' +1 day'));

            $linkPrevDay = '<a href="?date='.$previousDay.'"><</a>';
            $linkNextDay = '<a href="?date='.$nextDay.'">></a>';
            @endphp

            <div id="gridMobile" class="d-none">
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
                        if($i<10){
                            $i = "0".$i;
                        }
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
                                        $client = User::find($value->id_client);
                                        $rdv = 'Rdv avec '.$client->first_name.' '.$client->last_name;
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
                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';

                    
                    // ######################### DESKTOP ###############################
                    $days = ['monday','tuesday','wednesday','thursday','friday','saturday','sunday'];

                    //$dayWeek = date('Y-m-d', strtotime('last monday', strtotime($date)));
                    //$dayOfWeek = strftime('%A %d', strtotime($dayWeek));

                    $previousWeek = date('Y-m-d', strtotime($date .' -1 week'));
                    $nextWeek = date('Y-m-d', strtotime($date .' +1 week'));

                    $linkPrevWeek = '<a href="?date='.$previousWeek.'"><</a>';
                    $linkNextWeek = '<a href="?date='.$nextWeek.'">></a>';


                    $monthFindFr = mb_strtoupper(utf8_encode(strftime('%B %Y', strtotime($date)))); // novembre 2019
                    echo "<h2>$monthFindFr</h2>";

                    // $dd = strftime('%A %d', strtotime($date)); // vendredi 29


                    $gridD = '<div id="gridDesktop">';
                    $gridD .= '<table class="paleBlueRows">';

                    $gridD .= '<thead>';
                    $gridD .= '<tr>';
                    $gridD .= "<th> $linkPrevWeek </th>";
                    for($i=0;$i<count($days);$i++){
                        if(date('l',strtotime($date))==='Monday'){
                            $monday = date('Y-m-d', strtotime('monday', strtotime($date)));
                            $date_tar = $monday;
                        }else{
                            $monday = date('Y-m-d', strtotime('last monday', strtotime($date)));
                            $date_tar = $monday;
                        }
                        
                        $nextDay = date('Y-m-d', strtotime("+{$i} day", strtotime($monday)));
                        $dayOfWeek = strftime('%A %d', strtotime($nextDay));

                        $gridD .= "<th>$dayOfWeek</th>";
                    }
                    $gridD .= "<th> $linkNextWeek </th>";
                    $gridD .= '</tr>';
                    $gridD .= '</thead>';
                    $gridD .= '<tbody>';

                    for($i=$timeStart;$i<=$timeEnd;$i++){
                        if($i<10){
                            $i = "0".$i;
                        }
                        $gridD .= '<tr>';
                        $gridD .= "<td> {$i}h </td>";
                        for($j=0;$j<=count($days);$j++){
                            if($j<count($days)){
                                $date_tar_day = date('Y-m-d', strtotime($date_tar .' +'.$j.' day'));
                                $tartempion=$date_tar_day.'_'.$i;

                                $gridD .= "<td data-tartempion=".$tartempion."> # </td>";
                            }else{
                                $gridD .= "<td> {$i}h </td>";
                            } 
                        }
                        $gridD .= '</tr>';
                    }
                    $gridD .= '</tbody>';
                    $gridD .= '</table>';
                    $gridD .= '</div>';

                    echo $gridD;
                    @endphp
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
