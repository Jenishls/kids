<template>
    <div class="kt-chat__message">
        <div class="kt-chat__user">
            <span class="kt-media kt-media--circle kt-media--sm"> 
                <img :src="dp" alt="image">
            </span>
            <a href="#" class="kt-chat__username">{{sender}}</a>
            <span class="kt-chat__datetime">{{createdAt}}</span>
        </div>
        <div class="kt-chat__text kt-bg-light-success">
            {{textMessage}}
        </div>
    </div>
</template>

<script>
    export default{
        props: {
            message : Object
        },
        data(){
            return{
                textMessage : this.message.message || this.message.body,
                createdAt : this.message.created_at ? moment(this.message.created_at).fromNow() : moment(this.message.date_created).fromNow(),
                sender : this.message.sender_name || this.message.from,
                dp : this.message.sender_dp ? this.message.sender_dp : '/media/users/default.jpg'
            }
        }
        
    }
</script>