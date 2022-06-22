class Modale{
  constructor(){}
  modalForm(){
    let figures = document.querySelectorAll('.modal-trigger');
    let imgGlyph = document.querySelectorAll('.img-glyph');
    let figcaption = document.querySelectorAll('.figcaption-glyph');
    let modale = document.querySelectorAll('.modal-container');
    let card_modale = document.querySelectorAll('.modal-div');
    let close_modale = document.querySelectorAll('.close-modale');
    let back_modale = document.querySelectorAll('.background-modal');
    let i;
    for(i=0;i<imgGlyph.length;i++){
      figures[i].setAttribute('data-index',i);
      imgGlyph[i].setAttribute('data-index',i);
      figcaption[i].setAttribute('data-index',i);
      modale[i].setAttribute('data-index',i);
      back_modale[i].setAttribute('data-index',i);
      close_modale[i].setAttribute('data-index',i);
    }
    for(i=0;i<figures.length;i++){
      imgGlyph[i].addEventListener("click",  function clicker(e){
        e.preventDefault();
        let elementindex = this.getAttribute('data-index');
        modale[elementindex].classList.toggle('active');
        card_modale[elementindex].classList.toggle('active');
      });
      figcaption[i].addEventListener("click",  function clicker(e){
        e.preventDefault();
        let elementindex = this.getAttribute('data-index');
        modale[elementindex].classList.toggle('active');
        card_modale[elementindex].classList.toggle('active');
      });
      back_modale[i].addEventListener("click", function bgclick(evt){
        evt.preventDefault();
        let elemIndex = this.getAttribute('data-index');
        modale[elemIndex].classList.remove('active');
        card_modale[elemIndex].classList.remove('active');
      });
      close_modale[i].addEventListener('click',function btnclick(evt){
        evt.preventDefault();
        let elemIndex = this.getAttribute('data-index');
        modale[elemIndex].classList.remove('active');
        card_modale[elemIndex].classList.remove('active');
      });
    }
  }
}
let mod = new Modale();
mod.modalForm();
mod.modalbtn();