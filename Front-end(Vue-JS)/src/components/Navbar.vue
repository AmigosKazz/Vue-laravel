<template>
    <div class="header">
<nav>
    <router-link to="/">Home</router-link>
    <router-link to="/liste">Liste</router-link>
</nav>
    </div>

    <br>
    <br>
    <br>
    <router-view></router-view>
</template>

<script setup>

</script>

<style lang="css" scoped>
nav
{
    font-weight: bold;
}

.header,nav,a{
    text-decoration: none;
    margin-left: 3vw;
    padding: 1vw;
    color: white;
}

.header
{
    background-color: blue;
    width: 100%;
    height: 3vw;
    margin: 0;
    padding: 0;
}
</style>