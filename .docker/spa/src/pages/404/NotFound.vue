<template>
  
  <grid-vue tamanho="12 l12 m12" style="padding: 12%;">
<!--************************
    ****** 1 LINHA *********
    ************************ -->
    <vs-row vs-w="12">
      <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-lg="4" vs-sm="4" vs-xs="12" >
        
      </vs-col>


      <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-lg="4" vs-sm="4" vs-xs="12">
        <img src="./../../assets/sad.png" height="125" alt="Page-NotFound">
      </vs-col>


      <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-lg="4" vs-sm="4" vs-xs="12">
        
      </vs-col>
    </vs-row>

<!--************************
    ****** 2 LINHA *********
    ************************ -->

    <vs-row vs-w="12">
      <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-lg="4" vs-sm="4" vs-xs="12" >
        
      </vs-col>

      <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-lg="4" vs-sm="4" vs-xs="12">
        <h1>404</h1>
      </vs-col>

      <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-lg="4" vs-sm="4" vs-xs="12">
        
      </vs-col>
    </vs-row>

<!--************************
    ****** 3 LINHA *********
    ************************ -->

    <vs-row vs-w="12">
      <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-lg="4" vs-sm="4" vs-xs="12" >
        
      </vs-col>

      <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-lg="4" vs-sm="4" vs-xs="12">
        <h5>Page NotFound!</h5>&nbsp;&nbsp;&nbsp;&nbsp;
        <vs-button radius @click="routeBack" color="dark" type="line" size="75px" icon="keyboard_return"></vs-button>
        <!-- <img src="./../../assets/logo-timenow.jpg" height="100" alt="Time-Now Engenharia"> -->
      </vs-col>

      <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-lg="4" vs-sm="4" vs-xs="12">
        
      </vs-col>
    </vs-row>

  </grid-vue>
  
</template>

<script>
import GridVue from '@/components/layouts/GridVue'

export default {
  name: 'NotFound',
  data() {
    return {
      
    }
  },
  methods: {
    routeBack() {
      this.$router.push('/')
    }
  },
  components:{
    GridVue
  }
  
}
</script>
<style scoped>

</style>
