class Search{
    constructor(){
    }
    eventsearch(){
      //select searchbar and figure
      let search = document.getElementById('search_bar');
      let figures = document.getElementsByTagName('figure');
      search.addEventListener('keyup', function keyup(e){
        let valueSearch = e.target.value;
        for(var i = 0; i < figures.length; i++){
          //select all child on figure
          let figcaption = figures[i].childNodes[3];;
          let paragraph = figcaption.childNodes[1];
          let txtvalue = paragraph.innerHTML;
          //check value on keyup to paragraph innerHTML
          if(txtvalue.toLowerCase().indexOf(valueSearch) > -1){
            // if such a display block
            figures[i].style.display = 'block';
          }else{
            // if not the same do not display
            figures[i].style.display = 'none';
          }
        }
      });

    }
}
let search = new Search();
search.eventsearch();