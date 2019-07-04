<?php
require_once('inc/helper.php');     // Helper class
require_once('inc/header.html');    // Output body->header

class lasise{
    public function __construct(){

        $string = self::query();

        $html = '
        <section class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <h2 class="card-title m-0">LaSiSe</h2>
                        </div>
                        <div class="card-body">
                            <div class="list-group" id="list-tab" role="tablist">
                                '.$string["0"].'
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <h2 class="card-title m-0">Infos</h2>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="nav-tabContent">
                                '.$string["1"].'
                            </div>
                        </div>
                    </div>
                </div>
            </section>';

        echo $html;
    }

    static function query(){
        $i = "1"; // Der erste Eintrag soll direkt angezeigt werden
        $html_all_vehicles = "";
        $html_detail_vehicle = "";
        // Alle Autos aus der Tabelle holen die im System sind
        $result = helper::db()->query('SELECT * FROM vehicle ORDER BY best_lasise LIMIT 100');
		while ($row = $result->fetch_object()){
            if($i == "1"){
                $zusatz_css = "show active";
            } else { $zusatz_css = ""; }
            $html_all_vehicles .= '<a class="list-group-item list-group-item-action '.$zusatz_css.'" id="list-profile-list" data-toggle="list" href="#list-'.$row->id.'" role="tab" aria-controls="'.$row->id.'">'.$row->name.' <span class="right">'.$row->best_lasise.'</span></a>';
            // Alle Zeiten zu dem Wagen holen
            $html_detail_vehicle .= '<div class="tab-pane fade '.$zusatz_css.'" id="list-'.$row->id.'" role="tabpanel" aria-labelledby="list-'.$row->id.'-list">';
            $html_detail_vehicle .= '<table class="table table-striped">
                    <tr>
                        <th>Zeit</th>
                        <th>Bemerkung</th>
                        <th>Quelle</th>
                    </tr>';
            $result_detail = helper::db()->query('SELECT * FROM lasise WHERE vehicle_id = "'.$row->id.'" ORDER BY date LIMIT 100');
		    while ($row_detail = $result_detail->fetch_object()){
                $html_detail_vehicle .= '<tr>
                    <td>'.$row_detail->zeit.'</td>
                    <td class="text-justify">'.$row_detail->bemerkung.'<br/><small>Am '.date('d.m.Y', strtotime($row_detail->date)).'</small></td>
                    <td><a href="'.$row_detail->quelle.'" target="_blank">YouTube</a></td>
                </tr>';
            }
            $html_detail_vehicle .= '</table></div>';
            $i++;
        }
        return array($html_all_vehicles, $html_detail_vehicle);
    }
}

$lasise = new lasise();

require_once('inc/footer.html');    // Output body->footer
?>