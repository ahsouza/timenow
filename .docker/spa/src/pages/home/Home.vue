<template>
  <SiteTemplate>

    <span slot="menu-left">
      <div class="row valign-wrapper">
        <grid-vue tamanho="1 l6 m12">
          <img src="https://avatars3.githubusercontent.com/u/28975240?s=460&v=4" alt="" width="100" class="circle responsive-img"> <!-- notice the "circle" class -->
        </grid-vue>


        <grid-vue tamanho="1 l6 m6" class="about-avatar">
          <span class="black-text">
            <h6>@ahsouza</h6>
            Financeiro
            <br>
            Pts: <b>120</b>
          </span>
        </grid-vue>
      </div>
    </span>




    <span slot="main">
      <public-content-vue />
      <card-content-vue
      perfil="https://avatars3.githubusercontent.com/u/28975240?s=460&v=4"
      nome="Aníbal Henrique"
      data="21/03/2019 16:52">
      <card-detail-vue
      img="https://clickpetroleoegas.com.br/wp-content/uploads/2019/04/engenharia-752x440.jpg"
      txt="Exeplo de texto"
      title="Saiba mais da API Time-Now Engenharia"
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
