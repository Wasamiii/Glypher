class Fissures{
    constructor(){
    this.interval = 0;
    this.countCetus = document.getElementById('countdown');
    this.attributeCetus = document.getElementById("timer");
    }
    callAPIfissures(){
        let functionToFissures = ()=>{
            let fissureParse;
            let fissuressession = sessionStorage.getItem('Fissures');
            if(sessionStorage.getItem('Fissures') == null){
                refreshAPIfissures();
            }else{
                fissureParse = JSON.parse(fissuressession);
                console.log(fissureParse);
            }
        };
        functionToFissures();
    }
}
let timerFissures = new Fissures();
timerFissures.callAPIfissures();