//Pour des checkbox notifications (ça sera dans l'easter-eggs)
// class Notified{
//   constuctor(){
    
//     if(!notified) {
//         const nextCycle = endTimes[1]['cycle'];
//         const minutesLeft = Math.floor((endTimes[0]['date'] - now) / (1000 * 60));
//         if(settings[`${nextCycle}-notification`] && minutesLeft <= settings[`${nextCycle}-notification-minutes`]) {
//           if(settings['text-notification']) {
//             new Notification('PoE clock', {
//               requireInteraction: true,
//               body: `${nextCycle} on PoE in ${minutesLeft} minutes!`,
//             });
//             notified = true;
//           }
//           if(settings['sound-notification']) {
//             new Audio('notification.ogg').play();
//             notified = true;
//           }
//         }
//       }
    
    
//     var notified = false;
//     var settings = {};
//     ['text', 'sound', 'night', 'day'].forEach(el => {
//                                                 //change jquery to js pure change names
//       const id = `${el}-notification`;
//       settings[id] = localStorage.getItem(id);
//       if(settings[id] !== null)
//         document.getElementById(id).checked = true;
//       else
//         settings[id] = false;
//     });
//     ['night', 'day'].forEach(el => {
//                                               //change jquery to js pure change names
//       const id = `${el}-notification-minutes`;
//       settings[id] = localStorage.getItem(id);
//       if(settings[id] !== null)
//         document.getElementById(id).value = settings[id];
//       else
//         settings[id] = document.getElementById(id).value;
//     });
//                                            // Pour des checkbox notifications (ça sera dans l'easter-eggs)
//                                         //change jquery to js pure change names
//     $('.notification').on('change', (e) => {
//       const id = e.target.id;
//       let value;
//       if(e.target.type === 'number')
//         value = e.target.value;
//       else {
//         value = e.target.checked;
//         if(id === 'text-notification')
//           Notification.requestPermission().then(function(result) {
//             if (result === 'denied' || result === 'default') {
//               document.getElementById('text-notification').checked = false;
//             }
//           });
//       }
//       localStorage.setItem(id, value);
//       settings[id] = value;
//     });
//   }
// }    
