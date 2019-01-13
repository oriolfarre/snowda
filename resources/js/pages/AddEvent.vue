<template>
    <div class="container">
        <div class="card card-default">
            <div class="card-header">Nuevo evento</div>
            <div class="card-body">
                <div class="alert alert-danger" v-if="has_error && !success">
                    <p v-if="error == 'registration_validation_error'">Error de validación, por favor consulte los mensajes a continuación.</p>
                    <p v-else>Error, no se puede registrar por el momento. Si el problema persiste, póngase en contacto con un administrador.</p>
                </div>
                <form autocomplete="off" @submit.prevent="addEvent" v-if="!success" method="post">
                    <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.title }">
                        <label for="title">Título</label>
                        <input type="text" id="title" class="form-control" placeholder="Esquiada a ..." v-model="title">
                        <span class="help-block" v-if="has_error && errors.title">{{ errors.title }}</span>
                    </div>
                    <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.description }">
                        <label for="description">Descripción</label>
                        <textarea id="description" class="form-control" v-model="description"/>
                        <span class="help-block" v-if="has_error && errors.description">{{ errors.description }}</span>
                    </div>
                    <button type="submit" class="btn btn-default">Crear evento</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    data() {
      return {
        title: '',
        description: '',
        main_image: '',
        has_error: false,
        error: '',
        errors: {},
        success: false
      }
    },
    methods: {
      addEvent() {
        var app = this
        this.$auth.newevent({
          data: {
            title: app.title,
            description: app.description,
          },
          success: function () {
            app.success = true
            this.$router.push({name: 'home', params: {successRegistrationRedirect: true}})
          },
          error: function (res) {
            console.log(res.response.data.errors)
            app.has_error = true
            app.error = res.response.data.error
            app.errors = res.response.data.errors || {}
          }
        })
      }
    }
  }
</script>