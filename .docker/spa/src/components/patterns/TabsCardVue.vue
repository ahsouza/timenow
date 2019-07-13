<template>
	
  <div class="card">
    
    <div class="card-content">
      <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
    </div>

    <div class="card-tabs">
      <slot name="card-tabs"></slot>
    </div>

    <div class="card-content grey lighten-4">
      <slot name="card-tabs-content"></slot>
    </div>

  </div>

</template>
<script>

export default {
  name: 'TabsCardVue',
  data() {
    return {}
  }
}  
</script>