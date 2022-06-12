class Baro {
    constructor(){
    this.interval  = 0;
    this.baro = document.getElementById('countdownbaro');
    this.attributeCetus = document.getElementById("timer");
    this.itsbaro = document.getElementById('itsBaro');
    }
    callApiToBaro(){
        let funcCountBaro =()=>{
            //48h = 172 800ms 
            //if timer est à -172 800ms recall api 
            //! timerForBaro == -172800
            let parseBaro;
            let barosession = sessionStorage.getItem('BaroKiteer');
            parseBaro = JSON.parse(barosession);
            let barolength = parseBaro.length;
            //recovers what is in the baro array 
            let baroArray = parseBaro[0];
            const get_timestamp_baro_expiry = Math.floor(baroArray["Activation"]["$date"]["$numberLong"] / 1000);
            const get_node_baro = baroArray["Node"];

            const datenow = new Date();
            let timeDate = Math.floor(datenow /1000);
            let timerForBaro = get_timestamp_baro_expiry  -timeDate;
            if(timerForBaro < -172800){
                refreshApiBaro();
            }else{
                let baro_S = Math.floor(timerForBaro %60);
                let baro_M = Math.floor(((timerForBaro - baro_S) /60)%60);
                let baro_H = Math.floor((((timerForBaro - baro_S) /60)/60)%24);
                let baro_J = Math.floor((((timerForBaro - baro_S)/60)/60)/24);
                this.baro.innerHTML =baro_J+ "d " + baro_H + "h " + baro_M + "m " + baro_S + "s";
                if(timerBaro !== null){
                    this.itsbaro.innerHTML = "Baro Arrives in:";
                }else{
                    this.itsbaro.innerHTML = "Baro is here !";
                }
            }
        };
        this.interval = setInterval(funcCountBaro,1000);
    }
}
let timerBaro = new Baro();
timerBaro.callApiToBaro();