
const box = document.getElementById('selectEmoji');
let boutonEmoji = document.getElementById('emoji')

boutonEmoji.addEventListener("click", function (){  
  if (box.style.display == 'none'){
    box.style.display = 'block';
   
    const pickerOptions = {
    set: 'twitter',
    previewPosition: 'none',
    locale: Langue,
    onEmojiSelect: (emoji) => {        
      const preview = document.getElementById('previewCommentaire');
      console.log('render');
      const emojiHTML = twemoji.parse(emoji.native); 
    const img = document.createElement('img');
    /* insertion de la balise image emoji twitter dans la nouvelle balise img*/
    img.innerHTML = emojiHTML
    /* sélection uniquement de la balise image emoji twitter*/
    const testo = img.querySelector('img')
    testo.style.width = '1em';
    testo.style.height = '1em';
    // Insère l'élément img à l'endroit du curseur
    var selection = window.getSelection();
    var range = selection.getRangeAt(0);
    range.deleteContents();
    range.insertNode(testo);
    range.setStartAfter(testo);
    range.setEndAfter(testo);
    selection.removeAllRanges();
    selection.addRange(range);
    preview.focus();
      }
    }
  const picker = new EmojiMart.Picker(pickerOptions)
  box.appendChild(picker); 
  
  }else{
    box.style.display = 'none';
  }

})



/* document.addEventListener('click', function(event) {
  const emojiElement = document.getElementById('selectEmoji');

  // Vérifier si le clic n'est pas à l'intérieur de l'élément ou du bouton emoji
  if (!emojiElement.contains(event.target) ) {
      // Clic en dehors, exécutez votre action ici (par exemple, emoji = false)
      // Assurez-vous que l'objet ou la variable emoji est accessible ici
      emojiElement.style.display = "none";
      
  }
}); */
