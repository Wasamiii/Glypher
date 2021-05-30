//Passer en object class{constructor(){}} 
let gettimer = document.querySelector("#timer");

let url = "views/api.php";
let allTimers;
async function callApi() {
  await axios
    .get(url)
    .then((response) => {
      allTimers = response.data;
      // console.log(allTimers.replaceAll("\\", ""));
    })
    .catch((error) => {
      console.log(error);
    });
}
callApi();
