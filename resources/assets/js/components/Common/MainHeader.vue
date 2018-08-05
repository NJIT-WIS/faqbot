<template>
  <div>
    <v-navigation-drawer
      v-model="drawer"
      fixed
      clipped
      class="grey lighten-4"
      app
    >
      <v-list
        dense
        class="grey lighten-4"
      >
        <template v-for="(item, i) in items">
          <v-divider
            v-if="item.divider"
            :key="i"
            dark
            class="my-3"
          ></v-divider>
          <v-list-tile
            v-else
            :key="i"
          >
            <v-list-tile-action>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-tile-action>
            <v-list-tile-content>
              <v-list-tile-title class="black--text subheading">
                <a class="NavLink" :href="item.href">
                  {{ item.text }} 
                </a>
              </v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>
        </template>
      </v-list>
    </v-navigation-drawer>
    <v-toolbar color="blue-grey" app absolute clipped-left>
      <v-toolbar-side-icon color="white--text" @click.native="drawer = !drawer"></v-toolbar-side-icon>
      <span 
        class="title ml-3 mr-5 white--text"
        >
        FAQ&nbsp;
        <span class="ToolbarText">Bot</span>
      </span>
      <v-text-field
        solo-inverted
        flat
        hide-details
        label="Search"
        prepend-inner-icon="search"
        color="white"
        class="TextField"
      ></v-text-field>
      <v-spacer></v-spacer>
      <v-menu offset-y>
        <v-btn
          slot="activator"
          icon
          color="white--text"
        >
          <v-icon>person</v-icon>
        </v-btn>
        <v-list>
          <v-list-tile>
            <v-list-tile-title>
              <a href="/logout">Logout</a>
            </v-list-tile-title>
          </v-list-tile>
        </v-list>
      </v-menu>
    </v-toolbar>
  </div>
</template>

<style>
.ToolbarText {
  font-weight: 400;
}

.NavLink,
.NavLink:hover {
  color: inherit;
  text-decoration: none;
}

.TextField input[type="text"] {
  color: #fff !important;
}

.TextField .v-icon,
.TextField .v-label {
  color: #cfd8dc;
}

.TextField .v-input--is-focused .v-icon,
.TextField .v-input--is-focused .v-label {
  color: #fff;
}
</style>

<script>
export default {
  data: () => ({
    drawer: null,
    items: [
      { icon: "home", text: "Home", href: "/vuetify-questions" },
      { divider: true },
      { icon: "forum", text: "NJIT FAQ Bot", href: "/faqbot" },
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
    ]
  })
};
</script>
