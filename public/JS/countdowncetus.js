//         async function callTheApi(){
//           let gettimer = document.querySelector('#timer');
//           let response = await fetch("https://api.warframestat.us/pc/cetusCycle");
//           let data = await response.json();
//           let state = data.state;
//              if(state == "night"){
//                gettimer.setAttribute('data-cycle', 'night');
//                console.log("je suis dans la nuit");
//               }else{
//                 gettimer.setAttribute('data-cycle', 'day');
//                 console.log("je suis dans le jour");
//               }
//           var timeleft = data.timeLeft;
//           let minuteleft;
//           let hourleft= timeleft.indexOf("h");
//                 if (hourleft == -1){
//                 console.log("il n'y à pas d'heure");
//                 minuteleft = timeleft.substr(0,timeleft.indexOf("m"));
//                 }else{
//                   console.log("il y à une heure");
//                   minuteleft = timeleft.substr(timeleft.indexOf(" ")+1,timeleft.indexOf("m")-timeleft.indexOf(" ")-1);
//                 }
//                   console.log(minuteleft);
//           let secondeleft= timeleft.substr(timeleft.lastIndexOf(" ")+1, timeleft.indexOf("s")-timeleft.lastIndexOf(" ")-1);
//           let hourstorage = sessionStorage.setItem("hour", hourleft);
//           let minutestorage = sessionStorage.setItem("minutes", minuteleft);
//           let secondstorage = sessionStorage.setItem("seconds", secondeleft);
//                   console.log(secondeleft);
//           let tempsReste;
//             console.log("plop "+tempsReste);
//             let tempsDebut = new Date();
//             let tempsDebutMili = tempsDebut.getTime();
//             let tempsFin = new Date();
//             tempsFin.setTime(tempsDebutMili + tempsReste);
//             console.log("tempsDebut "+tempsDebut);
//             console.log("tempsFin "+tempsFin);
      
//       // tempsDebut < tempsFin => je décompte sinon j'arrête le compteur et je rafraichis la page
//     let goToCountdown = await function countdown(){
//           let timerWindow = new Date().getTime();
//           console.log(timerWindow);//retourne en console ~ 1620719942570 qui change bien 
          
//           let timerIntervalEl = document.querySelector("#countdown") ;
//           let hourGetStorage = sessionStorage.getItem("hour");
//           let minutesGetStorage = sessionStorage.getItem("minutes");
//           let secondsGetStorage = sessionStorage.getItem("seconds");
//           let groupStorage = hourGetStorage + minutesGetStorage +secondsGetStorage;

//           //parseint les sessionStorage car retourne des strings
//           let initHour = Math.floor((hourGetStorage% (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//           let initMinutes = Math.floor((minutesGetStorage% (1000 * 60 * 60)) / (1000 * 60));
//           let initSecondes = Math.floor((secondsGetStorage% (1000 * 60)) / 1000);
//           //! groupNumbersInit est inutile car il retourne l'addition des 3 en nombre mais timerWindow est en string
//           let groupNumbersInit = initHour + initMinutes + initSecondes;

//           let addTimer = timerWindow + groupNumbersInit; 
//           console.log(addTimer); //retourne en console ~ 1620719942569 qui change bien c'est le new Date -1 en gros 

//           //   console.log(initHour + " "+  initMinutes +" " +initSecondes);
//           let timerCountdownText; 
//           //retourne un nombre en millisecondes
          
//           let timerZone =  new Date() - addTimer ;
//           console.log(timerZone); //retourne en console 3 ou 2 ou 1 

        

//           let timerWindowHour= Math.floor((addTimer % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//           let timerWindowMin=Math.floor((addTimer % (1000 * 60 * 60)) / (1000 * 60));
//           let timerWindowSec= Math.floor((addTimer % (1000 * 60)) / 1000);
//           console.log(timerWindowHour+" "+timerWindowMin+" "+timerWindowSec);
//               if(hourGetStorage == -1){
//                 timerCountdownText = timerWindowMin + "min " + timerWindowSec +"s";
//               }else{
//                 timerCountdownText = timerWindowHour + "h " + timerWindowMin + "min " + timerWindowSec +"s";
//               }
//           //affiche 00h00min00s
//           timerIntervalEl.innerHTML = timerCountdownText;
//       }
//         }
         
      
      
