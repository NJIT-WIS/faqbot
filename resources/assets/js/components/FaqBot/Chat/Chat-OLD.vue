<template>
  <div>
    <div class="chat">
      <div class="chat-title">
        <h1>ChatBot</h1>
        <figure class="avatar">
          <img src="https://emojipedia-us.s3.amazonaws.com/thumbs/120/apple/129/robot-face_1f916.png" />
        </figure>
      </div>
      <div class="messages">
        <div class="messages-content">
          <div class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" style="max-height: none;" tabindex="0">
            <div class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position: relative; left: 0px; top: 0px;" dir="ltr">
              <template v-for="message in messages">
                <div v-if="message.author === 'chatbot'" class="message new">
                  <figure class="avatar">
                    <img src="https://emojipedia-us.s3.amazonaws.com/thumbs/120/apple/129/robot-face_1f916.png">
                  </figure>
                  {{ message.text }}
                </div>

                <div v-if="message.author === 'user'" class="message message-personal new">
                  {{ message.text }}
                </div>
              </template>
            </div>
          </div>
        </div>
      </div>
      <div class="message-box">
        <textarea 
          type="text" 
          class="message-input" 
          placeholder="Type message..." 
          v-model="userMessage"
          @keyup.enter="askQuestion"
        ></textarea>
        <button 
          type="button" 
          class="message-submit"
          v-on:click="askQuestion"
        >Send</button>
      </div>
    </div>
  </div>
</template>

<style scoped>
*,
*::before,
*::after {
  box-sizing: border-box;
}

.chat {
  width: 300px;
  height: 80vh;
  margin-top: 50px;
  max-height: 500px;
  z-index: 2;
  overflow: hidden;
  box-shadow: 0 5px 30px rgba(0, 0, 0, 0.2);
  background: rgba(0, 0, 0, 0.5);
  border-radius: 20px;
  display: flex;
  justify-content: space-between;
  flex-direction: column;
}

.chat-title {
  flex: 0 1 45px;
  position: relative;
  z-index: 2;
  background: rgba(0, 0, 0, 0.2);
  color: #fff;
  text-transform: uppercase;
  text-align: left;
  padding: 10px 10px 10px 50px;
}
.chat-title h1 {
  font-weight: normal;
  font-size: 14.5px;
  margin-top: 5px;
  margin: 5px 0 0 0;
  padding: 0;
}
.chat-title .avatar {
  position: absolute;
  z-index: 1;
  top: 8px;
  left: 9px;
  border-radius: 30px;
  width: 30px;
  height: 30px;
  overflow: hidden;
  margin: 0;
  padding: 0;
}
.chat-title .avatar img {
  width: 100%;
  height: auto;
}

.messages {
  flex: 1 1 auto;
  color: white;
  overflow: hidden;
  position: relative;
  width: 100%;
}
.messages .messages-content {
  position: absolute;
  top: 0;
  left: 0;
  height: 101%;
  width: 100%;
  overflow-y: scroll;
}
.messages .message {
  clear: both;
  float: left;
  padding: 6px 10px 7px;
  border-radius: 10px 10px 10px 0;
  background: rgba(0, 0, 0, 0.3);
  margin: 8px 0;
  font-size: 11px;
  line-height: 1.4;
  margin-left: 35px;
  position: relative;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
}
.messages .message::before {
  content: "";
  position: absolute;
  bottom: -6px;
  border-top: 6px solid rgba(0, 0, 0, 0.3);
  left: 0;
  border-right: 7px solid transparent;
}
.messages .message .avatar {
  position: absolute;
  z-index: 1;
  bottom: -15px;
  left: -35px;
  border-radius: 30px;
  width: 30px;
  height: 30px;
  overflow: hidden;
  margin: 0;
  padding: 0;
  border: 2px solid rgba(255, 255, 255, 0.24);
}
.messages .message .avatar img {
  width: 100%;
  height: auto;
}
.messages .message.message-personal {
  float: right;
  color: #fff;
  text-align: right;
  background: linear-gradient(120deg, #248a52, #257287);
  border-radius: 10px 10px 0 10px;
}
.messages .message.message-personal::before {
  left: auto;
  right: 0;
  border-right: none;
  border-left: 5px solid transparent;
  border-top: 4px solid #257287;
  bottom: -4px;
}
.messages .message:last-child {
  margin-bottom: 30px;
}

.message-box {
  flex: 0 1 40px;
  width: 100%;
  background: rgba(0, 0, 0, 0.3);
  padding: 10px;
  position: relative;
}
.message-box .message-input {
  background: none;
  border: none;
  outline: none !important;
  resize: none;
  color: #fff;
  font-size: 12.5px;
  height: 17px;
  margin: 0;
  padding-right: 20px;
  width: 265px;
}
.message-box textarea:focus:-webkit-placeholder {
  color: transparent;
}
.message-box .message-submit {
  position: absolute;
  z-index: 1;
  top: 9px;
  right: 10px;
  color: #fff;
  border: none;
  background: #248a52;
  font-size: 12px;
  text-transform: uppercase;
  line-height: 1;
  padding: 6px 10px;
  border-radius: 10px;
  outline: none !important;
}
.message-box .message-submit:hover {
  background: #1d7745;
}

.mCSB_scrollTools {
  margin: 1px -3px 1px 0;
  opacity: 0;
}

.mCSB_inside > .mCSB_container {
  margin-right: 0px;
  padding: 0 15px;
}

.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar {
  background-color: rgba(0, 0, 0, 0.5) !important;
}
</style>

<script>
export default {
  data() {
    return {
      messages: [
        { id: 1, text: "How can I help you today?", author: "chatbot" },
        { id: 12, text: "What is 2 + 4?", author: "user" },
        { id: 13, text: "The answer is 6!", author: "chatbot" },
        { id: 14, text: "Thank you!", author: "user" }
      ],
      userMessage: null
    };
  },

  methods: {
    askQuestion() {
      const BOTMAN_API_ENDPOINT = "/botman";

      if (this.userMessage.length > 0) {
        axios
          .post(BOTMAN_API_ENDPOINT, {
            message: this.userMessage
          })
          .then(response => {
            console.log("response", response);
          })
          .catch(error => {
            console.error(error.message);
          });
      }
    }
  }
};
</script>
