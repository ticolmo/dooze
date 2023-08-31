<template>



<list-Post></list-Post>

<form-Post @send-post="message => display(message)"></form-Post>

</template>

<script setup>

const display = (message) => {
    /* console.log(message.value) */
    
}

</script>