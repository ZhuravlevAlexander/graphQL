<template>
    <div class="container">
           <project-card v-for="project in projects"
                         :project="project"
                         :key="project.id" ></project-card>
    </div>
</template>

<script>
    import axios from 'axios';
    import ProjectCard from './../ProjectCard';
    export default {
        components: {
            ProjectCard
        },
        data() {
            return {
                projects: []
            }
        },
        created() {
            this.$query('dashboard').then(res => {
                this.projects = res.data.data.projects;
            })
        }
    }
</script>
