<div id="timers">
    <div id="cetustimer" data-cycle="">
            <span id="itsCetus">Cetus :
            </span><br/>
            <span id="day"><img id="svgday" src="public\IMG\sun-solid.svg"alt="Day on cetus"></img>Day</span>
            <span id="night"><img  id="svgnight"src="public\IMG\moon-solid.svg" alt="Night on cetus"></img>Night</span>
            <span id="countdowncetus"></span>
        </div>
        <div id="timerBaro">
            <span id="itsBaro"></span>
            <span id="countdownbaro"></span>
        </div>
    <div id="fissures">
        <span id="itsFissure">Fissures :</span>
        <div id="fissuresTimerT1" class="fissuresTimer">
        <?php 
        if(count($arrayT1) != 0){
        
            for($i = 0; $i<count($arrayT1);$i++){
                ?>
                
                <p id="PfTimerT1"> Lith |  
                    <span><?= $arrayT1[$i]['mission_fissures'] ?></span>
                    <span><?= $arrayT1[$i]['trad_mission'] ?></span>
                    <span>|  <?= $arrayT1[$i]['planete'] ?></span>
                    <span id="<?=$arrayT1[$i]['node']?>" class="fissuresTimerT1">:</span>

                </p>
            
                <?php
            }

        }
        ?>
        </div>
        <div id="fissuresTimerT2" class="fissuresTimer">
        <?php
        if(count($arrayT2) != 0){
            for($i = 0; $i<count($arrayT2);$i++){
        ?>
                <p id="PfTimerT2"> Meso |  
                    <span><?= $arrayT2[$i]['mission_fissures'] ?></span>
                    <span><?= $arrayT2[$i]['trad_mission'] ?></span>
                    <span>|  <?= $arrayT2[$i]['planete'] ?></span>
                    <span id="<?=$arrayT2[$i]['node']?>" class="fissuresTimerT2">:</span>
                </p>
        <?php
            }
        }
        ?>
        </div>
        <div id="fissuresTimerT3" class="fissuresTimer">
        <?php 
        if(count($arrayT3) != 0){
            for($i = 0; $i<count($arrayT3);$i++){
                ?>
                <p id="PfTimerT3"> Neo |  
                    <span><?= $arrayT3[$i]['mission_fissures'] ?></span>
                    <span><?= $arrayT3[$i]['trad_mission'] ?></span>
                    <span>|  <?= $arrayT3[$i]['planete'] ?></span>
                    <span id="<?=$arrayT3[$i]['node']?>" class="fissuresTimerT3">:</span>
                </p>
                <?php
            }
        }
        ?>
        </div>
        <div id="fissuresTimerT4" class="fissuresTimer">
        <?php 
        if(count($arrayT4) != 0){
            for($i = 0; $i<count($arrayT4);$i++){
                ?>
                <p id="PfTimerT4"> Axi |  
                    <span><?= $arrayT4[$i]['mission_fissures'] ?></span>
                    <span><?= $arrayT4[$i]['trad_mission'] ?></span>
                    <span>|  <?= $arrayT4[$i]['planete'] ?></span>
                    <span id="<?=$arrayT4[$i]['node']?>" class="fissuresTimerT4">:</span>
                </p>
                <?php
            }
        }
        ?>
        </div>
        <div id="fissuresTimerT5" class="fissuresTimer">
        <?php 
        if(count($arrayT5) != 0){
            for($i = 0; $i<count($arrayT5);$i++){
                ?>
                <p id="PfTimerT5"> Requiem |  
                    <span><?= $arrayT5[$i]['mission_fissures'] ?></span>
                    <span><?= $arrayT5[$i]['trad_mission'] ?></span>
                    <span>|  <?= $arrayT5[$i]['planete'] ?></span>
                    <span id="<?=$arrayT5[$i]['node']?>" class="fissuresTimerT5">:</span>
                </p>

                <?php
            }
        }
        ?>
        </div>
        <?php 
        if(count($notInDB) != null){
            for($i = 0; $i<count($notInDB);$i++){
                ?>
                <p>
                    <span id="<?=$notInDB[$i]['node']?>"><?= $notInDB[$i]['Expiry']?></span>

                </p>
                <?php
            }
        }

    ?>
    </div>
</div>