<template>
  <div class="Chat">
    <v-container 
      grid-list-md 
      class="Chat__header"
    >
      <v-layout row wrap align-content-center>
        <v-flex xs12 class="Chat__botInfo">
          <img src="https://emojipedia-us.s3.amazonaws.com/thumbs/120/apple/129/robot-face_1f916.png" alt="FaqBot">
          <span class="title">FaqBot</span>
        </v-flex>
      </v-layout>  
    </v-container>

    <v-container
      grid-list-md
      class="Chat__messages"
      ref="chatBoxRef"
    >
      <v-layout row wrap>
        <template v-for="message in messages">
          <v-flex xs12 class="Chat__botMessage" v-if="message.author === 'bot'" :key="message.id">
            <img src="https://emojipedia-us.s3.amazonaws.com/thumbs/120/apple/129/robot-face_1f916.png" alt="FaqBot">
            <p>{{ message.body }}</p>
          </v-flex>

          <v-flex xs12 class="Chat__userMessage" v-if="message.author === 'user'" :key="message.id">
            <p>{{ message.body }}</p>
            <img src="https://emojipedia-us.s3.amazonaws.com/thumbs/120/apple/129/man_1f468.png" alt="FaqBot">
          </v-flex>
        </template>

        <div class="ChatBoxBottomAnchor"></div>
      </v-layout>

    </v-container>

    <v-container
      grid-list-md
      class="Chat__textField"
    >
      <v-layout row wrap>
        <v-flex xs11 class="Chat__textFieldWrapper">
          <input 
            type="text"
            v-model="userMessage"
            placeholder="Type your question here..."
            >
          
        </v-flex>
        <v-flex xs1>
           <v-btn flat icon color="blue-grey" v-on:click="sendMessage">
              <v-icon>send</v-icon>
            </v-btn>
        </v-flex>
      </v-layout>
    </v-container>
  </div>
</template>

<style scoped>
.Chat {
  /* min-width: 680px; */
  width: 95%;
  max-width: 680px;
  box-shadow: 0 3px 12px rgba(0, 0, 0, 0.23), 0 3px 12px rgba(0, 0, 0, 0.16);
}

.Chat__header {
  background-color: #cfd8dc;
}

.Chat__botInfo {
  display: flex;
  align-items: center;
}
.Chat__botInfo img {
  display: block;
  width: 42.5px;
  height: 42.5px;
}
.Chat__botInfo span {
  display: block;
  margin-left: 15px;
  color: #263238;
}

.Chat__messages {
  height: 450px;
  overflow-y: scroll;
  background-color: #fff;
}
.Chat__botMessage,
.Chat__userMessage {
  display: flex;
}

.Chat__userMessage {
  justify-content: flex-end;
}

.Chat__botMessage img,
.Chat__userMessage img {
  width: 25px;
  height: 25px;
  display: block;
  margin-top: 10px;
}
.Chat__botMessage p,
.Chat__userMessage p {
  display: block;
  width: 60%;
  padding: 10px 15px;
  border-radius: 15px;
  font-size: 16px;
}
.Chat__botMessage p {
  color: #fff;
  background-color: #607d8b;
  margin-left: 15px;
}
.Chat__userMessage p {
  text-align: right;
  color: #263238;
  background-color: #eceff1;
  margin-right: 15px;
}

.Chat__textField {
  background-color: #cfd8dc;
}
.Chat__textField input[type="text"] {
  width: 100%;
  color: #263238;
  font-size: 18px;
}
.Chat__textField input[type="text"]::placeholder {
  color: #263238;
}
.Chat__textFieldWrapper {
  display: flex;
}

.ChatBoxBottomAnchor {
  height: 55px;
  width: 100%;
}
</style>

<script>
const BOTMAN_API_ENDPOINT = "/botman";
const AUTHOR = { USER: "user", BOT: "bot" };

export default {
  data() {
    return {
      userMessage: "",
      messages: [
        { id: 1, body: "How can I help you?", author: "bot" },
        {
          id: 2,

          body: "Lorem ipsum dolor sit amet consectetur, adipisicing elit.",
          author: "user"
        },
        {
          id: 3,
          body: "Lorem ipsum dolor sit amet consectetur, adipisicing elit.",
          author: "bot"
        },
        {
          id: 4,
          body: "Lorem ipsum dolor sit amet consectetur, adipisicing elit.",
          author: "user"
        }
      ]
    };
  },

  methods: {
    sendMessage() {
      const { userMessage } = this;

      if (userMessage.length === 0) return;

      this.addToChat({ message: userMessage, author: AUTHOR.USER });
      this.adjustChatBoxViewIfNeeded();
      this.clearUserMessageField();
      this.fetchBotResponse(userMessage);
    },

    addToChat({ message, author }) {
      this.messages.push({
        id: Math.random(),
        body: message,
        author
      });
    },

    clearUserMessageField() {
      this.userMessage = "";
    },

    fetchBotResponse(userMessage) {
      axios
        .post(BOTMAN_API_ENDPOINT, {
          message: userMessage
        })
        .then(response => {
          const { data } = response;

          console.log("data", data);
          console.log("response", response);

          if (data.length === 0) return;

          this.addToChat({ message: data, author: AUTHOR.BOT });
          this.adjustChatBoxViewIfNeeded();
        })
        .catch(error => {
          this.addToChat({
            message: "Something went wrong. Please try again.",
            author: AUTHOR.BOT
          });
          this.adjustChatBoxViewIfNeeded();
          console.error("error", error.message);
        });
    },

    adjustChatBoxViewIfNeeded() {
      const { chatBoxRef } = this.$refs;

      chatBoxRef.scroll({
        top: chatBoxRef.scrollHeight,
        left: 0,
        behavior: "smooth"
      });

      // const overflowing = chatBoxRef.scrollHeight > chatBoxRef.clientHeight;
    }
  }
};
</script>
