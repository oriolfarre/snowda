<template>
    <nav id="nav">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Login
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <!--UNLOGGED-->
                    <li v-if="!$auth.check()" v-for="(route, key) in routes.unlogged" v-bind:key="route.path">
                        <router-link  :to="{ name : route.path }" :key="key">
                            {{route.name}}
                        </router-link>
                    </li>
                    <!--LOGGED USER-->
                    <li v-if="$auth.check(1)" v-for="(route, key) in routes.user" v-bind:key="route.path">
                        <router-link  :to="{ name : route.path }" :key="key">
                            {{route.name}}
                        </router-link>
                    </li>
                    <!--LOGGED ADMIN-->
                    <li v-if="$auth.check(2)" v-for="(route, key) in routes.admin" v-bind:key="route.path">
                        <router-link  :to="{ name : route.path }" :key="key">
                            {{route.name}}
                        </router-link>
                    </li>
                    <!--LOGOUT-->
                    <li v-if="$auth.check()">
                        <a href="#" @click.prevent="$auth.logout()">Logout</a>
                    </li>
            </div>
        </div>
    
    </nav>
</template>

<script>
  export default {

    data() {

      return {

        routes: {
          // UNLOGGED
          unlogged: [
            {
              name: 'Registrarse',
              path: 'register'
            },
            {
              name: 'Entrar',
              path: 'login'
            }
          ],
          // LOGGED USER
          user: [
            {
              name: 'Dashboard',
              path: 'dashboard'
            }
          ],
          // LOGGED ADMIN
          admin: [
            {
              name: 'Dashboard',
              path: 'admin.dashboard'
            }
          ]
        }

      }

    },
    mounted() {
      //
    }
  }
</script>