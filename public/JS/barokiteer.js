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
            //si le timer est à -172 800ms tu rapelle l'api 
            //! timerForBaro == -172800
            let parseBaro;
            let barosession = sessionStorage.getItem('BaroKiteer');
            parseBaro = JSON.parse(barosession);
            // console.log(parseBaro);
            let barolength = parseBaro.length;
            // console.log(barolength);
            //récupère ce qu'il y à dans l'array de baro 
            let baroArray = parseBaro[0];
            // console.log(baroArray);
            const get_timestamp_baro_expiry = Math.floor(baroArray["Activation"]["$date"]["$numberLong"] / 1000);
            const get_node_baro = baroArray["Node"];

            const datenow = new Date();
            let timeDate = Math.floor(datenow /1000);
            let timerForBaro = get_timestamp_baro_expiry  -timeDate;
            // console.log(timerForBaro);
            if(timerForBaro < -172800){
                refreshApiBaro();
            }else{
                let baro_S = Math.floor(timerForBaro %60);
                let baro_M = Math.floor(((timerForBaro - baro_S) /60)%60);
                let baro_H = Math.floor((((timerForBaro - baro_S) /60)/60)%24);
                let baro_J = Math.floor((((timerForBaro - baro_S)/60)/60)/24);
                this.baro.innerHTML =baro_J+ "d" + baro_H + "h" + baro_M + "m" + baro_S + "s";
                if(timerBaro !== null){
                    this.itsbaro.innerHTML = "Baro Arrive dans:";
                }else{
                    this.itsbaro.innerHTML = "Baro est là !";
                }
            }
        };
        this.interval = setInterval(funcCountBaro,1000);
    }
}
let timerBaro = new Baro();
timerBaro.callApiToBaro();