class Fissures{
    constructor(){
    this.interval = 0;
}
callAPIfissures(){
    let  functionToFissures = ()=>{
            
            let fissureParse;
            
            let fissuresSession = sessionStorage.getItem('Fissures');
            if(sessionStorage.getItem('Fissures') === null){
                refreshAPIfissures();
            }else{
                //essayer d'en faire une boucle 
                fissureParse = JSON.parse(fissuresSession);
                let fissures_Length = fissureParse.length;
                
                //*console.log(fissureParse);
                //*console.log(fissures_Length);
                for(let index = 0;index < fissures_Length;index++){
                    
                    let fissures_array = fissureParse[index];
                    // console.log(fissures_array);
                    const get_all_Timer_Fissures = Math.floor(fissures_array["Expiry"]["$date"]["$numberLong"] / 1000);
                    //*console.log("même fissures mais l'intérieur est séparé.");
                    const get_node_Fissures = fissures_array["Node"];
                    const get_Mission_Fissures = fissures_array["MissionType"];
                    const get_Modifier_Fissures = fissures_array["Modifier"];
                    const get_Name_Missions_Fissures = fissures_array["Name_missions"];
                    const get_Mission_Type_Fissures = fissures_array["Mission_type"];
                    const get_Planete_Fissures = fissures_array["planete"];
                    // console.log(get_Modifier_Fissures);
                    
                    const dateNow = new Date();
                    let time_date = Math.floor(dateNow /1000);
                    let timer_Fissures = get_all_Timer_Fissures - time_date;

                    //*console.log(fissures_array['Node'] + ':'+ get_all_Timer_Fissures);
                    let modifierFissures =  get_Modifier_Fissures.substring(4,6);
                    let addmodifier = "fissuresTimer" + modifierFissures;
                    let PFTimertiers = "PFTimer" + modifierFissures;
                    if(document.getElementById(get_node_Fissures) === null){
                        // console.log(get_Modifier_Fissures);
                        switch (get_Modifier_Fissures){
                            case 'VoidT1':
                                //T1
                                let divAllFissurest1 = document.getElementById('fissuresTimerT1');
                                let adder_pt1 = document.createElement("p");
                                adder_pt1.textContent = "Lith ";
                                let add_pt1 = divAllFissurest1.appendChild(adder_pt1);
                                let attribPt1 = add_pt1.setAttribute("id", PFTimertiers);
                                let add_span1InT1 = document.createElement("span");
                                let add_span2InT1 = document.createElement("span");
                                let add_span3InT1 = document.createElement("span");
                                let add_span4InT1 = document.createElement("span");
                                let newspan1T1 = add_pt1.appendChild(add_span1InT1);
                                newspan1T1.innerHTML = get_Name_Missions_Fissures + " ";
                                //! ajouter les types de mission nom de mission et planête 
                                let newspan2T1 = add_pt1.appendChild(add_span2InT1);
                                newspan2T1.innerHTML = get_Mission_Type_Fissures + " ";
                                let newspan3T1 = add_pt1.appendChild(add_span3InT1);
                                newspan3T1.innerHTML = get_Planete_Fissures + " ";
                                let newDiv1t1 = add_pt1.appendChild(add_span4InT1);
                                let attribDivt1 = newDiv1t1.setAttribute("id", get_node_Fissures);
                                let classDivt1 = newDiv1t1.setAttribute("class", addmodifier);
                            break;
                            case "VoidT2":
                                //T2
                                let divAllFissurest2 = document.getElementById('fissuresTimerT2');
                                let adder_pt2 = document.createElement("p");
                                adder_pt2.textContent = "Meso ";
                                let add_pt2 = divAllFissurest2.appendChild(adder_pt2);
                                let attribPt2 = add_pt2.setAttribute("id", PFTimertiers);
                                let add_span1InT2 = document.createElement("span");
                                
                                //! ajouter les types de mission nom de mission et planête 
                                let add_span2InT2 = document.createElement("span");
                                let add_span3InT2 = document.createElement("span");
                                let add_span4InT2 = document.createElement("span");
                                let newspan1T2 = add_pt2.appendChild(add_span1InT2);
                                newspan1T2.innerHTML = get_Name_Missions_Fissures + " ";
                                let newspan2T2 = add_pt2.appendChild(add_span2InT2);
                                newspan2T2.innerHTML = get_Mission_Type_Fissures + " ";
                                let newspan3T2 = add_pt2.appendChild(add_span3InT2);
                                newspan3T2.innerHTML = get_Planete_Fissures + " ";
                                let newDiv1t2 = add_pt2.appendChild(add_span4InT2);
                                let attribDivt2 = newDiv1t2.setAttribute("id", get_node_Fissures);
                                let classDivt2 = newDiv1t2.setAttribute("class", addmodifier);
                            break;
                            case "VoidT3":
                                //T3
                                let divAllFissurest3 = document.getElementById('fissuresTimerT3');
                                let adder_pt3 = document.createElement("p");
                                adder_pt3.textContent = "Neo ";
                                let add_pt3 = divAllFissurest3.appendChild(adder_pt3);
                                let attribPt3= add_pt3.setAttribute("id", PFTimertiers);
                                let add_span1InT3 = document.createElement("span");//! ajouter les types de mission nom de mission et planête 
                                let add_span2InT3 = document.createElement("span");
                                let add_span3InT3 = document.createElement("span");
                                let add_span4InT3 = document.createElement("span");
                                let newspan1T3 = add_pt3.appendChild(add_span1InT3);
                                newspan1T3.innerHTML = get_Name_Missions_Fissures + " ";
                                let newspan2T3 = add_pt3.appendChild(add_span2InT3);
                                newspan2T3.innerHTML = get_Mission_Type_Fissures + " ";
                                let newspan3T3 = add_pt3.appendChild(add_span3InT3);
                                newspan3T3.innerHTML = get_Planete_Fissures + " ";
                                let newDiv1t3 = add_pt3.appendChild(add_span4InT3);
                                let attribDivt3 = newDiv1t3.setAttribute("id", get_node_Fissures);
                                let classDivt3 = newDiv1t3.setAttribute("class", addmodifier);
                            break;
                            case "VoidT4":
                                //T4
                                let divAllFissurest4 = document.getElementById('fissuresTimerT4');
                                let adder_pt4 = document.createElement("p");
                                adder_pt4.textContent = "Axi ";
                                let add_pt4 = divAllFissurest4.appendChild(adder_pt4);
                                let attribPt4 = add_pt4.setAttribute("id", PFTimertiers);
                                let add_span1InT4 = document.createElement("span");//! ajouter les types de mission nom de mission et planête 
                                let add_span2InT4 = document.createElement("span");
                                let add_span3InT4 = document.createElement("span");
                                let add_span4InT4 = document.createElement("span");
                                let newspan1T4 = add_pt4.appendChild(add_span1InT4);
                                newspan1T4.innerHTML = get_Name_Missions_Fissures + " ";
                                let newspan2T4 = add_pt4.appendChild(add_span2InT4);
                                newspan2T4.innerHTML = get_Mission_Type_Fissures + " ";
                                let newspan3T4 = add_pt4.appendChild(add_span3InT4);
                                newspan3T4.innerHTML = get_Planete_Fissures + " ";
                                let newDiv1t4 = add_pt4.appendChild(add_span4InT4);
                                let attribDivt4 = newDiv1t4.setAttribute("id", get_node_Fissures);
                                let classDivt4 = newDiv1t4.setAttribute("class", addmodifier);
                            break;
                            case "VoidT5":
                                //T5
                                let divAllFissurest5 = document.getElementById('fissuresTimerT5');
                                let adder_pt5 = document.createElement("p");
                                adder_pt5.textContent = "Requiem ";
                                let add_pt5 = divAllFissurest5.appendChild(adder_pt5);
                                let attribPt5 = add_pt5.setAttribute("id", PFTimertiers);
                                let add_span1InT5 = document.createElement("span");//! ajouter les types de mission nom de mission et planête 
                                let add_span2InT5 = document.createElement("span");
                                let add_span3InT5 = document.createElement("span");
                                let add_span4InT5 = document.createElement("span");
                                let newspan1T5 = add_pt5.appendChild(add_span1InT5);
                                newspan1T5.innerHTML = get_Name_Missions_Fissures + " ";
                                let newspan2T5 = add_pt5.appendChild(add_span2InT5);
                                newspan2T5.innerHTML = get_Mission_Type_Fissures + " ";
                                let newspan3T5 = add_pt5.appendChild(add_span3InT5);
                                newspan3T5.innerHTML = get_Planete_Fissures + " ";
                                let newDiv1t5 = add_pt5.appendChild(add_span4InT5);
                                let attribDivt5 = newDiv1t5.setAttribute("id", get_node_Fissures);
                                let classDivt5 = newDiv1t5.setAttribute("class", addmodifier);
                            break;
                            default:
                                //console.log("En dehors de l'expression dans switch");
                        }
                    }

                    //je récupère l'id ici et ça compare directement entre get_node_Fissures(qui viens de l'api) et l'id 
                    let getIDfissures = document.getElementById(get_node_Fissures);
                    //console.log(getIDfissures);
                    
                    //!event pour supprimer le bon élément dans la session [array] lorsque l'expiry - date est à 0 
                    //! reprendre le total des fissures et les comprarer pour pas avoir de doublons

                   if(timer_Fissures <= 0 || getIDfissures === null){
                    
                    //console.log('fissures suprimé!' + JSON.parse(sessionStorage.getItem('Fissures')));
                    let FstElement = document.getElementById('fissuresTimerT1');
                    while (FstElement.firstChild) {
                        FstElement.removeChild(FstElement.firstChild);
                    }
                    let StElement = document.getElementById('fissuresTimerT2');
                    while (StElement.firstChild) {
                        StElement.removeChild(StElement.firstChild);
                    }
                    let TtElement = document.getElementById('fissuresTimerT3');
                    while (TtElement.firstChild) {
                        TtElement.removeChild(TtElement.firstChild);
                    }
                    let FrtElement = document.getElementById('fissuresTimerT4');
                    while (FrtElement.firstChild) {
                        FrtElement.removeChild(FrtElement.firstChild);
                    }
                    let FvtElement = document.getElementById('fissuresTimerT5');
                    while (FvtElement.firstChild) {
                        FvtElement.removeChild(FvtElement.firstChild);
                    }
                    sessionStorage.removeItem('Fissures');

                    // console.log(modifierFissures);
                    }else{
                    
                    // console.log(timer_Fissures);
                    let fissures_S = Math.floor(timer_Fissures %60);
                    let fissures_M = Math.floor(((timer_Fissures - fissures_S) /60)%60);
                    let fissures_H = Math.floor((((timer_Fissures - fissures_S)/60)/60));
                    getIDfissures.textContent =  fissures_H +"h " + fissures_M + "min " + fissures_S + "s";
                    }
                    //console.log(get_node_Fissures);
                    // console.log(get_Mission_Fissures);
                    // console.log(get_Modifier_Fissures);
                    // countFissures.innerHTML = fissures_H +"h" + fissures_M + "min" + fissures_S + "s";

                }
                //["MissionType"]["Modifier"]
            }
        };
        this.interval = setInterval(functionToFissures,1000);
        //functionToFissures();
    }
}
let timerFissures = new Fissures();
timerFissures.callAPIfissures();