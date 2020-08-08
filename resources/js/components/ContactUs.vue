<template>
  <div class="columns is-mobile is-centered">
    <div class="column is-three-quarters-mobile is-half-tablet is-half-desktop">
      
      <div v-show="success" class="notification is-info contact-notification">
        <button v-on:click="hideSuccessNotification" class="delete"></button>
        {{ success }}
      </div>

      <div v-show="error" class="notification is-danger contact-notification">
        <button v-on:click="hideErrorNotification" class="delete"></button>
        {{ error }}
      </div>

      <section class="section whitesmoke-section">
        <h2 class="title is-2">Contact Us</h2>

        <form class="form" @submit.prevent="submitContactUsForm">
          <div class="field is-horizontal">
            <div class="field-body">
              <div class="field required">
                <label class="label">First Name
                  <span v-if="! $v.formFields.first_name.required"
                    class="red-asterisks">*</span>
                </label>
                
                <div class="control">
                  <input v-model="$v.formFields.first_name.$model"
                    class="input" type="text" name="first_name">

                  <small v-if="errors && errors.first_name"
                    class="form-test errors-text">
                    {{ errors.first_name[0] }}
                  </small>
                </div>
              </div>
      
              <div class="field">
                <label class="label">Last Name</label>
                
                <div class="control">
                  <input v-model="formFields.last_name" class="input" type="text"
                    name="last_name">
                </div>
              </div>
            </div>
          </div>
              
          <div class="field required">
            <label class="label">Email
              <span v-if="! $v.formFields.email.required"
                class="red-asterisks">*</span>
            </label>
            
            <div class="control has-icons-left has-icons-right">
              <input v-model="formFields.email"
                :class="{ 'input': true, 'red-email-text': $v.formFields.email.$invalid }"
                type="email" name="email">

              <small v-if="errors && errors.email" class="form-test errors-text">
                {{ errors.email[0] }}
              </small>

              <span class="icon is-small is-left">
                <i class="fas fa-envelope"></i>
              </span>
            </div>
          </div>

          <div class="field required">
            <label class="label">Message
              <span v-if="! $v.formFields.message.required"
                class="red-asterisks">*</span>
            </label>
            <div class="control">
              <textarea v-model="formFields.message" class="textarea"
                placeholder="Type your message here" name="message">
              </textarea>
              
              <small v-if="errors && errors.message" class="errors-text">
                {{ errors.message[0] }}
              </small>
            </div>
          </div>

          <div v-show="! loadingSpinner" class="field is-grouped">
            <div class="control">
              <button :disabled="submitButtonIsDisabled()"
                class="button button-filled is-rounded">Submit</button>
            </div>
            
            <div class="control">
              <button v-on:click="clearTextFormFieldsAndErrors()" type="button" 
                class="button is-text clear-button">Clear</button>
            </div>
          </div>

          <button v-show="loadingSpinner" class="button button-filled
            is-rounded is-loading"></button>
        </form>
      </section>
    </div>
  </div>
</template>

<script>
  import { required, email } from 'vuelidate/lib/validators';
  import { setTimeout } from 'timers';
  
  export default {
    name: "contact-us",
    
    data() {
      return {
        formFields: {
          first_name: "",
          last_name: "",
          email: "",
          message: ""
        },
        
        success: "",
        error: "", // Error with emailing JeepMeet admin or saving message to database
        
        errors: {}, // Server side errors for invalid form field values
        loadingSpinner: false
      }
    },

    methods: {
      submitContactUsForm() {
        this.loadingSpinner = true;
        this.success = ""; this.error = ""; this.errors = {};
        
        axios.post('/contact', this.formFields).then((res) => {
          this.loadingSpinner = false;
          this.clearTextFormFieldsAndErrors();
          this.success = res.data.success;

          // Set success to an empty string to hide notification after 5 seconds
          setTimeout(() => this.success = "", 8000);
        }).catch((err) => {
          console.log(err);
          this.loadingSpinner = false;
          
          // First check for form field errors and display those
          if(err.response.status === 422) {
            this.errors = err.response.data.errors || {};
            if(this.errors.first_name) { this.formFields.first_name = ""; }
            if(this.errors.email) { this.formFields.email = ""; }
            if(this.errors.message) { this.formFields.message = ""; }
            
            // Hide form field errors after 5 seconds
            setTimeout(() => this.errors = {}, 5000);
          }

          // Display server side error
          this.error = err;
          // Set error to an empty string to hide notification after 5 seconds
          setTimeout(() => this.error = "", 5000)
        })
      },

      clearTextFormFieldsAndErrors() {
        this.formFields.first_name = "";
        this.formFields.last_name = "";
        this.formFields.email = "";
        this.formFields.message = "";
        // Upon clicking the 'Clear' button, hide form field errors after 2 seconds
        setTimeout(() => this.errors = {}, 2000);
      },

      submitButtonIsDisabled() {
        return this.formFields.first_name === "" || this.formFields.email === "" 
          || this.formFields.message === "";
      },

      hideSuccessNotification() {
        // Set success to an empty string to hide notification
        if(this.success) { this.success = ""; }
      },

      hideErrorNotification() {
        if(this.error) { this.error = ""; }
      }
    },

    // Vuelidate validation rules
    validations: {
      formFields: {
        first_name: {
          required
        },

        email: {
          required,
          email
        },
        
        message: {
          required
        }
      }
    }
  }
</script>

<style lang="scss" scoped>
  @import '~@/_variables.scss';

  button.clear-button {
    color: $main-site-color;
    text-decoration: none;
  }
  button.clear-button {
    color: $secondary-site-color;
  }
  .red-email-text {
    color: #F00;
  }
  .contact-notification {
    margin-top: 2rem;
  }
</style>