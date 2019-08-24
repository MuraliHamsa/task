<template>
<div class="contacts-list">
	  <ul>
          <li v-for="contact in sortedContacts" :key="contact.id" @click="selectContact(contact)" :class="{'selected' : contact === selected}"> 
             
          	<div class="avatar">
          		<img :src="contact.profile_image" :alt="contact.name">
          	</div>
          	<div class="conatct">
          		<p class="name">{{contact.name}}</p>
          		
          		
          	</div>
            <span class="unread" v-if="contact.unread">{{contact.unread}}</span>
          </li>
         
	  </ul>
     <ul>
          <li v-for="group in groupss" :key="group.id" :class="{'selectedgroup' : group === selectedgroup}" @click="selectGroup(group)"> 
             
            <div class="avatar">
              <img :src="group.profile_image" :alt="group.gname">
            </div>
            <div class="conatct">
              <p class="name">&nbsp;&nbsp;{{group.gname}}</p>
              
              
            </div>
           
          </li>
         
    </ul>
</div>

</template>


<script>
     export default {

     	 props : {

     	 	 contacts:{
     	 	 	 type:Array,
     	 	 	 default:[]
               },
         groups:{
               type:Array,
               default:[]
               }
     	 },

      
     	 data(){
     	 	return {
     	 		selected:this.contacts.length ? this.contacts[0] : null,
          selectedgroup:this.groups.length ? this.groups[0] : null,
         

     	 	};
     	 },
     	 methods: {
     	 	selectContact(contact){
                  this.selected = contact;
                  
     	 		        this.$emit('selected',contact);
              },
        selectGroup(group){

                  this.selectedgroup = group;
                  
                  this.$emit('selectedgroup',group);
              }
              
     	 },

         computed: {
              sortedContacts(){
                return _.sortBy(this.contacts, [(contact)=>{
                    if(contact === this.selected){
                        return Infinity;
                    }
                    return contact.unread;
                }]).reverse();
              },
              groupss(){
                return _.sortBy(this.groups, [(group)=>{
                    if(group === this.selected){
                        return Infinity;
                    }
                    return group.unread;
                }]).reverse();
              }
            
         }

   }
	</script>

	<style lang="scss" scoped>
.contacts-list {
    flex: 1;
    max-height: 600px;
    overflow: scroll;
    border-left: 1px solid #a6a6a6;
    align-items:left;    
    ul {
        list-style-type: none;
        padding-left: 0;

        li {
            display: flex;
            padding: 1px;
            border-bottom: 1px solid #aaaaaa;
            height: 80px;
            position: relative;
            cursor: pointer;

            &.selected {
                background: #dfdfdf;
            }

            span.unread {
                background: #82e0a8;
                color: #fff;
                position: absolute;
                right: 11px;
                top: 20px;
                display: flex;
                font-weight: 700;
                min-width: 20px;
                justify-content: center;
                align-items: center;
                line-height: 20px;
                font-size: 12px;
                padding: 0 4px;
                border-radius: 3px;
            }

            .avatar {
               
                align-items: center;

                img {
                    width: 35px;
                    border-radius: 50%;
                    margin: 0 auto;
                }
            }

            .contact {
                flex:1;
                font-size:10px;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                justify-content: center;

                p {
                    margin: 0;

                    &.name {
                        font-weight: bold;
                        font-size: 15px;
                    }
                }
            }
        }
    }
}
</style>
