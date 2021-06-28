class Api{
  constructor(){
    this.url = "views/api.php";
    // this.allTimers;
  }
  async syndicate(){
       let cetusMissions =  await axios.get(this.url);
       return cetusMissions;
  }
}
let refreshAPIcetus = ()=>{
  let callApi = new Api();
  let timers = callApi.syndicate();
  timers.then(response => {
    const cetusSyndicate = response.data.SyndicateMissions.find(data =>data.Tag === 'CetusSyndicate');
    console.log(cetusSyndicate);
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
  timers.then(response =>{
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
refreshAPIcetus();
refreshAPIfissures();