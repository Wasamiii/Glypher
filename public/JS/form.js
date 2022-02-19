class Form{
    constructor(){
        this.formadmin = document.querySelector('#blockModify');
        this.input_modify = document.querySelector('.btn-modify');
    }
    submitForm(){
        this.input_modify.addEventListener('click',()=>{
            this.formadmin.submit();
        });
    }
}
let form_modify = new Form();
let submit_modify = form_modify.submitForm();