<template>
  <v-app id="inspire">
    <main-header></main-header>

    <v-content>
      <v-container
        fluid
        fill-height
        class="grey lighten-4"
      >
        <v-layout justify-center align-center>
          <v-flex shrink>
            
            <chat></chat>

          </v-flex>
        </v-layout>
      </v-container>
    </v-content>

  </v-app>
</template>

<style scoped>
</style>

<script>
import MainHeader from "../Common/MainHeader.vue";
import Chat from "./Chat/Chat.vue";

export default {
  components: { "main-header": MainHeader, chat: Chat },

  data() {
    return {};
  }
};
</script>
