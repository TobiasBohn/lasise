<?php
require_once('inc/helper.php');     // helper function
require_once('inc/header.php');    // Output body->header

// get Data
$json = file_get_contents("data.json"); 
//Decode JSON
$json_data = json_decode($json,true);

// create best list
$bestlist = array();
foreach($json_data["cars"] AS $key => $query){
    $time = array_sort($query["times"], 'time');
    $time = array_values($time);
    $bestlist[] = array("name" => $query["name"], "best_time" => $time["0"]["time"], "key" => $key);
}
$bestlist = array_sort($bestlist, 'best_time');

// Output best list ?>
            <section class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header text-center">
                                <h2 class="card-title m-0">LaSiSe</h2>
                            </div>
                            <div class="card-body">
                                <div class="list-group" id="list-tab" role="tablist">
                                    <?php
                                    // Output best list
                                    $i = "0";
                                    foreach($bestlist AS $key => $query){
                                        if($i == "0"){
                                            $show_key = $query["key"];
                                            $zusatz_css = "show active";
                                        } else { $zusatz_css = ""; }
                                        echo '<a class="list-group-item list-group-item-action '.$zusatz_css.'" id="list-profile-list" data-toggle="list" href="#list-'.$query["key"].'" role="tab" aria-controls="'.$query["key"].'">'.$query["name"].' <span class="right">'.$query["best_time"].'</span></a>';
                                        $i++;
                                    }
                                    ?>
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
                                    <?php
                                    // Output Detail
                                    foreach($json_data["cars"] AS $key => $query){
                                        if($show_key == $key){
                                            $zusatz_css = "show active";
                                        } else { $zusatz_css = ""; }
                                        echo '<div class="tab-pane fade '.$zusatz_css.'" id="list-'.$key.'" role="tabpanel" aria-labelledby="list-'.$key.'-list">
                                            <table class="table table-striped">
                                            <tr>
                                                <th>Zeit</th>
                                                <th>Bemerkung</th>
                                                <th>Quelle</th>
                                            </tr>';
                                            foreach($query["times"] AS $detailkey => $detailquery){
                                                echo '<tr>
                                                    <td>'.$detailquery["time"].'</td>
                                                    <td class="text-justify">'.nl2br($detailquery["comment"]).'<br/><small>Am '.date('d.m.Y', strtotime($detailquery["date"])).'</small></td>
                                                    <td><a href="'.$detailquery["quelle"].'" target="_blank">YouTube</a></td>
                                                </tr>';
                                            }
                                        echo '</table></div>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
<?php
require_once('inc/footer.php');    // Output body->footer
?>