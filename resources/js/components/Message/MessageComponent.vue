<template>
  <div class="kt-chat">
    <div class="kt-portlet kt-portlet--head-lg kt-portlet--last">
      <div class="kt-portlet__body">
        <div
          class="kt-scroll kt-scroll--pull chatMsgs"
          data-mobile-height="300"
          style="height:730px;"
          data-scroll="true"
          v-chat-scroll
        >
          <div class="kt-chat__messages" v-for="sms in smsArray">
            <sender :message="sms"></sender>
          </div>
        </div>
      </div>
      <message-input :phone-number="ordererPhone" :order-id="orderId" @send-sms="sendSms" v-if="!replyOff"></message-input>
    </div>
  </div>
</template>
 
<script>
import Vue from 'vue';
import Receiver from "./ReceiverComponent";
import Sender from "./SenderComponent";
import MessageInput from "./MessageInputComponent";

export default {
  props: ["smsLogs", "orderId", "ordererPhone", "replyOff"],
  components: {
    Receiver,
    Sender,
    MessageInput
  },
  data() {
    return {
      smsArray: JSON.parse(this.smsLogs)
    };
  },
  methods: {
    sendSms({ phone_number, message, order_id }) {
      axios
        .post("/admin/order/send_sms", {
          phone_number,
          message,
          order_id
        })
        .then(({ data }) => {
          this.smsArray.push(data);
        })
        .catch(err => {
          if (err.response) {
            let {
              data: { message }
            } = err.response;
            toastr.error(message);
          }
        });
    }
  }
};
</script>
<style scoped>
.chatMsgs {
  overflow: scroll;
  overflow-x: auto;
}
.chatMsgs::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
  background-color: #f5f5f5;
  border-radius: 10px;
}

.chatMsgs::-webkit-scrollbar {
  width: 5px;
  background-color: #f5f5f5;
}

.chatMsgs::-webkit-scrollbar-thumb {
  border-radius: 15px;
  background-image: -webkit-gradient(
    linear,
    left bottom,
    left top,
    color-stop(0.44, rgb(124, 212, 253)),
    color-stop(0.72, rgb(109, 209, 255)),
    color-stop(0.86, rgb(34, 185, 255))
  );
}
</style>