//       //  callTheApi();
//       countdown();
//       //   //let interval = setInterval(countdown, 1000);
      
       
//        async function countdown (){
//         let timerWindow = new Date().getTime();
//         console.log("timerWindow : "+timerWindow);//retourne en console ~ 1620719942570 qui change bien 
        
//         let timerIntervalEl = document.querySelector("#countdown") ;
//         let hourGetStorage = sessionStorage.getItem("hour");
//         let minutesGetStorage = sessionStorage.getItem("minutes");
//         let secondsGetStorage = sessionStorage.getItem("seconds");
//         let groupStorage = hourGetStorage + minutesGetStorage +secondsGetStorage;

//         //parseint les sessionStorage car retourne des strings
// /*         let initHour = Math.floor((hourGetStorage% (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//         let initMinutes = Math.floor((minutesGetStorage% (1000 * 60 * 60)) / (1000 * 60));
//         let initSecondes = Math.floor((secondsGetStorage% (1000 * 60)) / 1000);
//         //! groupNumbersInit est inutile car il retourne l'addition des 3 en nombre mais timerWindow est en string
//         let groupNumbersInit = initHour + initMinutes + initSecondes;
// */
//               //parseint les sessionStorage car retourne des strings
//         let initHour = Number(hourGetStorage); //% (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//     let resteHour=0;
//     if(initHour<=0)
//     {
//        resteHour=0;
//     }
//     else{
//        resteHour = initHour * 60 * 60 * 1000;
//     }
//         let initMinutes = Number(minutesGetStorage); //% (1000 * 60 * 60)) / (1000 * 60));
//     console.log("initMinutes "+initMinutes);
//     let resteMin = initMinutes * 60 * 1000;
//         let initSecondes = Number(secondsGetStorage); //% (1000 * 60)) / 1000);
//     let resteSec = initSecondes * 1000;
//         //! groupNumbersInit est inutile car il retourne l'addition des 3 en nombre mais timerWindow est en string
//         let groupNumbersInit = initHour + initMinutes + initSecondes;
    
//     console.log("resteHour "+resteHour+" resteMin "+ resteMin+" resteSec "+resteSec);
//     let resteTemps = resteHour + resteMin + resteSec ;
//     console.log("resteTemps "+resteTemps);

//        // let addTimer = timerWindow + groupNumbersInit; 
//     let addTimer = timerWindow + resteTemps; 
//         console.log("addTimer "+addTimer); //retourne en console ~ 1620719942569 qui change bien c'est le new Date -1 en gros 

//         //   console.log(initHour + " "+  initMinutes +" " +initSecondes);
//         let timerCountdownText; 
//         //retourne un nombre en millisecondes
        
//         let timerZone =  new Date() - addTimer ;
//         console.log(timerZone); //retourne en console 3 ou 2 ou 1 

      

//         let timerWindowHour= Math.floor((addTimer % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//         let timerWindowMin=Math.floor((addTimer % (1000 * 60 * 60)) / (1000 * 60));
//         let timerWindowSec= Math.floor((addTimer % (1000 * 60)) / 1000);
//         console.log(timerWindowHour+" "+timerWindowMin+" "+timerWindowSec);
//             if(hourGetStorage == -1){
//               timerCountdownText = timerWindowMin + "min " + timerWindowSec +"s";
//             }else{
//               timerCountdownText = timerWindowHour + "h " + timerWindowMin + "min " + timerWindowSec +"s";
//             }
//         //affiche 00h00min00s
//         timerIntervalEl.innerHTML = timerCountdownText;
//           }
    
//       // callTheApi();
    
//       //let interval = setInterval(countdown, 1000);
    
    
    

//         let gettimer = document.querySelector('#timer');
//         fetch("https://api.warframestat.us/pc/cetusCycle")
//     .then( response => response.json())
//     .then(data => {

