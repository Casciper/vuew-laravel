<template>
    <div>
        <div class="nav animate__animated animate__fadeInRight">
            <router-link :to="{ name: 'home.index' }">Главная</router-link>
            <br>
            <router-link :to="{ name: 'person.index' }">Люди вокруг</router-link>
            <br>
            <router-link :to="{ name: 'person.create' }">Добавить</router-link>
            <br>
        </div>
        <router-view class="transition-start" v-slot="{ Component, route }">
            <transition
                :enter-active-class="route.meta.enterClass"
                :leave-active-class="route.meta.leaveClass">
                <Component :is="Component" />
            </transition>
        </router-view>
    </div>
</template>

<script>
export default {
    name: "App",
}
</script>

<style>
a {
    font-weight: bold;
    color: #2c3e50;
    text-decoration: none;
    margin-right: 1em;
    border-bottom: 2px solid transparent;
}

a:hover,
a.router-link-active {
    border-bottom: 2px solid #3498db;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}

.page{
    position: absolute;
    top: 80px;
}
</style>
