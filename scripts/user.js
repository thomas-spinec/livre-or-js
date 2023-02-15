// attente du chargement du DOM
document.addEventListener("DOMContentLoaded", function () {
  // création des variables
  // récupération pour l'inscription
  let section_insc = document.querySelector("#inscription");
  let form_insc = section_insc.querySelector("form");
  let login_insc = form_insc.querySelector(".login");
  let password_insc = form_insc.querySelector(".password");
  let password2 = form_insc.querySelector("#password2");
  let btnInsc = document.querySelector("#btnInsc");
  let validation = false;

  // récupération pour la connexion
  let section_conn = document.querySelector("#connexion");
  let form_conn = section_conn.querySelector("form");
  let login_conn = form_conn.querySelector(".login");
  let password_conn = form_conn.querySelector(".password");
  let btnConn = document.querySelector("#btnConn");

  // récupération de l'url dans une string
  let str = window.location.href;
  let url = new URL(str);
  // récupération du paramètre "sign" de l'url
  let sign = url.searchParams.get("sign");

  // fonctions de display
  // affichage de la section connexion
  function displayConn() {
    section_insc.style.display = "none";
    section_conn.style.display = "block";
    // modification du title
    document.title = "Connexion";
  }
  // affichage de la section inscription
  function displayInsc() {
    section_insc.style.display = "block";
    section_conn.style.display = "none";
    // modification du title
    document.title = "Inscription";
  }

  // affichage évolutif
  if (sign == "insc") {
    displayInsc();
  } else if (sign == "conn") {
    displayConn();
  }
  // affichage de la section inscription par défaut
  else {
    displayInsc();
  }
  //////////////////////////////////////////////////
  // Function for inscription                ///////
  //////////////////////////////////////////////////
  // Verif login
  function verifLogin() {
    let loginValue = login_insc.value;
    // verif s'il y a un login
    if (loginValue === "") {
      login_insc.nextElementSibling.innerHTML = "Veuillez rentrer un login";
      // change border color and background
      login_insc.style.borderColor = "red";
      login_insc.style.backgroundColor = "#ff000063";

      validation = false;
    } else {
      login_insc.nextElementSibling.innerHTML = "";
      // change border color to default
      login_insc.style.borderColor = "initial";
      login_insc.style.backgroundColor = "#fafafa";
      // verif que le login est disponible
      let dataLogin = new FormData();
      dataLogin.append("verifLogin", loginValue);
      //   console.log(dataLogin);
      fetch("verif.php", {
        method: "POST",
        body: dataLogin,
      })
        .then((response) => response.text())
        .then((response) => {
          response = response.trim();
          //   console.log(response);
          if (response === "indispo") {
            login_insc.nextElementSibling.innerHTML = "Ce login est déjà pris";
            // change border color and background
            login_insc.style.borderColor = "red";
            login_insc.style.backgroundColor = "#ff000063";

            validation = false;
          } else if (response === "dispo") {
            login_insc.nextElementSibling.innerHTML = "";
            // change border color and background
            login_insc.style.borderColor = "green";
            login_insc.style.backgroundColor = "#fafafa";
            // suppression de la clé
            dataLogin.delete("verifLogin");
            validation = true;
          }
        })
        .catch((error) => console.log(error));
    }
  }

  // Verif password
  function verifPassword() {
    let passwordValue = password_insc.value;

    // verif s'il y a un password
    if (passwordValue === "") {
      password_insc.nextElementSibling.innerHTML =
        "Veuillez rentrer un mot de passe";
      // change border color and background
      password_insc.style.borderColor = "red";
      password_insc.style.backgroundColor = "#ff000063";
      validation = false;
    } else {
      password_insc.nextElementSibling.innerHTML = "";
      // change border color and background
      password_insc.style.borderColor = "green";
      password_insc.style.backgroundColor = "#fafafa";
      validation = true;
    }
  }

  // Verif correspondance entre les password
  function verifPassword2() {
    let passwordValue = password_insc.value;
    let password2Value = password2.value;

    // verif s'il y a un password
    if (password2Value === "") {
      password2.nextElementSibling.innerHTML =
        "Veuillez confirmer votre mot de passe";
      // change border color and background
      password2.style.borderColor = "red";
      password2.style.backgroundColor = "#ff000063";
      validation = false;
    } else {
      password2.nextElementSibling.innerHTML = "";
      // change border color and background to default
      password2.style.borderColor = "initial";
      password2.style.backgroundColor = "#fafafa";
      // verif que les password correspondent
      if (passwordValue === password2Value) {
        password2.nextElementSibling.innerHTML = "";
        // change border color and background
        password2.style.borderColor = "green";
        password2.style.backgroundColor = "#fafafa";
        validation = true;
      } else {
        password2.nextElementSibling.innerHTML =
          "Les mots de passe ne correspondent pas";
        // change border color and background
        password2.style.borderColor = "red";
        password2.style.backgroundColor = "#ff000063";
        validation = false;
      }
    }
  }

  //////////////////////////////////////////////////
  // Function for connexion                  ///////
  //////////////////////////////////////////////////
  // Verif login
  function verifLoginConn() {
    let loginValue = login_conn.value;
    // verif s'il y a un login
    if (loginValue === "") {
      login_conn.nextElementSibling.innerHTML = "Veuillez rentrer un login";
      // change border color and background
      login_conn.style.borderColor = "red";
      login_conn.style.backgroundColor = "#ff000063";

      validation = false;
    } else {
      login_conn.nextElementSibling.innerHTML = "";
      // change border color to default
      login_conn.style.borderColor = "initial";
      login_conn.style.backgroundColor = "#fafafa";
      // verif que le login est disponible
      let dataLogin = new FormData();
      dataLogin.append("verifLogin", loginValue);
      //   console.log(dataLogin);
      fetch("verif.php", {
        method: "POST",
        body: dataLogin,
      })
        .then((response) => response.text())
        .then((response) => {
          response = response.trim();
          //   console.log(response);
          if (response === "indispo") {
            login_conn.nextElementSibling.innerHTML = "Login ok";
            // change border color and background
            login_conn.style.borderColor = "green";
            login_conn.style.backgroundColor = "#fafafa";
            // suppression de la clé
            dataLogin.delete("verifLogin");
            validation = true;
          } else if (response === "dispo") {
            login_conn.nextElementSibling.innerHTML = "Ce login n'existe pas";
            // change border color and background
            login_conn.style.borderColor = "red";
            login_conn.style.backgroundColor = "#ff000063";

            validation = false;
          }
        })
        .catch((error) => console.log(error));
    }
  }

  // Verif password
  function verifPasswordConn() {
    let passwordValue = password_conn.value;

    // verif s'il y a un password
    if (passwordValue === "") {
      password_conn.nextElementSibling.innerHTML =
        "Veuillez rentrer un mot de passe";
      // change border color and background
      password_conn.style.borderColor = "red";
      password_conn.style.backgroundColor = "#ff000063";
      validation = false;
    } else {
      password_conn.nextElementSibling.innerHTML = "";
      // change border color and background
      password_conn.style.borderColor = "green";
      password_conn.style.backgroundColor = "#fafafa";
      validation = true;
    }
  }

  //////////////////////////////////////////////////
  // ajout des event pour l'inscription       ///////
  //////////////////////////////////////////////////
  // login
  login_insc.addEventListener("blur", verifLogin);
  // password
  password_insc.addEventListener("blur", verifPassword);
  // password2
  password2.addEventListener("keyup", verifPassword2);
  // btnInsc
  btnInsc.addEventListener("click", function (e) {
    e.preventDefault();
    if (validation) {
      let data = new FormData(form_insc);
      data.append("insc", "ok");
      fetch("verif.php", {
        method: "POST",
        body: data,
      })
        .then((response) => response.text())
        .then((response) => {
          response = response.trim();
          //   console.log(response);
          if (response === "ok") {
            displayConn();
          }
        })
        .catch((error) => console.log(error));
    }
  });

  //////////////////////////////////////////////////
  // ajout des event pour la connexion        ///////
  //////////////////////////////////////////////////
  // login
  login_conn.addEventListener("blur", verifLoginConn);
  // password
  password_conn.addEventListener("blur", verifPasswordConn);
  // btnConn
  btnConn.addEventListener("click", function (e) {
    e.preventDefault();
    if (validation) {
      let data = new FormData(form_conn);
      data.append("conn", "ok");
      fetch("verif.php", {
        method: "POST",
        body: data,
      })
        .then((response) => response.text())
        .then((response) => {
          response = response.trim();
          //   console.log(response);
          if (response === "ok") {
            // msg de connexion puis redirection
            btnConn.nextElementSibling.innerHTML =
              "Connexion réussie, vous allez être redirigé";
            setTimeout(() => {
              window.location.href = "index.php";
            }, 2000);
          } else if (response === "incorrect") {
            // msg de mdp incorrect
            password_conn.nextElementSibling.innerHTML =
              "Mot de passe incorrect";
            // change border color and background
            password_conn.style.borderColor = "red";
            password_conn.style.backgroundColor = "#ff000063";
          }
        })
        .catch((error) => console.log(error));
    }
  });
});
