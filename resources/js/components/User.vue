<template>
    <div class="users">
        <div class="loading" v-if="loading">
            Loading...
        </div>

        <div v-if="error" class="error">
            <p>{{ error }}</p>

            <p>
                <button @click.prevent="fetchData">
                    Try Again
                </button>
            </p>
        </div>

        <p v-if="user"> 
                <strong>Name:</strong> {{ user.name }},
                <strong>Email:</strong> {{ user.email }} 
        </p>
    </div>
</template>
<script>
import axios from 'axios';


export default {
    data() {
        return {
            loading: false,
            user: null,
            error: null,
        };
    },
    created() {
        this.fetchData();
    },
    methods: {
        fetchData() {
            this.error = this.users = null;
            this.loading = true;
            axios
                .get('/api/auth/user')
                .then(response => {
                    this.loading = false;
                    this.user = response.data;
                }).catch(error => {
                    this.loading = false;
                    this.error = error.response.data.message || error.message;
                });
        }
    }
}
</script>