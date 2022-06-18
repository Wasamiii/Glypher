class Checkboxvalid {
  constructor() {

  }
  //add iduser on sessionStorage
  loginput() {
    let p_session = document.querySelector('p.session');
    let session = sessionStorage.setItem('id_user', p_session.textContent);
  }
}
let checkbox = new Checkboxvalid();
checkbox.loginput();