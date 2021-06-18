class Api{
  constructor(){
    this.url = "views/api.php";
    // this.allTimers;
  }
  async syndicate(){
    

    // async function callApi() {
       let cetusMissions =  await axios.get(this.url);
       return cetusMissions;
        // .then((response) => {
        //   this.allTimers = response.data;
        //   return new Promise((resolve,reject)=>{
        //     resolve = this.allTimers;

        //   });
        //   // console.log(allTimers.replaceAll("\\", ""));
        // })
        // .catch((error) => {
        //   console.log(error);
        // });
    // }
    // callApi();
  }
}

let callApi = new Api();
let timers = callApi.syndicate();
timers.then(response => {
  const cetusSyndicate = response.data.SyndicateMissions.find(data =>data.Tag === 'CetusSyndicate');
  if (!cetusSyndicate){
    return callback(undefined);
  }
  let stringifyCetus = JSON.stringify(cetusSyndicate);
  sessionStorage.setItem('CetusTimers', stringifyCetus);
return cetusSyndicate;
})
.then();