//               let state = data.state;
//            if(state == "night"){
//              gettimer.setAttribute('data-cycle', 'night');
//              console.log("je suis dans la nuit");
//             }else{
//               gettimer.setAttribute('data-cycle', 'day');
//               console.log("je suis dans le jour");
//             }
//         var timeleft = data.timeLeft;
//         let minuteleft;
//         let hourleft= timeleft.indexOf("h");
//     let hourReste=0;
//               if (hourleft == -1){
//               console.log("il n'y à pas d'heure");
//               minuteleft = timeleft.substr(0,timeleft.indexOf("m"));
//               }else{
//                 console.log("il y à une heure");
//                 minuteleft = timeleft.substr(timeleft.indexOf(" ")+1,timeleft.indexOf("m")-timeleft.indexOf(" ")-1);
//         hourReste=1;
//               }
//                 console.log(minuteleft);
//         let secondeleft= timeleft.substr(timeleft.lastIndexOf(" ")+1, timeleft.indexOf("s")-timeleft.lastIndexOf(" ")-1);
//         let hourstorage = sessionStorage.setItem("hour", hourleft);
//         let minutestorage = sessionStorage.setItem("minutes", minuteleft);
//         let secondstorage = sessionStorage.setItem("seconds", secondeleft);
    
//     return ((hourReste*60*60*1000)+((Number(minuteleft))*60*1000) + ((Number(secondeleft))*1000));
//     });
    

      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
//         //   let dayCycle = ['day', 'night'];
//       //   let minutesDuration = {
//       //     'night': 50,
//       //     'day': 100,
//       //     'full': -150 // minus because we use full cycles only when going back in time
//       //   };
//       //   let endTimes = [];
//       //   let date = new Date();

//       //   // function addToContainer(class_, text, overWritePx) {
//       //   //   let style = typeof overWritePx == 'number' ? ' style="height:'+overWritePx+'px"' : '';
//       //   //   document.body.append(document.createElement('<div class="' + class_ + '"' + style + '>' + text + '</div>'));
//       //   // }
//       //   /* c'est pour les 3 prochains jours
//       //   // function dateToString(date) {
//       //      // YYYY-MM-DD to avoid confusion with MM/DD/YYYY and DD.MM.YYYY
//       //   //   return "" + date.getFullYear() + "-" + (date.getMonth()+1) + "-" + date.getDate();
//       //   // }
        
//       //   // function timeToString(date) {
//       //   //   // "HH:MM:SS"
//       //   //   let str = date.getHours().toString().padStart(2, '0');
//       //   //   str += ':' + date.getMinutes().toString().padStart(2, '0');
//       //   //   str += ':' + date.getSeconds().toString().padStart(2, '0');
//       //   //   return str;
//       //   // }
//       //   */
//       //   function countdownStr(time) {
//       //     time = Math.floor(time / 1000); // get rid of milisec
//       //     let str = ' ' + (time%60).toString().padStart(2, '0') + 's';
//       //     time = Math.floor(time / 60);
//       //     str = ' ' + (time%60).toString().padStart(2, '0') + 'm' + str;
//       //     time = Math.floor(time / 60);
//       //     str = '' + time + 'h' + str;
//       //     return str;
//       //   }
        
//       //   function stripTime(date) {
//       //     date.setHours(0);
//       //     date.setMinutes(0);
//       //     date.setSeconds(0);
//       //     date.setMilliseconds(0);
//       //   }
        
//       //   function changeDate(date, cycle) {
//       //     let minutes = minutesDuration[cycle];
//       //     date.setMinutes(date.getMinutes() + minutes);
//       //   }

//       //   function updateTimer() {
//       //     let now = new Date();
//       //     // let px = now.getHours() * 30 + now.getMinutes() / 2; // 1 hour is 30px long
        
          
//       //     // try {
//       //     //   while(now > endTimes[0]['date']) {
//       //     //     endTimes.shift();
//       //     //     notified = false;
//       //     //   }
//       //     // }
//       //     // catch (e) {
//       //     //   if(e.name == 'TypeError')
//       //     //     console.log("erreur");
//       //     //   else
//       //     //     throw e;
//       //     // }
          
                           
//       //   let dateOnTheLeft = new Date();
//       //   let startLimit = new Date();
        
