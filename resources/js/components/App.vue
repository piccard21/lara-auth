<template>
    <div>
        <h1>Vue Router Demo App</h1>

        <p>
            <a href="/logout">Logout</a> |
            <router-link :to="{ name: 'home' }">Home</router-link> |
            <router-link :to="{ name: 'hello' }">Hello World</router-link> |
            <router-link :to="{ name: 'users.index' }">Users</router-link> |
            <router-link :to="{ name: 'user' }">User</router-link>
        </p>

        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
    export default {}
</script>