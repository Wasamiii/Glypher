class DragandDrop{
    constructor(){
        this.form = document.getElementById('blockSubmit');
        this.droparea = document.querySelector('div.drag-area');
        this.active = () => this.droparea.classList.add('green-border');
        this.inactive = () => this.droparea.classList.remove('green-border');
        this.preventDefault = (e) => e.preventDefault();
    }
    
    goToDragandDrop(){
        let inputIMG = document.querySelector('input[type="file"]');
        let labelFile = document.querySelector('label.label-file');
        let droppedFiles;
        
        inputIMG.addEventListener("change", function(e){
            droppedFiles = e.target.files;
            labelFile.innerHTML = droppedFiles[0].name;
        });
        //!la preview à modifier un petit peu car elle affiche plusieurs images mais la derniere est envoyé à la BDD donc afficher que la derniere
        let showFiles = (files) => {
            this.fileReader = new FileReader(); 
            this.img = new Image(128,128);
            this.fileReader.readAsDataURL(files);
            this.fileReader.onload= (files)=>{
                this.img.src = files.target.result;
                console.log(this.img.src);
                inputIMG.after(this.img);
            };
        };
        
        if(this.droparea){
            //reset propagation
            ['dragenter','dragover', 'dragleave', 'drop'].forEach(evtName =>{
                this.droparea.addEventListener(evtName,this.preventDefault);
            });
            //change statut on CSS his change color
            ['dragenter', 'dragover'].forEach(evtName =>{
                this.droparea.addEventListener(evtName, this.active);
            });
            //change statut on CSS his change color
            ['dragleave','drop'].forEach(evtName =>{
                this.droparea.addEventListener(evtName,this.inactive);
            });
            //event drop image on div
            this.droparea.addEventListener('drop', function(e){
                droppedFiles = e.dataTransfer.files;
                //verify === png image
                if(droppedFiles[0].type ==='image/png'){
                    labelFile.innerHTML = droppedFiles[0].name;
                    const dt = new DataTransfer();
                    dt.items.add(droppedFiles[0]);
                    inputIMG.files = dt.files;
                    console.log(inputIMG.files);
                    inputIMG.setAttribute('filename', droppedFiles[0].name);
                    //this.inputIMG.value = e.dataTransfer.files[0];
                    showFiles(droppedFiles[0]);
                    //console.log(showFiles(droppedFiles));
                }else{
                    alert('is not a png');
                }
            });
        }
        //change statut on label and input
        this.droparea.addEventListener("change",function(e){
            labelFile.innerHTML = e.target.files[0].name;
            inputIMG.setAttribute('value', e.target.files[0].name);
            showFiles(e.target.files[0]);
        });

        let input = document.querySelector("input.btn-submit");
        //event submit form
        //treatment  on php
        input.addEventListener("click",()=>{
            let form = document.getElementById('blockSubmit');
            form.submit();
        });
    }
}

let draganddrop = new DragandDrop();
let declarethis = draganddrop.goToDragandDrop();