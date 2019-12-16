@extends('layouts.persoArea')

@section('meta_title')
Mon agenda professionnel - {{ $user->first_name }} {{ $user->last_name }}
@endsection

@section('contentPagePerso')

        <div class="scheduler bg-white shadow-sm px-6 py-6">

            @if (session('status'))
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="alert {{ session('alert-class') }}" role="alert">
                        <i class="fas fa-check-circle"></i> {{ session('status') }}
                    </div>
                </div>
            </div>
            @endif

            <h2>Mon agenda</h2>

            @php
            use App\User;
            setlocale (LC_TIME, 'fr_FR','fra');
            $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
            $dateFr = utf8_encode(strftime('%d %B %Y', strtotime($date)));

            // ######################### MOBILE ###############################
            $previousDay = date('Y-m-d', strtotime($date .' -1 day'));
            $nextDay = date('Y-m-d', strtotime($date .' +1 day'));

            $linkPrevDay = '<a href="?date='.$previousDay.'"><i class="fas fa-arrow-left"></i></a>';
            $linkNextDay='<a href="?date=' .$nextDay.'"><i class="fas fa-arrow-right"></i></a>';
            @endphp

            <!-- <div id="gridMobile" class="d-none"> -->
            <div id="gridMobile">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="arrows">@php echo $linkPrevDay; @endphp</th>
                            <th>@php echo $dateFr; @endphp</th>
                            <th class="arrows">@php echo $linkNextDay; @endphp</th>
                    </thead>
                    <tbody>
                        @php
                        $timeStart = 8;
                        $timeEnd = 18;

                        for($i=$timeStart; $i<=$timeEnd; $i++){
                            if($i<10){
                                $i="0" .$i;
                            }
                            $tartempion=$date.'_'.$i;
                            $rdv='Dispo';
                            $add_class='data-rdv page-agenda agenda-mobile';
                            $id_rdv='Dispo';
                            echo '<tr>';
                            echo "<th class=\" col-hour\"> {$i}h </th>";

                            if (isset($rdvs)){
                                foreach ($rdvs as $value) {
                                    if ($tartempion==$value->data_tartempion) {
                                        if (isset($value->id_client)) {
                                            $client = User::find($value->id_client);
                                            $rdv = 'RDV avec '.$client->first_name.' '.$client->last_name;
                                            $add_class.=' rdv-loaded rdv-pro';
                                        }else{
                                            $rdv=$value->content;
                                            $add_class.=' rdv-loaded';
                                        }
                                    $id_rdv=$value->id;
                                    }
                                }
                            }

                            echo '<td colspan="2" class="'.$add_class.'" data-pro="'.$user->id.'" data-token="'.csrf_token().'" data-tartempion="'.$tartempion.'">'.$rdv.'</td>';
                            if ($add_class==='data-rdv page-agenda agenda-mobile rdv-loaded') {
                                echo '<td class="btn-agenda agenda-modif" data-id="'.$id_rdv.'" data-tartempion="'.$tartempion.'" style="position: absolute;right:100px;"><a href="#">Modifier</a></td>';
                                echo '<td class="btn-agenda agenda-suppr" data-id="'.$id_rdv.'"     data-tartempion="'.$tartempion.'" style="position: absolute;right:15px;"><a href="#">Supprimer</a></td>';
                            }elseif ($add_class==='data-rdv page-agenda agenda-mobile rdv-loaded rdv-pro') {
                                echo '<td class="btn-agenda agenda-annul" data-id="'.$id_rdv.'" data-tartempion="'.$tartempion.'" style="position: absolute;right:15px;"><a href="#">Annuler</a></td>';
                            }

                            echo '</tr>';
                        }
                        echo '</tbody>';
                    echo '</table>';
                echo '</div>';


            // ######################### DESKTOP ###############################
            $days = ['monday','tuesday','wednesday','thursday','friday'];

            //$dayWeek = date('Y-m-d', strtotime('last monday', strtotime($date)));
            //$dayOfWeek = strftime('%A %d', strtotime($dayWeek));

            $previousWeek = date('Y-m-d', strtotime($date .' -1 week'));
            $nextWeek = date('Y-m-d', strtotime($date .' +1 week'));

            $linkPrevWeek = '<a href="?date='.$previousWeek.'"><i class="fas fa-arrow-left"></i></a>';
            $linkNextWeek='<a href="?date=' .$nextWeek.'"><i class="fas fa-arrow-right"></i></a>';
            //<i class="fas fa-arrow-right"></i>

            $monthFindFr = mb_strtoupper(utf8_encode(strftime('%B %Y', strtotime($date)))); // novembre 2019
            echo "<h5 class=\"text-center titleAgendaDesk\">$monthFindFr</h5>";


            // $dd = strftime('%A %d', strtotime($date)); // vendredi 29


            $gridD = '<div id="gridDesktop">';
            $gridD .= '<table class="table table-striped table-bordered">';
            $gridD .= '<thead>';
            $gridD .= '<tr>';
            $gridD .= "<th class=\"arrows\"> $linkPrevWeek </th>";
            for($i=0;$i<count($days);$i++){
                if(date('l',strtotime($date))==='Monday'){
                    $monday = date('Y-m-d', strtotime('monday', strtotime($date)));
                    $date_tar = $monday;
                }else{
                    $monday = date('Y-m-d', strtotime('last monday', strtotime($date)));
                    $date_tar = $monday;
                }
                $nextDay = date('Y-m-d', strtotime("+{$i} day", strtotime($monday)));
                $dayOfWeek = ucfirst(strftime('%A %d', strtotime($nextDay)));
                $gridD .= "<th>$dayOfWeek</th>";
            }
            $gridD .= "<th class=\"arrows\"> $linkNextWeek </th>";
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
                        $rdv='Dispo';
                        $add_class='data-rdv page-agenda agenda-desktop';
                        $id_rdv='Dispo';
                        if (isset($rdvs)){
                        foreach ($rdvs as $value) {
                            if ($tartempion==$value->data_tartempion) {
                                if (isset($value->id_client)) {
                                    $client = User::find($value->id_client);
                                    $rdv = 'RDV avec '.$client->first_name.' '.$client->last_name;
                                    $add_class.=' rdv-loaded rdv-pro';
                                }else {
                                    $rdv=$value->content;
                                    $add_class.=' rdv-loaded';
                                }
                                $id_rdv=$value->id;
                            }
                        }
                    }
                    $gridD .= "<td class=\"".$add_class."\" data-tartempion=".$tartempion." data-id=".$id_rdv." data-pro=".$user->id." data-token=".csrf_token().">".$rdv."</td>";
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
@endsection
