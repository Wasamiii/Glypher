class TimerCetus{
    constructor(){    
    this.interval = 0;
    this.countCetus = document.getElementById('countdown');
    this.attributeCetus = document.getElementById("timer");
    }
    initTimerCetus(){
        let CetusIsDay = document.getElementById('#day');
        let CetusIsNight = document.getElementById('#night');
    }
    callApiToCetus(){
        
        let funcCountCetus =()=>{
            let parseCetus;
            //Problème les 2 values en parse ne bougent pas donc soit -date soit elle doivent bouger d'elles même
            let cetus_JSON = sessionStorage.getItem('CetusTimers');
            if (sessionStorage.getItem('CetusTimers')== null){
                // let callerApi = new Api();
                // callerApi.syndicate();
                refreshAPI();
            }else{
                parseCetus = JSON.parse(cetus_JSON);
                // console.log(parseCetus);
                const get_timestamp_eidos_expiry = Math.floor(parseCetus["Expiry"]["$date"]["$numberLong"] / 1000);
                //fonctionne pas mais à voir comment le faire fonctionner
                const get_timestamp_eidos_activation = Math.floor(parseCetus["Activation"]["$date"]["$numberLong"] / 1000);
                // console.log(get_timestamp_eidos_activation);
    
                const date = Date.now();
                let time_date = Math.floor(date / 1000);
                let timerEidos = get_timestamp_eidos_expiry - time_date;

                console.log(timerEidos);
                if(timerEidos>3000){
                    //day
                    this.attributeCetus.setAttribute('data-cycle', 'day');
                    console.log("jour");
                    timerEidos = timerEidos - 3000;
                    console.log(timerEidos);
                }else {
                    if(timerEidos < 0){
                        //problème d'actualisation du sessionStorage
                        refreshAPI();
                    }else{
                         //night
                    this.attributeCetus.setAttribute('data-cycle', 'night');
                    console.log("nuit");
                    }
                }
                let eidos_S = Math.floor(timerEidos %60);
                let eidos_M = (((timerEidos - eidos_S) /60)%60);
                let eidos_H = Math.floor(((timerEidos - eidos_S) /60)/60);
                this.countCetus.innerHTML = eidos_H +"h"+ eidos_M +"m"+ eidos_S +"s";
            }
        };
        //setInterval fonctionne mais cause de l'appel de la fonction fait des appel d'api à chaque fois ce qui est pas bon 
        //cause le if else qui englobe trop les choses
        this.interval = setInterval(funcCountCetus,1000);
    }
}
let timercetus = new TimerCetus();
timercetus.callApiToCetus();