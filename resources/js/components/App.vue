<template>
    <div>
        <nav>
            <div class="container d-flex flex-wrap">
                <div class="order-md-1 col-md-10">
                    <a href="/">
                        Project Management
                    </a>
                </div>
<!--                <button class="navbar-toggler" type="button">-->
<!--                </button>-->

                <div class="order-md-2 col-md-2">
                    <ul v-if="loggedIn" class="navbar-nav">
                        <li class="nav-item">
                            <router-link class="nav-link" :to="'/'">Dashboard</router-link>
                        </li>
                        <li class="nav-item">
                            <a href="#" @click.prevent="logoff" class="nav-link">Logout</a>
                        </li>
                    </ul>
                    <ul v-else class="navbar-nav">
                        <li class="nav-item">
                           <router-link class="nav-link" :to="'/login'">Login</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" :to="'/register'">Register</router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <section id="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                loggedIn: false
            }
        },
        created() {
            this.$appEvents.$on('log-on', () => {
                this.loggedIn = true
            })
            if(sessionStorage.getItem('api-token')) {
                this.loggedIn = true
            }
        },
        methods: {
            logoff() {
                sessionStorage.removeItem('api-token')
                this.loggedIn = false
                this.$router.push('/login')
            }
        }
    }
</script>
