class TimerCetus{
    constructor(){    
    this.interval = 0;
    this.countCetus = document.getElementById('countdowncetus');
    this.attributeCetus = document.getElementById("cetustimer");
    }
    initTimerCetus(){
        let CetusIsDay = document.getElementById('#day');
        let CetusIsNight = document.getElementById('#night');
    }
    callApiToCetus(){
        
        let funcCountCetus =()=>{
            let parseCetus;
            let cetus_JSON = sessionStorage.getItem('CetusTimers');
            if (sessionStorage.getItem('CetusTimers')== null){
                refreshAPIcetus();
            }else{
                parseCetus = JSON.parse(cetus_JSON);
                const get_timestamp_eidos_expiry = Math.floor(parseCetus["Expiry"]["$date"]["$numberLong"] / 1000);    
                const date = Date.now();
                let time_date = Math.floor(date / 1000);
                let timerEidos = get_timestamp_eidos_expiry - time_date;

                if(timerEidos>3000){
                    //day
                    this.attributeCetus.setAttribute('data-cycle', 'day');
                    timerEidos = timerEidos - 3000;
                }else {
                    if(timerEidos < 0){
                        refreshAPIcetus();
                    }else{
                         //night
                        this.attributeCetus.setAttribute('data-cycle', 'night');
                    }
                }
                let eidos_S = Math.floor(timerEidos %60);
                let eidos_M = Math.floor(((timerEidos - eidos_S) /60)%60);
                let eidos_H = Math.floor(((timerEidos - eidos_S) /60)/60);
                this.countCetus.innerHTML = eidos_H +"h "+ eidos_M +"m "+ eidos_S +"s ";
            }
        };
        this.interval = setInterval(funcCountCetus,1000);
    }
}
let timercetus = new TimerCetus();
timercetus.callApiToCetus();