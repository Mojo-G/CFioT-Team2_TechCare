<?php
include_once ('dbconfig.php');
?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-7">
            <div class="card">
                <div class="card-header d-flex pb-0 p-3">
                    <h6 class="my-auto">Cameras</h6>
                    <div class="nav-wrapper position-relative ms-auto w-50">
                        <ul class="nav nav-pills nav-fill p-1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#cam1" role="tab" aria-controls="cam1" aria-selected="true">
                                    Camera 1
                                </a>
                            </li>
                    </div>
                </div>
                <div class="card-body p-3 mt-2">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show position-relative active height-400 border-radius-lg" id="cam1" role="tabpanel" aria-labelledby="cam1" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/smart-home-1.jpg'); background-size:cover;">
                            <div class="position-absolute d-flex top-0 w-100">
                                <p class="text-white p-3 mb-0">17.05.2021 4:34PM</p>
                                <div class="ms-auto p-3">
                                    <span class="badge badge-secondary">
                                        <i class="fas fa-dot-circle text-danger"></i>
                                        Recording</span>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="embed-responsive embed-responsive-16by9 tab-pane fade position-relative height-400 border-radius-lg" id="cam2" role="tabpanel" aria-labelledby="cam2">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
</div>
                        
                        <div class="tab-pane fade position-relative height-400 border-radius-lg" id="cam3" role="tabpanel" aria-labelledby="cam3" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/smart-home-3.jpg'); background-size:cover;">
                            <div class="position-absolute d-flex top-0 w-100">
                                <p class="text-white p-3 mb-0">17.05.2021 4:57PM</p>
                                <div class="ms-auto p-3">
                                    <span class="badge badge-secondary">
                                        <i class="fas fa-dot-circle text-danger"></i>
                                        Recording</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
        
        <div class="col-xl-5 ms-auto mt-xl-0 mt-4">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8 my-auto">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold opacity-7">Patient Overall Condition</p>
                                        <h1 class="text-gradient text-primary">
                                        
                                        
                                        <?php
                                        //Ngambil dardi database, tapi cuma satu baris terakhir aja yg diambil    
                                        $query = "SELECT * FROM `smartwatch_sensor` ORDER BY `smartwatch_sensor`.`timestamp` DESC LIMIT 1";
                                        $query_run = mysqli_query($connection, $query);
                                        
                                        
                                        if (mysqli_num_rows($query_run) > 0)
                                        foreach ($query_run as $row)


                                                if($row['temp']>= 38 && 36 <= $row['temp']){
                                                echo "Unstable body temperature";
                                                }
                                                    else if($row['oxygen'] < 95){
                                                    echo "Low Oxygen Level";
                                                    }
                                                    else if($row['heartrate']>= 90 && 130 <= $row['heartrate']){
                                                    echo "Unstable Heart Rate";
                                                    }
                                            else{
                                            echo "Patient OK";
                                        }
                                        
                                        else{
                                            echo "Database error";
                                        }
                                        
                                        ?>




                                
                                        </h5>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card">                            
                            <?php
                            //Ngambil dardi database, tapi cuma satu baris terakhir aja yg diambil    
                            $query = "SELECT * FROM `smartwatch_sensor` ORDER BY `smartwatch_sensor`.`timestamp` DESC LIMIT 1";
                            $query_run = mysqli_query($connection, $query);
                            
                            
                            if (mysqli_num_rows($query_run) > 0)
                            foreach ($query_run as $row)
                            ?>
                        <div class="card-body text-center">
                            <h1 class="text-gradient text-primary"><span id="status1">
                                <?= $row["temp"]; ?>
                                </span> <span class="text-lg ms-n2">°C</span></h1>
                            <h6 class="mb-0 font-weight-bolder">Body</h6>
                            <p class="opacity-8 mb-0 text-sm">Temperature</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-md-0 mt-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h1 class="text-gradient text-primary"> <span id="status2"><?= $row["heartrate"]; ?></span> <span class="text-lg ms-n1">BPM</span></h1>
                            <h6 class="mb-0 font-weight-bolder">Heart</h6>
                            <p class="opacity-8 mb-0 text-sm">Rate</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h1 class="text-gradient text-primary"><span id="status3"><?= $row["oxygen"]; ?></span> <span class="text-lg ms-n2">%</span></h1>
                            <h6 class="mb-0 font-weight-bolder">Oxygen</h6>
                            <p class="opacity-8 mb-0 text-sm">Level</p>
                        </div>
                    </div>
                </div>
                
                
                
                <div class="col-md-6 mt-md-0 mt-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h1 class="text-gradient text-primary"><span id="status4">
                                
                                
                            <?php
                            //Ngambil dardi database, tapi cuma satu baris terakhir aja yg diambil    
                            $query = "SELECT * FROM `detection` ORDER BY `detection`.`timestamp` DESC LIMIT 1";
                            $query_run = mysqli_query($connection, $query);
                            
                            
                            if (mysqli_num_rows($query_run) > 0)
                            foreach ($query_run as $row)
                            ?>
                            
                                <?php 
                                if($row['status'] == 1){
                                    echo "Ok";
                                }
                                else if($row['status'] == 0){
                                    echo "Patient Fall";
                                }
                                else{
                                    echo "data error";
                                }
                                
                                ?>
                                
                                
                                </span></h1>
                            <h6 class="mb-0 font-weight-bolder">Patient</h6>
                            <p class="opacity-8 mb-0 text-sm">Status</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>