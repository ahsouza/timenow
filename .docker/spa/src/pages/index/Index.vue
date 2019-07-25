<template>
  <SiteTemplate>



  </SiteTemplate>
  
</template>

<script>
import SiteTemplate from '@/templates/SiteTemplate'
import CardContentVue from '@/components/patterns/CardContentVue'
import CardDetailVue from '@/components/patterns/CardDetailVue'
import PublicContentVue from '@/components/patterns/PublicContentVue'
import GridVue from '@/components/layouts/GridVue'

export default {
  name: 'Index',
  data() {
    return {
      user: false
    }
  },
  components:{
    CardContentVue,
    SiteTemplate,
    CardDetailVue,
    PublicContentVue,
    GridVue
  },
  created() {
    let userSession = sessionStorage.getItem('user')
    if (userSession) {
      this.user = JSON.parse(userSession)
    }
  }
  
}
</script>
<style scoped>

</style>
