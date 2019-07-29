<template lang="html">
  <div>
    <vs-tabs :color="colorx">
      <vs-tab label="Pets" icon="pets" @click="colorx = '#8B0000'">

        Hello World1!
      </vs-tab>

      <vs-tab label="Bank" icon="account_balance" @click="colorx = '#FFA500'">

        Hello World2!
      </vs-tab>

      <vs-tab label="Dashboard" icon="dashboard" @click="colorx = '#551A8B'">

        Hello World3!
      </vs-tab>

      <vs-tab label="Profile" icon="account_circle" @click="colorx = '#0000FF'">

        Hello World4!
      </vs-tab>
    </vs-tabs>
  </div>
</template>

<script>
export default {
  name: 'TabsIcons',
  data:()=>({
    colorx: '#8B0000'
  })
}
</script>