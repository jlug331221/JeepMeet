<template>
  <div class="columns is-mobile is-centered">
    <div class="column is-three-quarters-mobile is-half-tablet is-half-desktop">
      <section class="section is-medium has-text-left whitesmoke-section">
        <h2 class="title is-2">Join Now</h2>
        
        <div class="field is-horizontal">
          <div class="field-body">
            <b-field>
              <b-input placeholder="First Name"
                icon-pack="fa"
                icon="user"
                v-model="formFields.first_name"
                required>
              </b-input>
            </b-field>

            <b-field>
              <b-input placeholder="Last Name"
                icon-pack="fa"
                icon="user"
                v-model="formFields.last_name"
                required>
              </b-input>
            </b-field>
          </div>
        </div>

        <b-field>
          <b-input placeholder="Username"
            icon-pack="fa"
            icon="user-circle"
            v-model="formFields.username"
            required>
          </b-input>
        </b-field>

        <b-field>
          <b-input placeholder="Email"
            icon-pack="fa"
            icon="envelope"
            type="email"
            v-model="formFields.email"
            required>
          </b-input>
        </b-field>

        <b-field>
          <b-input type="password"
            placeholder="Password"
            v-model="formFields.password"
            icon-pack="fa"
            icon="lock"
            class="register-password"
            password-reveal
            required>
          </b-input>
        </b-field>

        <b-field>
          <b-input type="password"
            placeholder="Confirm Password"
            v-model="formFields.confirm_password"
            icon-pack="fa"
            icon="lock"
            class="register-password"
            password-reveal
            required>
          </b-input>
        </b-field>

        <div class="field">
          <div class="control">
            <button class="button button-filled is-rounded">Join</button>

            <button class="button is-rounded">Clear</button>
          </div>
        </div>
      </section>
    </div>
  </div>
</template>

<script>
  import { required, email } from 'vuelidate/lib/validators';
  import { Notification, Input } from 'buefy';

  export default {
    name: "register",

    data() {
      return {
        formFields: {
          first_name: "",
          last_name: "",
          username: "",
          email: "",
          password: "",
          confirm_password: ""
        }
      }
    },

    methods: {

    },

    // Vuelidate validation rules
    validations: {
      formFields: {
        first_name: {
          required
        },

        last_name: {
          required
        },

        username: {
          required
        },

        email: {
          required,
          email
        }
      }
    }
  }
</script>

<style lang="scss">
  .register-password.control.has-icons-left .icon,
  .register-password.control.has-icons-right .icon {
    pointer-events: visible !important;
  }
</style>