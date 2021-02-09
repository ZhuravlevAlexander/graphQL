<template>
    <form @submit.prevent="submitForm">
        <div v-if="errorMessage" class="alert alert-message">
            {{errorMessage}}
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" class="form-control"
                   type="text" v-model="email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" class="form-control"
                   type="password" v-model="password">
        </div>
        <div class="form-group">
            <button class="btn btn-primary">
                Login
            </button>
        </div>
    </form>
</template>

<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                email: "",
                password: "",
                errorMessage: ""
            }
        },
        methods: {
            submitForm() {
                this.$query('login', {
                    email: this.email,
                    password: this.password
                }).then(res => {
                    let token = res.data.data.login;

                    if(token) {
                        sessionStorage.setItem('api-token', token);
                        this.$appEvents.$emit('log-on')
                        this.$router.push({ path: '/' })
                    } else {
                        this.errorMessage = 'The email adress and/or password is incorrect.';
                    }
                })
            }
        }
    }
</script>
