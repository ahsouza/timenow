<template>
  <SiteTemplate>

    <span slot="menu-left">
      <div class="row valign-wrapper">
        <grid-vue tamanho="1 l6 m12">
          <img src="http://materializecss.com/images/yuna.jpg" alt="" width="100" class="circle responsive-img"> <!-- notice the "circle" class -->
        </grid-vue>


        <grid-vue tamanho="1 l6 m6" class="about-avatar">
          <span class="black-text">
            <h6>@ahsouza</h6>
            Financeiro
          </span>
        </grid-vue>
      </div>
    </span>




    <span slot="main">
      <public-content-vue />
      <card-content-vue
      perfil="http://materializecss.com/images/yuna.jpg"
      nome="Aníbal Henrique"
      data="21/03/2019 16:52">
      <card-detail-vue
      img="https://materializecss.com/images/sample-1.jpg"
      txt="Jogo educacional causa vicío em escolas para ensino fundamental e médio em toda região da grande Vitória"
      title="A aplicação IQuizz é show!"
      />
      </card-content-vue>
    </span>

  </SiteTemplate>
</template>

<script>
import SiteTemplate from '@/templates/SiteTemplate'
import CardContentVue from '@/components/patterns/CardContentVue'
import CardDetailVue from '@/components/patterns/CardDetailVue'
import PublicContentVue from '@/components/patterns/PublicContentVue'

export default {
  name: 'Home',
  data () {
    return {

    }
  },
  components:{
    CardContentVue,
    SiteTemplate,
    CardDetailVue,
    PublicContentVue
  }
}
</script>
<style scoped>

.about-avatar {
  margin-left: 15px;
}

</style>