//       //   // // add dates
//       //   // for(let i=0; i<days; ++i) {
//       //   //   addToContainer('date', dateToString(dateOnTheLeft));
//       //   //   dateOnTheLeft.setDate(dateOnTheLeft.getDate() + 1);
//       //   // }
//       //   // // add hours
//       //   // for(let i=0; i<days; ++i) {
//       //   //   for(let j=0; j<24; ++j) {
//       //   //     addToContainer('hour', j);
//       //   //   }
//       //   // }
        
//       //   stripTime(startLimit); // last midnight
//       //   stripTime(dateOnTheLeft); // end limit, 3 days from now midnight
        
//       // //   let request = new XMLHttpRequest(); 
//       // //   let url = 'https://api.warframestat.us/pc/cetusCycle';
//       // //   request.open('GET',url);
//       // //   request.onreadystatechange = function() {
//       // //     if (this.readyState === 4) {
//       // //       if (this.status >= 200 && this.status < 400) {
//       // //         // Success!
//       // //         let data = JSON.parse(this.response);
//       // //         let activation = new Date(data.expiry).getTime();
//       // //       if(data.isDay)
//       // //         activation += 3000000;
//       // //       localStorage.setItem('activation', activation);
//       // //       } else {
//       // //         if(e.name == 'TypeError') {
//       // //           activation = Number(localStorage.getItem('activation'));
//       // //           if(activation == 0) {
//       // //             window.setTimeout(window.location.reload.bind(window.location), 30000);
//       // //             return;
//       // //           }
//       // //         }
//       // //         else
//       // //           throw e;
//       // //       }
//       // //     }
//       // //   };
//       // //   
//       // fetch('https://api.warframestat.us/pc/cetusCycle')
//       // .then(response => response.json())
//       // // .then(data => console.log(data));
//       // .then(data => {
//       //   // console.log(data.state);
//       //   let activation = new Date(data.expiry).getTime();
//       //   if(data.isDay){
//       //     activation += 0;
                
//       //           // console.log("je suis dans le if isday");
//       //           localStorage.setItem('activation', activation);
//       //           
//       //           let getcountdown = document.querySelector('#countdown');
//       //           getcountdown.innerText= countdownStr(activation - now);  
//       //           } else {
//       //             console.log("je suis dans le else isday");
//       //             //problème avec e.name car e n'est pas définis si on retire le e ça fonctionne mais c'est pas le meilleurs
//       //               if(events.name == 'TypeError') {
//       //                   activation = Number(localStorage.getItem('activation'));
//       //                   // console.log("je suis dans le if");
//       //                   if(activation == 0) {
//       //                     console.log("je suis dans le else");
//       //                       window.setTimeout(window.location.reload.bind(window.location), 30000);
//       //                       return;
//       //                     }
//       //                   }
//       //           }
//       //           });
//       //           //récupère les différents id pour le timer et changer le texte day/night
                
//       //           console.log(endTimes[0],['cycle']);//undifined et objet cycle length 1 
//       //           // console.log(endTimes[0],['date']);
//       //     // go back a few full cycles
//       //     while(date > startLimit) {
//       //       changeDate(date, 'full');
//       //     }
//       //     for(let i=0; date < dateOnTheLeft; ++i) {
//       //       let first = false;
//       //       let strTime = '';
            
//       //       if(date < startLimit)
//       //         first = true;
//       //       else
//       //         strTime = timeToString(date) + ' - ';
            
//       //       let cycle = dayCycle[i%2]; // day or night
//       //       changeDate(date, cycle); // go forward 50/100 minutes
            
//       //       if(date < startLimit)
//       //         continue;
//       //       // first and last cycles are not full; we don't add time because they can be too short to display
//       //       // if(first) {
//       //       //   let length = (date - startLimit) / (1000 * 60 * 2);
//       //       //   addToContainer(cycle, '', length);
//       //       // }
//       //       // else if(date > dateOnTheLeft) {
//       //       //   let length = (dateOnTheLeft - endTimes[endTimes.length-1].date) / (1000 * 60 * 2);
//       //       //   addToContainer(cycle, '', length);
//       //       // }
//       //       // else {
//       //       //   addToContainer(cycle, strTime + timeToString(date));
//       //       // }
//       //       endTimes.push({cycle: cycle, date: new Date(+date)});
//       //     }
//       // }
//       // // console.log(updateTimer());
//       // updateTimer();
//       // window.setInterval(updateTimer, 1000);
      