<template>
    <div class="main">
        <p><span class="color">■</span>賛成  ()は総数</p>
        <div class="show">
            
            <div class="left">
                <h2>結果</h2>
                <div class="pie" v-bind:style="{ backgroundImage: this.data_label_css[0]}"><span>{{this.data_label[0]}}</span></div>
            </div>
            <div class="right">
                    <h3>男女別</h3>
                <div class="sex">
                    <div class="male">
                        男<div class="pie " v-bind:style="{ backgroundImage: this.data_label_css[1]}"><span>{{this.data_label[1]}}</span></div>
                    </div>
                    <div class="female">
                        女<div class="pie" v-bind:style="{ backgroundImage: this.data_label_css[2]}"><span>{{this.data_label[2]}}</span></div>
                    </div>
                </div>
                <h3>年齢別</h3>
                <div class="age">
                    
                    <div class="young">25歳以下<div class="pie " v-bind:style="{ backgroundImage: this.data_label_css[3]}"><span>{{this.data_label[3]}}</span></div></div>
                    <div class="middle">25~45<div class="pie " v-bind:style="{ backgroundImage: this.data_label_css[4]}"><span>{{this.data_label[4]}}</span></div></div>
                    <div class="old">45歳以上<div class="pie " v-bind:style="{ backgroundImage: this.data_label_css[5]}"><span>{{this.data_label[5]}}</span></div></div>
                </div>
            </div>
        </div>
        <div class="vote">
            <h2>投票</h2>
            <div class="show" v-if = "vote">
                <div class="left">
                    <button class="btn btn-primary" @click="vote_for">必要</button>
                </div>
                <div class="right">
                    <button class="btn btn-primary" @click="vote_against">必要でない</button>
                </div>
            </div>
            <p v-else>すでに投票しています。</p>
        </div>
        <div class="modal" :class="{'is-active':this.modal}">
            <div class="modal-background" @click="close"></div>
            <div class="modal-content">
                <div class="box">
                    <h2>投票には<a href="/register">ログイン</a>が必要です。</h2>
                   
                </div>
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
            default:false,
        },
        endpoint:{
            type:String,
            
        },
        endpoint_has_my_vote:{
            type:String,
            
        },
        endpoint_get_vote:{
            type:String,
            
        },
        modal:{
            type:Boolean,
            default:false,
        },
        article_id:{
            type:Number,
            default:0,
        },
        user_attribute:{
            type:Number,
            default:0,
        },
        user:{
            type:Object,
            default:{},
        },
        
        
        vote:{
            type:Boolean,
            default:true,
        },
        data_amount:{

        },
        data_for:{

        },
        data_label_css:{

        }
        ,data_label:{

        }

    },
    created(){
        console.log(this.endpoint_get_vote);
        this.has_my_vote();
        this.get_vote();
        if(this.authorized){
            
            
            
            if(this.user.age == 1 && this.user.sex == 1)
                this.user_attribute = 1;
            else if ( this.user.age == 1 && this.user.sex == 2)
                this.user_attribute = 2;
            else if ( this.user.age == 2 && this.user.sex == 1)
                this.user_attribute = 3;
            else if ( this.user.age == 2 && this.user.sex == 2)
                this.user_attribute = 4;
            else if (this.user.age == 3 && this.user.sex == 1)
                this.user_attribute = 5;
            else
                this.user_attribute = 6;
        }
        
        
    },

    methods:{
        vote_for(){
            if(!this.authorized){
                this.modal = true;
            }else{
                
                this.votes();
                this.get_vote();
            }
        },
        vote_against(){
            if(!this.authorized){
                this.modal = true;
            }else{
                this.vote = 0;
                this.votes();
                this.get_vote();
            }
        },
        close(){
            this.modal = false;
        }
        ,async votes(){
            const res = await axios.post(this.endpoint,{
                article_id:this.article_id,
                user_attribute:this.user_attribute,
                vote:this.vote,
                user_id:this.user.id,
                user_attribute:this.user_attribute,
            });
            this.has_my_vote();
            console.log(res);
        }
        ,async get_vote(){
            const res = await axios.get(this.endpoint_get_vote);
            const promiseResult = await res;
            console.log(promiseResult.data);
            this.data_amount = promiseResult.data[0];
            this.data_for = promiseResult.data[1];
            this.data_label = promiseResult.data[2];
            this.data_label_css = promiseResult.data[3];

            
            
        },
        async has_my_vote(){
            const res = await axios.get(this.endpoint_has_my_vote);
            const promiseResult = await res;
            
            if (promiseResult.data == 1)
                
                this.vote = false;
            
        }
    }

}
</script>
<style scoped>
.sex{
    display:flex;
    justify-content:space-between;
}
.age{
    display:flex;
    justify-content:space-between;
}
h2{
    font-size:1.4rem;
}
h3{
    font-size:1.2rem;
    font-weight: bold;
}
.show {
    display: flex;
}
.left,.right{
    width:50%;
}
.pie {
	position: relative;
	margin-right: auto;
	margin-left: auto;
	
	background-image: conic-gradient(#d5525f 0% 0%, #d9d9d9 0% 100%);
	border-radius: 50%;
}
.pie {
	position: relative;
	margin-right: auto;
	margin-left: auto;
	
	background-image: conic-gradient(#d5525f 0% 0%, #d9d9d9 0% 100%);
	border-radius: 50%;
}
.pie {
	position: relative;
	margin-right: auto;
	margin-left: auto;
	
	background-image: conic-gradient(#d5525f 0% 0%, #d9d9d9 0% 100%);
	border-radius: 50%;
}
.young>.pie {
	position: relative;
	margin-right: auto;
	margin-left: auto;
	
	background-image: conic-gradient(#d5525f 0% 0%, #d9d9d9 0% 100%);
	border-radius: 50%;
}
.middle>.pie {
	position: relative;
	margin-right: auto;
	margin-left: auto;
	
	background-image: conic-gradient(#d5525f 0% 0%, #d9d9d9 0% 100%);
	border-radius: 50%;
}
.old>.pie {
	position: relative;
	margin-right: auto;
	margin-left: auto;
	
	background-image: conic-gradient(#d5525f 0% 0%, #d9d9d9 0% 100%);
	border-radius: 50%;
}
.left>.pie{
    width:200px;
    height:200px;
}
.sex .pie{
    width:100px;
    height:100px;
}
.age .pie{
    width:70px;
    height:70px;
}
.age .pie span{
    font-size:0.8rem;
    right:5px;
}
.sex .pie span{
    font-size:1rem;
    right:10px;
}
.pie span {
	position: absolute;
	top: 50%;
	right: 50px;
	transform: translateY(-50%);
	color: #fff;
	font-size: 26px;
	font-weight: 700;
}
.vote{
    text-align: center;
}
.color{
    color:#d5525f;
}
</style>
