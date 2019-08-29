<template>
<div class="row">
  <div class="card animated fadeInUp">

    <div class="card-content">
      <div class="row valign-wrapper">
        <grid-vue tamanho="1">
          <router-link :to="'/user/' + userId">
            <img :src="perfil" :alt="nome" class="circle responsive-img">
          </router-link>  
        </grid-vue>
        <grid-vue tamanho="11">
          <span class="black-text">
            <strong>{{nome}}</strong> - <small>{{data}}</small>
          </span>
        </grid-vue>
      </div>

      <slot />

    </div>

    <div class="card-action">
      <p>
        <a style="cursor: pointer; color: red" @click="liked(id)">
          <i class="material-icons" style="color: red">{{ like }}</i>{{totalLikes}}
        </a>
        <a style="cursor: pointer; color: #076305;" @click="openComment()">
          <i class="material-icons" style="color: #076305">question_answer</i>{{listComments.length}}
        </a>
      </p>

      <p v-if="showComment" class="right-align" style="padding: 5%">

        <textarea id="textarea1" v-model="textComment" placeholder="Digite seu comentário..." class="materialize-textarea" maxlength="123"></textarea>
        <a v-if="textComment" @click="comment(id)" class="btn-floating btn-small waves-effect waves-light light-blue accent-3 animated fadeInRight" style="margin-top: 5%"><i class="material-icons">send</i></a>

      </p>

      <p v-if="showComment" style="margin-top: 5%"> 
        <ul class="collection animated fadeIn" style="overflow-y: scroll; overflow-x: hidden; height: 170px;">

          <li class="collection-item avatar" v-for="item in totalcomments" :key="item.id">
            <img :src="item.user.avatar" alt="" class="circle">

            <span class="title">{{item.user.name}}<small> &nbsp;&nbsp;-&nbsp;&nbsp; {{item.date}}</small></span>
            <p style="padding-top: 15px; padding-left: 12px">
              
              {{item.text}}
            </p>
          </li>
        </ul>

      </p>

    </div>

  </div>
</div>
</template>

<script>
import GridVue from '@/components/layouts/GridVue'

export default {
  name: 'CardContentVue',
  props:['id','perfil','nome','data','totallikes','likecontent','totalcomments', 'userId'],
  data () {
    return {
      like: this.likecontent ? 'favorite' : 'favorite_border',
      totalLikes: this.totallikes,
      textComment: '',
      showComment: false,
      listComments: this.totalcomments || []

    }
  },
  components:{
    GridVue
  },
  methods: {
    liked(id) {

      this.$http.put(this.$url+`content/liked/`+ id, {}, {"headers": {"authorization":"Bearer " + this.$store.getters.getToken}})
        .then(res => {

          if (res.status) {

            this.totalLikes = res.data.likes
            this.$store.commit('setContentsTimeLine', res.data.list.contents.data)

            if (this.like == 'favorite_border') {
              this.like = 'favorite'
            } else {
              this.like = 'favorite_border'
            }

          } else {
            alert(res.data.erro)
          }

        }).catch(e =>{

          console.log(e)
          alert(`Error ${e}; Tente novamente mais tarde!`)
        })
    },
    openComment() {
      this.showComment = !this.showComment
    },
    comment(id) {
      if(!this.textComment) {
        return ;
      }
      this.$http.put(this.$url+`content/comment/`+ id, {
          text: this.textComment

        }, {"headers": {"authorization":"Bearer " + this.$store.getters.getToken}})
        .then(res => {

          if (res.status) {
            this.textComment = ''
            this.$store.commit('setContentsTimeLine', res.data.list.contents.data)

          } else {
            alert(res.data.erro)
          }

        }).catch(e =>{

          console.log(e)
          alert(`Error ${e}; Tente novamente mais tarde!`)
        })
    }

  } 
}
</script>
<style scoped>

</style>
