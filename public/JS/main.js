class Timers{
    constructor(){
        
        const worldstateData = await (require('request-promise'))('http://content.warframe.com/dynamic/worldState.php');
        
        const WorldState = require('warframe-worldstate-parser');
        
        const ws = new WorldState(worldstateData);
        
        console.log(ws.alerts[0].toString());
    }
}