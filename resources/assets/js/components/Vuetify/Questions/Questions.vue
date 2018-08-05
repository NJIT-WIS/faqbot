<template>
  <div>
    <v-navigation-drawer
      fixed
      clipped
      class="grey lighten-4"
      app
      v-model="drawer"
    >
      <v-list
        dense
        class="grey lighten-4"
      >
        <template v-for="(item, i) in navItems">
          <v-layout
            row
            v-if="item.heading"
            align-center
            :key="i"
          >
          </v-layout>
          <v-divider
            dark
            v-else-if="item.divider"
            class="my-3"
            :key="i"
          ></v-divider>
          <v-list-tile
            :key="i"
            v-else
            @click=""
          >
            <v-list-tile-action>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-tile-action>
            <v-list-tile-content>
              <v-list-tile-title class="black--text subheading">
                <a :href="item.href">
                  {{ item.text }}
                </a>
              </v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>
        </template>
      </v-list>
    </v-navigation-drawer>
    <v-toolbar color="amber" app absolute clipped-left>
      <v-toolbar-side-icon @click.native="drawer = !drawer"></v-toolbar-side-icon>
      <span class="title ml-3 mr-5">FAQ&nbsp;<span class="text">Bot</span></span>
      <v-text-field
        solo-inverted
        flat
        label="Search"
        prepend-icon="search"
      ></v-text-field>
      <v-spacer></v-spacer>
      <v-menu offset-y>
        <v-btn
          slot="activator"
          icon
        >
          <v-icon>person</v-icon>
        </v-btn>
        <v-list>
          <v-list-tile>
            <v-list-tile-title>
              <a href="/logout">Logout</a>
            </v-list-tile-title>
          </v-list-tile>
          <v-list-tile>
            <v-list-tile-title>
              <a href="/register">Register</a>
            </v-list-tile-title>
          </v-list-tile>
          <v-list-tile>
            <v-list-tile-title>
              <a href="/login">Login</a>
            </v-list-tile-title>
          </v-list-tile>
        </v-list>
      </v-menu>
    </v-toolbar>

    <list v-bind:questions="questions"></list>
  </div>
</template>


<style scoped>
</style>

<script>
export default {
  mounted() {
    axios
      .get("/question")
      .then(response => {
        console.log("response", response);
      })
      .catch(error => {
        console.error(error.message);
      });
  },
  data() {
    return {
      drawer: null,
      navItems: [
        { icon: "home", text: "Home", href: "/vuetify-questions" },
        { divider: true },
        { icon: "forum", text: "NJIT FAQ Bot", href: "/vuetify-botman" },
        { icon: "view_module", text: "Archive", href: "/" },
        {
          icon: "hourglass_empty",
          text: "Recent Questions",
          href: "/vuetify-questions"
        },
        { icon: "hourglass_full", text: "Recent Answers", href: "/" },
        { divider: true },
        { icon: "star", text: "Hall of Fame", href: "/" },
        { icon: "settings", text: "Settings", href: "/" },
        { icon: "sms_failed", text: "Admin Panel", href: "/" }
      ],
      questions: [
        {
          title: "How hard are the math courses at NJIT?",
          src: "https://cdn.vuetifyjs.com/images/cards/house.jpg"
        },
        {
          title: `I'm taking multiple math courses with final exams taht take place at the same time...`,
          src: "https://cdn.vuetifyjs.com/images/cards/house.jpg"
        },
        {
          title: "What is the Math Placement Exam?",
          src: "https://cdn.vuetifyjs.com/images/cards/house.jpg"
        },
        {
          title: "I suck at Math and need help",
          src: "https://cdn.vuetifyjs.com/images/cards/house.jpg"
        },
        {
          title: "What will be on the Math 110 spring 2018 final exam?",
          src: "https://cdn.vuetifyjs.com/images/cards/house.jpg"
        },
        {
          title: "Graphing Calculator for Computer Science Major",
          src: "https://cdn.vuetifyjs.com/images/cards/house.jpg"
        },
        {
          title:
            "What are the office hours for MATH 211-002 with professor Smith?",
          src: "https://cdn.vuetifyjs.com/images/cards/house.jpg"
        }
      ]
    };
  }
};
</script>
