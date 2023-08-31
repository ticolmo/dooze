<template>
    <div id="form">
       <form action="">
        <input type="text" name="" id=""  @keyup.enter="addPost"> <button><i class="bi bi-send"></i></button>
       </form>
    </div>
    

</template>

<script setup>

import { ref } from 'vue'

/* const emit = defineEmits(['sendPost']);  */

let post = ref([])

function addPost (e) {
  
    const value = e.target.value.trim()
    
    if (value) {
      post.value.push({
        date: Date.now(),
        message: value,
        
      })
       e.target.value = ''
    }
    console.log(JSON.stringify(post.value))
    
}

/* emit('sendPost', post)  */

</script>