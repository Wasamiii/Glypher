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
    //footer
    this.github = document.querySelector('img#github-icon');
  }
  darkAndlight() {
    style.basicGlypher();

    this.btntoggle.addEventListener('click', () => {
      if (this.body.classList.contains('light')) {
        //dark mode
        this.body.classList.add('dark');
        this.body.classList.remove('light');
        this.body.classList.remove('transcande');
        this.title.classList.replace('titlelight', 'titlenight');
        this.github.src = "public/IMG/Social-network/PNG/GitHub-Mark-Light-32px.png";
        this.github.classList.toggle('light','dark');

        this.light.style.display = 'none';
        this.night.style.display = 'flex';
        this.transcande.style.display = 'none';

      } else if (this.body.classList.contains('dark')) {
        //light mode
        this.body.classList.add('light');
        this.body.classList.remove('dark');
        this.body.classList.remove('transcande');
        this.title.classList.replace('titlenight', 'titlelight');
        this.github.src = "public/IMG/Social-network/PNG/GitHub-Mark-32px.png";
        this.github.classList.toggle('dark','light');
        this.light.style.display = 'flex';
        this.night.style.display = 'none';
        this.transcande.style.display = 'none';
      }
    });
  }
  //Transcand mode
  shiftKey() {
    style.basicGlypher();
    document.onkeydown = (ev) => {
      let shift = ev.shiftKey;
      this.btntoggle.addEventListener("click", () => {
        if (shift === true) {
          if (this.body.classList.contains('dark')) {
            //transcand mode
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
          // return transcande to dark mode
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
  //Dropdown btn for Owned/Not-owned glyph link
  dropdown(){
    let dropdownbtn = document.getElementById('helloPseudo');
    let arrow = document.querySelector('.not-rotate');
    dropdownbtn.addEventListener("click",()=>{
      let content_dropdown = document.querySelector('#dropdown_content');
      if(content_dropdown.classList.contains("show")){
        content_dropdown.classList.remove("show");
        arrow.classList.remove('rotate');
        arrow.classList.add('not-rotate');
      }else{
        content_dropdown.classList.add("show");
        arrow.classList.add('rotate');
        arrow.classList.remove('not-rotate');
      }
    });
  }

}
let style = new Style();
style.darkAndlight();
style.shiftKey();
style.dropdown();
