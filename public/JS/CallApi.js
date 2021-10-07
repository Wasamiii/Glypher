class Api{
  constructor(){
    this.url = "views/api.php";
    // this.allTimers;
  }
  async syndicate(){
       let APIMissions =  await axios.get(this.url);
       return APIMissions;
  }
}
let refreshAPIcetus = ()=>{
  let callApi = new Api();
  let timers = callApi.syndicate();
  timers.then(response => {
    const cetusSyndicate = response.data.SyndicateMissions.find(data =>data.Tag === 'CetusSyndicate');
    // console.log(cetusSyndicate);
    if (!cetusSyndicate){
      return callback(undefined);
    }
    let stringifyCetus = JSON.stringify(cetusSyndicate);
    sessionStorage.setItem('CetusTimers', stringifyCetus);
    let dateTime = new Date();
    sessionStorage.setItem('Date', dateTime);

  return cetusSyndicate;
  })
  .then();
};
let refreshAPIfissures = ()=>{
  let callApi = new Api();
  let timers = callApi.syndicate();
  timers.then(response => {
    const fissuresMissions = response.data.ActiveMissions;
    // console.log(fissuresMissions);
    if (!fissuresMissions){
      return callback(undefined);
    }
    let stringifyFissures = JSON.stringify(fissuresMissions);
    sessionStorage.setItem('Fissures',stringifyFissures);
    return fissuresMissions;
  })
  .then();
};
let refreshApiBaro = ()=>{
  let callApi = new Api();
  let timers = callApi.syndicate();
  timers.then(response=>{
    const Baro = response.data.VoidTraders;
    // console.log(Baro);
    if (!Baro){
      return callback(undefined);
    }
    let stringifyBaro = JSON.stringify(Baro);
    sessionStorage.setItem('BaroKiteer',stringifyBaro);
    return Baro;
  })
  .then();
};
refreshAPIcetus();
refreshAPIfissures();
refreshApiBaro();