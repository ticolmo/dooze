import './bootstrap';
import './bootstrapjs.js';
import './page/fans.js';
import './essential_audio.js';


const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))


/* $('.supporters').pagination({
  // Options de pagination
 
    dataSource: '.comments', // Utiliser les éléments avec la classe "comments" comme source de données
    pageSize: 6, // Nombre d'éléments par page
    callback: function(data, pagination) {
      // template method of yourself
      var html = template(data);
      dataContainer.html(html);
  }
  

  
}); */

/* $(function () {

  setTimeout(function() {
    $("#don").addClass("appar");
  }, 3000);

  setTimeout(masquer, 6000);
  function masquer() {
    $("#don").removeClass("appar").addClass("dispar")
  }
  $("#closeDon").click(function() {
    masquer();
  })
}); */

/* apparition des réponse des commentaires */
$(".commentaires").click(function () {
  let id = $(this).attr("data-id");
  $('#reponses' + id).toggle();
});
/* apparition des réponse des commentairesvisiteurs */
$(".commentairesvisiteur").click(function () {
  let id = $(this).attr("data-id");
  $('#reponsesvisiteur' + id).toggle();
});





/* modal sur les commentaires dans la page club*/
$(".options").click(function () {
  let id = $(this).attr("data-id");
  $('.alter' + id).show();

  $(document).on('click', function (event) {
    if (!$(event.target).closest('.alter' + id).length && !$(event.target).hasClass('options')) {
      $('.alter' + id).hide();
    }
  });
});


$(document).ready(function () {

  



/* recherche dynamique des clubs - inactif remplacé par Vue.js, #myInput enlevé de la balise input  */
  $("#myInput").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $(".dropdown-menu li a").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

/*   $("#emojionearea4").emojioneArea({
    pickerPosition: "bottom",
    filtersPosition: "bottom",
    tonesStyle: "checkbox",

  });

  $("#emojionearea5").emojioneArea({
    pickerPosition: "top",
    filtersPosition: "bottom",
    tones: false,
    autocomplete: false,
    inline: true,
    hidePickerOnBlur: false
  }); */


/* emoji - input*/
/*   $(".example3").emojioneArea(); */


/*aperçu d'image et de video uploadés dans le formulaire commentaireclub*/

  

/*aperçu d'image et de video uploadés dans le formulaire commentairevisiteur*/

  $("#fileInput1").change(function () {
      if (this.files && this.files[0]) {
          var file = this.files[0];
          var fileType = file.type.split('/')[0];

          if (fileType === 'image') { // Si c'est une image
              var reader = new FileReader();
              reader.onload = function (e) {
                  $('#previewContainer1').append('<img src="' + e.target.result + '">');
                  $('#previewContainer1').fadeIn();
                  $('.close1').show();
              }
              reader.readAsDataURL(file);
          } else if (fileType === 'video') { // Si c'est une vidéo
              var videoUrl = URL.createObjectURL(file);
              $('#previewContainer1').append('<video controls><source src="' + videoUrl + '"></video>');
              $('#previewContainer1').fadeIn();
              $('.close1').show();
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
                  $("#telechargement1").text('Téléchargement ('+ percentComplete + '%)');
              }
          };
          xhr.send(file);
      }
  });

  $(document).on("click", ".close1", function () {
      $("#previewContainer1").fadeOut();
      $("#previewContainer1 img").remove();
      $("#previewContainer1 video").remove();
      $("#fileInput1").val("");
      $('.close1').hide();
  });

  /* soumission des formulaires 
  pour que le bouton submit soit en dehors du formulaire 
  et que le modal de connexion marche */
/*   $(".soumettre").click(function() {
    const dataid = $(this).attr("data-id");
    const form = "#" + dataid;
    $(form).submit();
  }); */

});









