<template>
	<div class="feed" ref="feed">
		<ul v-if="contact">
			<li v-for="message in messages" :class="`message${message.to === contact.id ? ' sent' : ' received'}`" :key="message.id">
				<div class="text" v-if="message.text">
                     
					 {{message.text}} 
                    <li v-if=" contact.id == message.from " style="color:green;" >
                      {{contact.name}}<br>
                      {{message.created_at}}
                   </li>
				</div>
                 <div class="image-container">
                  <img v-if="message.image"  :src="`./chatfiles/`+message.image" alt="" width="50%" height="50%">
                 <a v-if="message.image" :href="`./chatfiles/`+message.image" download> <font-awesome-icon icon="download" />
                <li v-if=" contact.id == message.from " style="color:green" >
                      {{contact.name}}<br>
                      {{message.created_at}}
                   </li>
                 </a>

              </div>
                
			</li>
             
            <li   v-for="groupmessag in groupmessages"  :key="groupmessag.id" >
                <div class="text" v-if="groupmessag.message">
                     
                   <div class="avatar">
                       <img :src="groupmessag.user.profile_image" :alt="groupmessag.user.name"> &nbsp;&nbsp;{{groupmessag.message }}<br>
                  </div>  
                    
                     
                     
                     
                </div>
                    
                
                
            </li>
		</ul>
	</div>
</template>
<script>


         export default {

         	props : {
         		contact:{
         			type:Object,
         		},
                messages : {
               	  type:Array,
                 
               },
               groupmessag : {
                 type:Array,
                 
             },
               groupmessages : {
                  type:Array,
                 
               }
         },
         methods :{
         	scrollToBottom(){
         		setTimeout(()=>{

         		this.$refs.feed.scrollTop = this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
         	},50);
         	}
         },
         watch : {
         	contact(contact){
             this.scrollToBottom();
         	},
         	messages(messages){
             this.scrollToBottom();
            
         	}
         }
         	}



	</script>
	<style lang="scss" scoped>
         .avatar {
               
                align-items: center;

                img {
                    width: 35px;
                    border-radius: 50%;
                    margin: 0 auto;
                }
            }

.feed {
    background: #f0f0f0;
    height: 100%;
    max-height: 470px;
    overflow: scroll;

    ul {
        list-style-type: none;
        padding: 5px;

        li {
            &.message {
                margin: 10px 0;
                width: 100%;

                .text {
                    max-width: 200px;
                    border-radius: 5px;
                    padding: 12px;
                    display: inline-block;
                }

                &.received {
                    text-align: right;

                    .text {
                        background-color: #81c4f9;
                    }
                }

                &.sent {
                    text-align: left;

                    .text {
                        background:#F48024 ;
                    }
                }
            }
        }
    }
}
</style>
