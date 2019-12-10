@extends('layouts.app')

@section('content')

@isset($pro[0])

<div class="container ptb-5">
    <div class="row">
        <!-- présentation professionnel -->
        <div class="form-style-5 bg-white shadow-sm col-3 px-4 py-4 min-height">
            <img src="{{$pro[0]->image}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h4 class="card-title text-center">{{ $pro[0]->first_name }} {{ Str::upper($pro[0]->last_name) }}</h4>
                <p class="card-text text-center">{{ $pro[0]->profession->name }}</p>
                <p class="card-text"><i class="far fa-calendar-alt"></i><strong> Horaires</strong><br>
                    Lundi au vendredi 8h - 18h</p>
                <p class="card-text"><i class="fas fa-map-marker"></i><strong> Adresse</strong><br>
                    {{ $pro[0]->adresse }}<br>
                    {{ $pro[0]->city->name_ville }} </p>
                <p class="card-text"><i class="fas fa-phone"></i><strong> Téléphone</strong><br>
                    {{ $pro[0]->phone_number }}</p>
                <p class="card-text"><i class="fas fa-globe"></i><strong> Site web</strong><br>
                    www.buroscope.bzh</p>
            </div>
        </div>

        <div class="form-style-5 bg-white shadow-sm col-md-9 py-4">

            @if (session('status'))
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="alert {{ session('alert-class') }}" role="alert">
                        <i class="fas fa-check-circle"></i> {{ session('status') }}
                    </div>
                </div>
            </div>
            @endif
            @isset($pro[0]->about)
                <h4 class="card-title">A propos</h4>
                <p>{{ $pro[0]->about }}</p>
            @endisset

            <h4 class="card-title">Prendre rendez-vous</h4>

            @php
            setlocale (LC_TIME, 'fr_FR.utf8','fra');
            $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
            $dateFr = strftime('%d %B %Y', strtotime($date));
            $timeStart = 8; // Heure du début de l'agenda
            $timeEnd = 18; // Heure de fin de l'agenda

            // ######################### DESKTOP ###############################
            //$days = ['lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche'];
            $days = ['monday','tuesday','wednesday','thursday','friday'];

            //$dayWeek = date('Y-m-d', strtotime('last monday', strtotime($date)));
            //$dayOfWeek = strftime('%A %d', strtotime($dayWeek));

            $previousWeek = date('Y-m-d', strtotime($date .' -1 week'));
            $nextWeek = date('Y-m-d', strtotime($date .' +1 week'));

            $linkPrevWeek = '<a href="?date='.$previousWeek.'"><i class="fas fa-arrow-left"></i></a>';
            $linkNextWeek = '<a href="?date='.$nextWeek.'"><i class="fas fa-arrow-right"></i></a>';


            $monthFindFr = strtoupper(utf8_encode(strftime('%B %Y', strtotime($date)))); // novembre 2019
            echo "<h5 class=\"text-center\">$monthFindFr</h5>";

            // $dd = strftime('%A %d', strtotime($date)); // vendredi 29


            $gridD = '<div id="gridDesktop">';
            $gridD .= '<table class="table table-striped table-bordered">';

            $gridD .= '<thead>';
            $gridD .= '<tr>';
            $gridD .= "<th> $linkPrevWeek </th>";

            $visiteur='#';
            if (isset($user)) {
                $visiteur=$user->id;
            }

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
            $gridD .= "<th> $linkNextWeek </th>";
            $gridD .= '</tr>';
            $gridD .= '</thead>';
            $gridD .= '<tbody>';

            // <th> 8h </th><td colspan="2" class="data-rdv" data-pro="1" data-token="ZznQPxfxCUfGN6gi9HbSKm7DNTj0xtd0ZQ3lH7fX" data-tartempion="2019-12-07_8">#</td>
            for($i=$timeStart;$i<=$timeEnd;$i++){
                if($i<10){
                    $i = "0".$i;
                }
                $gridD .= '<tr>';
                $gridD .= "<td class=\"col-hour\"> {$i}h </td>";
                for($j=0;$j<=count($days);$j++){

                    if($j<count($days)){

                        $date_tar_day = date('Y-m-d', strtotime($date_tar .' +'.$j.' day'));

                        $tartempion=$date_tar_day.'_'.$i;
                        $tab_json = json_decode($rdvs);
                        $add_class='data-rdv page-pro';
                        $rdv='#';
                        $id_rdv='#';

                        if (!empty($tab_json)){
                            foreach ($rdvs as $value) {
                                if ($tartempion==$value->data_tartempion) {
                                    // $id_rdv=$value->id;
                                    if ($value->id_client === $visiteur) {
                                        $rdv='Vous avez rdv';
                                        $add_class.=' rdv-loaded';
                                        $id_rdv=$value->id;
                                    }else {
                                        $rdv='Créneau non disponible';
                                        $add_class.=' rdv-indispo';
                                    }
                                }
                            }
                        }
                        $gridD .= "<td class=\"".$add_class."\" data-user=\"".$visiteur."\" data-pro=\"".$pro[0]->id."\" data-name-pro=\"".$pro[0]->first_name." ".$pro[0]->last_name."\" data-id=\"".$id_rdv."\" data-tartempion=\"".$tartempion."\" data-token=\"".csrf_token()."\">".$rdv."</td>";
                    }else{
                        $gridD .= "<td class=\"col-hour\"> {$i}h </td>";
                    }
                }
                $gridD .= '</tr>';
            }
            $gridD .= '</tbody>';
            $gridD .= '</table>';
            $gridD .= '</div>';

            echo $gridD;
             @endphp
        </div>
    </div>

    <!-- iframe -->
    <!--
    <div class="col-3">
        <div class="embed-responsive embed-responsive-1by1">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2664.318442774361!2d-1.6332923840024134!3d48.10409247922081!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480edf21e3ec1f69%3A0xaaeab7e3b81b7174!2sBuroscope!5e0!3m2!1sen!2sfr!4v1575800034511!5m2!1sen!2sfr"
                style="border:0;" allowfullscreen=""></iframe>
        </div>
    </div>
    -->






    @else

    <div class="container ptb-5" style="min-height:60vh">
        <p>Ce compte n'existe pas !</p>
        <a class="btn btn-info" href="javascript:history.back()">Retour</a>
    </div>

    @endisset

    @endsection
