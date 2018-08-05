<template>
  <v-container
    grid-list-md
    class="QuestionList"
  >
    <v-layout row wrap>
      <v-flex
        v-for="question in questions"
        xs6
        :key="question.title"
      >
        <v-card class="Card">
          <v-card-media
            height="200px"
          >
            <v-container
              fill-height
              fluid
              pa-2
            >
              <v-layout fill-height>
                <v-flex xs12 align-end flexbox>

                  <v-container class="Top" fluid>
                    <v-layout align-center justify-center row>
                        <v-flex xs6>
                          <span class="Date font-italic">2d ago</span>
                        </v-flex>
                        <v-flex xs6 justify-end class="ButtonWrapper">
                          <v-btn icon class="Button">
                            <v-icon>more_vert</v-icon>
                          </v-btn>
                        </v-flex>
                      </v-layout>
                  </v-container>

                  <span 
                    class="headline light-blue--text font-weight-bold" 
                    v-text="question.title">
                  </span>
                </v-flex>
              </v-layout>
            </v-container>
          </v-card-media>

          <v-card-actions>
            <v-container class="Actions__bottom" fluid>
              <v-layout row>
                <v-flex style="flex-grow:0; margin-right:40px;" row>
                  <v-icon style="color: #29b6f6; font-size: 20px;">favorite</v-icon>
                  <span class="Count">0</span>
                </v-flex>
                <v-flex row>
                  <v-icon style="color: #29b6f6; font-size: 20px;">mode_comment</v-icon>
                  <span class="Count">0</span>
                </v-flex>
              </v-layout>
            </v-container>
          </v-card-actions>

          <v-card-actions class="grey lighten-2">
            <v-container style="padding: 0 16px;">
              <v-layout row>
                <v-flex>
              <v-chip color="light-blue lighten-1" text-color="white" label>multiple</v-chip>
              <v-chip color="light-blue lighten-1" text-color="white" label>math</v-chip>
              <v-chip color="light-blue lighten-1" text-color="white" label>course</v-chip>
              <v-chip color="light-blue lighten-1" text-color="white" label>njit</v-chip>
              <v-chip color="light-blue lighten-1" text-color="white" label>final</v-chip>
              <v-chip color="light-blue lighten-1" text-color="white" label>exam</v-chip>
              <v-chip color="light-blue lighten-1" text-color="white" label>time</v-chip>
                </v-flex>
              </v-layout>
            </v-container>
          </v-card-actions>
        </v-card>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<style scoped>
.QuestionList {
  margin-top: 60px;
}

.Card {
  margin: 5px 10px;
}

.headline {
  margin: 5px 10px;
  display: inline-block;
}

.Top {
  padding: 0 5px 0 15px;
}

.ButtonWrapper {
  text-align: right;
}
.Button {
  margin-right: 0;
}

.Actions__bottom {
  padding: 0 16px;
}
.Count {
  color: #039be5;
  display: block;
  /* font-size: 15px; */
  /* padding-top: 1px; */
  margin-left: 10px;
}
</style>

<script>
export default {
  data() {
    return {};
  },
  props: ["questions"]
};
</script>
