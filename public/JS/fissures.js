class Fissures{
    constructor(){
    this.interval = 0;
    this.countCetus = document.getElementById('countdowncetus');
    this.attributeCetus = document.getElementById("timer");
    }
    callAPIfissures(){
        let functionToFissures = ()=>{
            let fissureParse;
            let fissuressession = sessionStorage.getItem('Fissures');
            if(sessionStorage.getItem('Fissures') == null){
                refreshAPIfissures();
            }else{
                //essayer d'en faire une boucle 
                //regrouper les résultat pour find expiry sur chacun d'entre eux
                fissureParse = JSON.parse(fissuressession);
                let fissures_Length = fissureParse.length;
                console.log(fissureParse);
                console.log(fissures_Length);
                for(let index = 0;index < fissures_Length;index++){
                    let fissures_array = fissureParse[index];
                    console.log(fissures_array);
                    const get_all_Timer_Fissures = Math.floor(fissures_array["Expiry"]["$date"]["$numberLong"] / 1000);
                    console.log("même fissures mais l'intérieur est séparé.");
                    const get_node_Fissures = fissures_array["Node"];
                    const get_Mission_Fissures = fissures_array["MissionType"];
                    const get_Modifier_Fissures = fissures_array["Modifier"];
                    console.log(get_all_Timer_Fissures);
                    console.log(get_node_Fissures);
                    console.log(get_Mission_Fissures);
                    console.log(get_Modifier_Fissures);
                }
                //["MissionType"]["Modifier"]
                
                const dateNow = new Date();
                let time_date = Math.floor(dateNow /1000);
            }
        };
        functionToFissures();
    }
}
let timerFissures = new Fissures();
timerFissures.callAPIfissures();