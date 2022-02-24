class Style {
  constructor() {
    this.body = document.body;
    this.btntoggle = document.querySelector('.btn-toggle');
    this.night = document.querySelector('.nightmode');
    this.light = document.querySelector('.lightmode');
    this.transcande = document.querySelector('.transcand');
  }
  basicGlypher() {
    //Title
    this.title = document.querySelector('h1#title-site');
    //cetus
    this.cetusTimer = document.querySelector('#cetustimer');
    this.childcetusTimer = document.querySelector('#cetustimer > span');
    //baro
    this.barooTimer = document.querySelector('#timerBaro');
    this.childbarooTimer = document.querySelector('#timerBaro > span');
    //fissures
    this.fissuresTimer = document.querySelector('div#fissures');
    this.childfissuresTimer = document.querySelector('div#fissures > span');
    //all figures
    this.figure = document.querySelectorAll('figure');
  }
  darkAndlight() {
    style.basicGlypher();
    this.btntoggle.addEventListener('click', () => {
      if (this.body.classList.contains('light')) {
        this.body.classList.add('dark');
        this.body.classList.remove('light');
        this.body.classList.remove('transcande');
        this.title.classList.replace('titlelight', 'titlenight');
        this.light.style.display = 'none';
        this.night.style.display = 'flex';
        this.transcande.style.display = 'none';

      } else if (this.body.classList.contains('dark')) {
        this.body.classList.add('light');
        this.body.classList.remove('dark');
        this.body.classList.remove('transcande');
        this.title.classList.replace('titlenight', 'titlelight');
        this.light.style.display = 'flex';
        this.night.style.display = 'none';
        this.transcande.style.display = 'none';
      }
    });
  }

  shiftKey() {
    style.basicGlypher();
    document.onkeydown = (ev) => {
      let shift = ev.shiftKey;
      this.btntoggle.addEventListener("click", () => {
        if (shift === true) {
          //! this.body undefined but document.body is defined wtf
          //console.log(this.body);
          if (this.body.classList.contains('dark')) {
            this.body.classList.add('transcande');
            this.body.classList.remove('dark');
            this.body.classList.remove('light');
            this.title.classList.replace('titlenight', 'titlelight');
            //cetus
            this.cetusTimer.classList.add('transcande');
            this.childcetusTimer.classList.add('transcande');
            //baroo
            this.barooTimer.classList.add('transcande');
            this.childbarooTimer.classList.add('transcande');
            //fissures
            this.fissuresTimer.classList.add('transcande');
            this.childfissuresTimer.classList.add('transcande');
            //figure
            for(let i = 0; i< this.figure.length; i++){
              this.figure[i].classList.add('transcande');
            }
            //display
            this.light.style.display = 'none';
            this.night.style.display = 'none';
            this.transcande.style.display = 'flex';
            shift = false;
          } else if (this.body.classList.contains('light')) {
            this.body.classList.add('transcande');
            this.body.classList.remove('dark');
            this.body.classList.remove('light');
            this.title.classList.replace('titlelight', 'titlenight');
            //cetus
            this.cetusTimer.classList.add('transcande');
            this.childcetusTimer.classList.add('transcande');
            //baroo
            this.barooTimer.classList.add('transcande');
            this.childbarooTimer.classList.add('transcande');
            //fissures
            this.fissuresTimer.classList.add('transcande');
            this.childfissuresTimer.classList.add('transcande');
            //figure
            for(let i = 0; i< this.figure.length; i++){
              this.figure[i].classList.add('transcande');
            }
            //display
            this.light.style.display = 'none';
            this.night.style.display = 'none';
            this.transcande.style.display = 'flex';
            shift = false;
          }
        } else if (this.body.classList.contains('transcande') && shift == false) {
          this.body.classList.add('dark');
          this.body.classList.remove('transcande');
          this.body.classList.remove('light');
          this.title.classList.replace('titlelight', 'titlenight');
          //cetus
          this.cetusTimer.classList.remove('transcande');
          this.childcetusTimer.classList.remove('transcande');
          //baroo
          this.barooTimer.classList.remove('transcande');
          this.childbarooTimer.classList.remove('transcande');
          //fissures
          this.fissuresTimer.classList.remove('transcande');
          this.childfissuresTimer.classList.remove('transcande');
          //figure
          for(let i = 0; i< this.figure.length; i++){
            this.figure[i].classList.remove('transcande');
          }
          //display
          this.light.style.display = 'none';
          this.night.style.display = 'flex';
          this.transcande.style.display = 'none';
          shift = false;
        }
      });
    };
  }
  modal(){
    let figures = document.querySelectorAll('.modal-trigger');
    //modal
    let modale = document.querySelectorAll('.modal-container');
    let card_modale = document.querySelectorAll('.modal-div');
    let close_modale = document.querySelectorAll('.close-modale');
    let back_modale = document.querySelectorAll('.background-modal');
    let i;
    for(i=0;i<figures.length;i++){
      figures[i].setAttribute('data-index',i);
      modale[i].setAttribute('data-index',i);
      back_modale[i].setAttribute('data-index',i);
      close_modale[i].setAttribute('data-index',i);
    }
    for(i=0;i<figures.length;i++){
      figures[i].addEventListener("click",  function clicker(e){
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
let style = new Style();
style.darkAndlight();
style.shiftKey();
style.modal();