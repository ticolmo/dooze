import {Livewire, Alpine} from '../../../vendor/livewire/livewire/dist/livewire.esm'

document.addEventListener('alpine:init', () => {
  Alpine.data('formulaire', () => ({
    lieu : false, 
    emoji(){
      const box = document.getElementById('selectEmoji');
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
    },
    soumission() {
      var divContent = document.getElementById('previewCommentaire').innerHTML;

      // Ajouter le contenu de la div à un champ de formulaire invisible
      var hiddenInput = document.getElementById('commentaireInput');
      hiddenInput.setAttribute('value', divContent);
      
      //soumission du formulaire
      var form = document.getElementById('commentaireclub');
      form.submit();
     
    }
    
  })), 
  Alpine.data('index', () => ({
    isBottom: function() {
    const scrollY = window.scrollY;
    const windowHeight = window.innerHeight;
    const bodyHeight = document.body.scrollHeight;

    return scrollY + windowHeight >= bodyHeight;
    },
    init() {
        window.addEventListener('scroll', () => {
      if (this.isBottom()) {
        Livewire.on('pagination');
      }})
    
}}))
})

Livewire.start()

/* document.addEventListener('livewire:init', () => {
Livewire.hook('morph.updated', ({ component }) => {


  if(component.canonical.section == "fans"){
    setTimeout( emoji(), 500)

  }
})

}) */



/* document.addEventListener('click', function(event) {
  const emojiElement = document.getElementById('selectEmoji');

  // Vérifier si le clic n'est pas à l'intérieur de l'élément ou du bouton emoji
  if (!emojiElement.contains(event.target) ) {
      // Clic en dehors, exécutez votre action ici (par exemple, emoji = false)
      // Assurez-vous que l'objet ou la variable emoji est accessible ici
      emojiElement.style.display = "none";
      
  }
}); */
