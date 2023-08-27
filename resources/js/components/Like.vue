<template>
    <div class="hoge"><i class="fa-solid fa-thumbs-up" @click="like_or_unlike" v-bind:class="{red:is_liked}"></i>{{this.get_like}}



    <div class="modal" :class="{'is-active':this.modal}">
            <div class="modal-background" @click="close"></div>
            <div class="modal-content">
                <div class="box">hogehuga</div>
            </div>
            <button class="modal-close is-large" aria-label="close" @click="close"></button>
    </div>
    </div>
</template>

<script>
export default{
    props:{
        authorized:{
            type:Boolean,
            
        },
        endpoint:{
            type:String,
            
        },
        get_like:{
            type:Number,
            default:0,
        },
        is_liked:{
            type:Boolean,
            
        },
        modal:{
            type:Boolean,
            default:false,
        },
        comment_id:{
            type:Number,
            
        },
        
        

    },
    created(){

        
        
    },

    methods:{
        like_or_unlike(){
            if(!this.authorized){
                this.modal = true;
            }else{
                if(this.is_liked){
                    this.un_like();
                    this.get_like -= 1;
                    this.is_liked = false;
                }else{
                    this.like();
                    this.get_like += 1;
                    this.is_liked = true;
                }
            }
        },
        close(){
            this.modal = false;
        },

        async like(){
            const res = await axios.post(this.endpoint,{
                comment_id:this.comment_id,               
                
                like:true,
                
            });
            
        },
        async un_like(){
            const res = await axios.post(this.endpoint,{
                comment_id:this.comment_id,               
                
                like:false,
                
            });
            
        },
       

    }

}
</script>
<style scoped>
.red{
    color:rgb(229, 84, 111);}
</style>