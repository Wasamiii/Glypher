class Search{
    constructor(){
      /*
      TODO: 
      * ajouter la div qui englobe les "figures" 
      * on va chercher dans les figures "figcaption"
      * dans figcaption on va chercher la balise "p"
      * dans la balise "p" on compare ce qui est marqué dans l'input et le textContent de p
      */
     
    }
    eventsearch(){
      let search = document.getElementById('search_bar');
      let figures = document.getElementsByTagName('figure');
      console.log(figures.length);
      //let filter = search.value.toLowerCase();
      //console.log(filter);
      search.addEventListener('keyup', function keyup(e){
        let valueSearch = e.target.value;
        for(var i = 0; i < figures.length; i++){
          console.log('dans le for');
          let figcaption = figures[i].childNodes[3];
          console.log(figures);
          console.log(figcaption);
          let paragraph = figcaption.childNodes[1];
          console.log(paragraph);
          let txtvalue = paragraph.innerHTML;
          if(txtvalue.toLowerCase().indexOf(valueSearch) > -1){
            console.log('dans le if');
            figures[i].style.display = 'block';
          }else{
            console.log('dans le else');
            figures[i].style.display = 'none';
          }
        }
      });

    }
}
let search = new Search();
search.eventsearch();