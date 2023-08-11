


var swiper = new Swiper(".swiper", {
    slidesPerView: 4,
    spaceBetween: 30,
    speed: 900,
    slidesPerGroup: 4,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: true,
    },
    loopFillGroupWithBlank: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

$(document).ready(function() {
$("#choose1").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".dropdown-menu li a").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});
});

/*aperçu de la photo de profil*/

$(document).ready(function () {
  $("#fileInput").change(function () {
      if (this.files && this.files[0]) {
          var file = this.files[0];
          var fileType = file.type.split('/')[0];

          if (fileType === 'image') { // Si c'est une image
              var reader = new FileReader();
              reader.onload = function (e) {
                  $('#previewContainer').html('<img src="' + e.target.result + '">');
                  $('#previewContainer').fadeIn();
                  $('.close').show();
              }
              reader.readAsDataURL(file);
          }

          // Utilisation de XMLHttpRequest pour suivre l'état de progression de l'envoi
          var xhr = new XMLHttpRequest();
          xhr.open('POST', 'url_du_serveur');
          xhr.upload.onprogress = function (e) {
              if (e.lengthComputable) {
                  var percentComplete = (e.loaded / e.total) * 100;
                  console.log(percentComplete + '% uploaded');
                  // Mettre à jour la barre de progression
                  // Remplacer "maBarreDeProgression" par le sélecteur de votre barre de progression
                  $("#telechargement").text('Téléchargement ('+ percentComplete + '%)');
              }
          };
          xhr.send(file);
      }
  });

  $(document).on("click", ".close", function () {
      $("#previewContainer").fadeOut();
      $("#previewContainer img").remove();      
      $("#fileInput").val("");
      $('.close').hide();
  });
});

//-------  Lecture de la video en page d'acceuil sans interruption de page en page

// Obtenir l'élément vidéo
var myVideo = document.getElementById("myvideo");

// Ajouter un événement pour enregistrer l'instant de lecture dans un cookie à chaque changement de l'instant de lecture
myVideo.addEventListener('timeupdate', function() {
  Cookies.set('currentTime', myVideo.currentTime);
});

// Ajouter un événement pour récupérer l'instant de lecture stocké dans le cookie lors du chargement de la page
window.addEventListener('load', function() {
  var currentTime = Cookies.get('currentTime');
  if (currentTime) {
    myVideo.currentTime = currentTime;
  }
});

// Sélection groupée des messages à supprimer (à ne pas placer après code js auth.edit)
$('#master-checkboxrep').change(function() {
  const isChecked = $(this).prop('checked');
  $('.checkboxrep').prop('checked', isChecked);
});
$('#master-checkboxenv').change(function() {
  const isChecked = $(this).prop('checked');
  $('.checkboxenv').prop('checked', isChecked);
});
$('#master-checkboxcorb').change(function() {
  const isChecked = $(this).prop('checked');
  $('.checkboxcorb').prop('checked', isChecked);
});


// Suppression des messages de la Messagerie
$("#selection1").click(function() {
  $("#boitereception").submit();
});
$("#selection2").click(function() {
  $("#boiteenvoi").submit();
});
$("#selection3").click(function() {
  $("#corbeille").submit();
});




//-------  Transfert des valeurs des balises select dans les inputs "hidden" du formulaire de la page auth.edit 
//-------  Laravel Fortify ne recupére pas les valeurs des balises select pour les modifications.


const Select = document.getElementById("floatingSelect1");
const Input = document.getElementById("categorie");

// Écouter les changements dans la sélection
Select.addEventListener("change", () => {
  // Récupérer la valeur sélectionnée
  const selectedChoice = Select.value;

  // Mettre à jour la valeur de l'input
  Input.value = selectedChoice;
});

const Select2 = document.getElementById("floatingSelect2");
const Input2 = document.getElementById("pays");

// Écouter les changements dans la sélection
Select2.addEventListener("change", () => {
  // Récupérer la valeur sélectionnée
  const selectedChoice2 = Select2.value;

  // Mettre à jour la valeur de l'input
  Input2.value = selectedChoice2;
});

const Select3 = document.getElementById("floatingSelect3");
const Input3 = document.getElementById("langue");

// Écouter les changements dans la sélection
Select3.addEventListener("change", () => {
  // Récupérer la valeur sélectionnée
  const selectedChoice3 = Select3.value;

  // Mettre à jour la valeur de l'input
  Input3.value = selectedChoice3;
});


/* emoji - input*/
$(document).ready(function() {
  $(".example3").emojioneArea();
});










