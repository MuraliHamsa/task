<template>
<div class="conversation">
    <h1>{{contact ? contact.name : 'Select a Contact' }}</h1>
    <h1>{{contact ? contact.gname : '' }}</h1>
    <MessagesFeed :contact="contact" :messages="messages" :groupmessages="groupmessages"/>
    
       <div class="row">
        <div class="col-sm-8">
            <MessageComposer @send="sendMessage" />
        </div>
         <div class="col-sm-2">
          <input type="file" class="form-control" @change="fieldChange" >
       </div>
       <div class="col-sm-2">
         <button class="btn btn-primary btn-sm" type="button"  @click="uploadFile">send</button>
      </div>
    </div>

</div>

</template>


<script>
	import MessagesFeed from './MessagesFeed';
	import MessageComposer from './MessageComposer';

     export default {
        data(){
               return {
                attachment:null,
                form :new FormData,
                id:null
                
          }
        },
     	 props : {
     	 	contact :{
     	 	type:Object,
     	 	default:null
     	 	},
     	 messages :{
     	 	type:Array,
     	 	default:[]
     	 },
       groupmessages :{
        type:Array,
        default:[]
       },
       group:{
         type:Object,
         default:null
       }
     	 }, 
     	 methods : {
            sendMessage(text){
                   if(!this.contact){
                   	return;
                   }
                   console.log(this.contact.gname);
                   axios.post('http://localhost:8000/send',{
                   	contact_id :this.contact.id,
                   	text:text

                   }).then((response)=> {
                   	this.$emit('new',response.data);
                    console.log(response.data);
                   });
            	 
            },
     	
        fieldChange(e){
           
            let selectedFile = e.target.files[0];
            this.attachment = selectedFile;
         },
         uploadFile(){
          
          if(!this.contact){
                    return;
                   }
            this.form.append('image',this.attachment);
            this.form.append('contact_id',this.contact.id);
            const config = {headers: {'Content-Type':'multipart/form-data'}};
            axios.post('http://localhost:8000/sendfile',this.form,config).then(response =>{

            this.$emit('new',response.data);
            }).catch(response =>{

            })
            }
         },
     	 components : {
     	 	MessagesFeed,MessageComposer
     	 } 


   }
	</script>


<style lang="scss" scoped>
.conversation {
    flex: 5;
    display: flex;
    flex-direction: column;
    justify-content: space-between;

    h1 {
        font-size: 20px;
        padding: 10px;
        margin: 0;
        border-bottom: 1px dashed lightgray;
    }
}
</style>
