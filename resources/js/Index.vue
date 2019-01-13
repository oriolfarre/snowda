<template>
    <div id="main">
        
        <header id="header">
            <!-- As a link -->
            <nav class="navbar navbar-dark bg-dark">
                <a class="navbar-brand" href="#">
                    <router-link :to="{name: 'home'}">
                        Snowda
                    </router-link>
                </a>
                <navigationMenu></navigationMenu>
            </nav>
        
            
        </header>
        <div id="content">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
  import navigationMenu from './components/Menu.vue'
  export default {
    data() {
      return {
        //
      }
    },
    components: {
      navigationMenu
    }
  }
</script>