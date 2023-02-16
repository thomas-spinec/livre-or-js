// attente du chargement du DOM
document.addEventListener("DOMContentLoaded", function () {
  // récupération des variables
  let validation = false;
  const btnCom = document.querySelector("#com");
  const formCom = document.querySelector("#formCom");
  let text = document.querySelector("#comment");

  // fonction pour vérifier si le commentaire est valide
  function checkCom() {
    let textValue = text.value;
    if (textValue == "") {
      text.nextElementSibling.innerHTML = "Veuillez remplir le commentaire";
      // change border color and background
      text.style.borderColor = "red";
      text.style.backgroundColor = "#fde2e2";
      validation = false;
    } else {
      console.log(textValue);
      text.nextElementSibling.innerHTML = "";
      // change border color and background
      text.style.borderColor = "initial";
      text.style.backgroundColor = "initial";
      validation = true;
    }
  }

  // écoute des évènements
  text.addEventListener("blur", checkCom);
  btnCom.addEventListener("click", function (e) {
    e.preventDefault();
    console.log("click");
    if (validation) {
      let data = new FormData(formCom);
      data.append("addComment", "envoie");
      fetch("addComment.php", {
        method: "POST",
        body: data,
      })
        .then((response) => response.text())
        .then((data) => {
          data = data.trim();
          console.log(data);
          if (data == "ok") {
            btnCom.nextElementSibling.innerHTML =
              "Votre commentaire a bien été ajouté! Vous allez être redirigé";
            setTimeout(function () {
              window.location.href = "livre-or.php";
            }, 2000);
          }
        })
        .catch((error) => {
          console.log(error);
        });
    }
  });
});
