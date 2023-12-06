
const pickerOptions = {
    set: 'twitter',
    previewPosition: 'none',
    locale: Langue,
    onEmojiSelect: (emoji) => {
      // Récupérer l'élément input par son ID (remplacez "votre-input-id" par l'ID réel de votre input)
      const inputElement = document.querySelector('.mart');
      const preview = document.getElementById('previewCommentaire');
        console.log(emoji);
      // Vérifier si l'élément input existe
      if (inputElement) {
        // Ajouter l'emoji à la valeur actuelle de l'input
        /*  inputElement.value += emoji.native; */
          // Convertir le shortcode en emoji Twemoji
    /* balise image emoji twitter */
    const emojiHTML = twemoji.parse(emoji.native);  
    /* inputElement.value += emojiHTML; */
    /* création d'une nouvelle balise img */
    const img = document.createElement('img');
    /* insertion de la balise image emoji twitter dans la nouvelle balise img*/
    img.innerHTML = emojiHTML
    /* sélection uniquement de la balise image emoji twitter*/
    const testo = img.querySelector('img')
    testo.style.width = '1em';
    testo.style.height = '1em';
    /*  preview.appendChild(testo);  */
    // Insère l'élément img à l'endroit du curseur
    var selection = window.getSelection();
    var range = selection.getRangeAt(0);
    range.deleteContents();
    range.insertNode(testo);

    // Place le curseur après l'image insérée
    range.setStartAfter(testo);
    range.setEndAfter(testo);

    // Met à jour la sélection
    selection.removeAllRanges();
    selection.addRange(range);

    // Focus sur la div éditable
    preview.focus();


/* 
    const img = document.createElement('img');
    img.className = 'emoji';
    img.draggable = false;
    img.alt = emoji.native;
    img.src = `https://twemoji.maxcdn.com/v/14.0.2/72x72/${emoji.unified}.png`;
    preview.appendChild(img);
    const span = document.createElement('span');   
    span.style.backgroundImage = `url("https://twemoji.maxcdn.com/v/14.0.2/72x72/${emoji.unified}.png")`;
    span.style.backgroundSize = '1em 1em';
    span.style.padding = '0.15em';
    span.style.backgroundPosition = 'center center';
    span.style.backgroundRepeat = 'no-repeat'
    span.style.WebkitWextFillColor = 'transparent';
    preview.appendChild(span);  */



;



    /* faire un input hidden qui prend automatiquement le contenu d'une div contenable qui a des span avec emoji
      */
      }
    }
    
  };

  
  const picker = new EmojiMart.Picker(pickerOptions)

  const marta = document.getElementById('selectEmoji');
 console.log(marta)
  marta.appendChild(picker);


    

    