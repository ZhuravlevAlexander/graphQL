<template>
    <div class="container">
        <div class="card-columns">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <router-link :to="`/project/${project.id}`">
                            {{project.title}}
                        </router-link>
                    </h5>
                    <p class="card-text">{{project.description}}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
       props:['project']
    }
</script>
