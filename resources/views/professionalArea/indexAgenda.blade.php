@extends('layouts.persoArea')
@section('contentPagePerso')
<div class="container">
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
                        echo '<tr>';
                        echo "<th> {$i}h </th>";
                        echo '<td colspan="2" class="data-rdv" data-pro="'.$user->id.'" data-token="'.csrf_token().'" data-tartempion="'.$date.'_'.$i.'"> # </td>';

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
