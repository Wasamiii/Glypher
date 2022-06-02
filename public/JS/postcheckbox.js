class Checkboxvalid {
  constructor() {

  }
  //récupérer l'id user
  loginput() {
    let p_session = document.querySelector('p.session-notOwned');
    let session = sessionStorage.setItem('id_user', p_session.textContent);
  }
}
let checkbox = new Checkboxvalid();
checkbox.loginput();