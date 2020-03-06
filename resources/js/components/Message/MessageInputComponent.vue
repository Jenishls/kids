<template>
    <div class="kt-portlet__foot">
        <div class="kt-chat__input">
            <div class="kt-chat__editor">
                <textarea style="height: 50px" placeholder="Type here..." v-model="message"></textarea>
            </div>
            <div class="kt-chat__toolbar">
                <!-- <div class="kt_chat__tools">
                    <a href="#"><i class="flaticon2-link"></i></a>
                    <a href="#"><i class="flaticon2-photograph"></i></a>
                    <a href="#"><i class="flaticon2-photo-camera"></i></a>
                </div> -->
                <div class="kt_chat__actions">
                    <button type="button" class="btn btn-brand btn-md btn-upper btn-bold kt-chat__reply" @click="onSendSms(phoneNumber, message, orderId)">Send</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default{
        props : ['phoneNumber', 'orderId'],
        data(){
            return{
                message : "" //binded with v-model
            }
        },
        methods : {            
            onSendSms(phone_number, message, order_id){
                let obj = {
                    phone_number,
                    message,
                    order_id
                };
                this.$emit('send-sms', obj)
            }
        }
    }

</script>
