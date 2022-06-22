class Modal_Btn{
    constructor(){}
    modalbtn(){
        let modal_btn = document.querySelector('.modal-btn')
        let div_container = document.querySelector('div.modal_container');
        let div_contain = document.querySelector('div.modal-contain');
        let close_modale = document.querySelector('.close-modale');
        let back_modale = document.querySelector('div.background_modal');
    
        modal_btn.addEventListener("click",function modal_btn(evt){
          evt.preventDefault();
          div_container.classList.add('active');
          div_contain.classList.add('active');
        });
        back_modale.addEventListener("click", function bgclick(evt){
          evt.preventDefault();
          div_container.classList.remove('active');
          div_contain.classList.remove('active');
        });
        close_modale.addEventListener('click',function btnclick(evt){
          evt.preventDefault();
          div_container.classList.remove('active');
          div_contain.classList.remove('active');
        });
      }
}
let mod_btn = new Modal_Btn();
mod_btn.modalbtn();