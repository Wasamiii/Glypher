class TimerCetus{
    constructor(){

    }
    initTimerCetus(){
        let attributeCetus = document.getElementById("#timer");
        let countCetus = document.getElementById('#countdown');
        let CetusIsDay = document.getElementById('#day');
        let CetusIsNight = document.getElementById('#night');
    }
    callApiToCetus(){
        let funcCountCetus =()=>{
            let callApi = new Api();
            callApi.syndicate();
            //Problème les 2 values en parse ne bougent pas donc soit -date soit elle doivent bouger d'elles même
            let cetus_JSON = localStorage.getItem('CetusTimers');
            let parseCetus = JSON.parse(cetus_JSON);
            // console.log(parseCetus);
            const get_timestamp_eidos_expiry = Math.floor(parseCetus["Expiry"]["$date"]["$numberLong"] / 1000);
            console.log(get_timestamp_eidos_expiry);
            //fonctionne pas mais à voir comment le faire fonctionner
            const get_timestamp_eidos_activation = Math.floor(parseCetus["Activation"]["$date"]["$numberLong"] / 1000);
            console.log(get_timestamp_eidos_activation);

            const date = Date.now();
            let time_date = Math.floor(date / 1000);
            //en cours de test (non concluant) retourne un timer incohérent
            const timerEidos = get_timestamp_eidos_expiry - time_date;
            console.log(timerEidos);
        };
        funcCountCetus();
    }
}
let timercetus = new TimerCetus();
timercetus.callApiToCetus();