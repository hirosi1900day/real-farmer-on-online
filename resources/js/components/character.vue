<template>

    <div @click="informationMessage" id="character">
        <div class="flex">
            <div class="character_message_margin">
                <div id="head">
                    <div class="ear" id="left-ear"></div>
                    <div class="ear" id="right-ear"></div>
                    <div id="eyes">
                        <div class="eye"></div>
                        <div class="eye"></div>
                    </div>
                    <div class="mouth"></div>
                </div>
                <div id="body">
                    <div class="arm" id="left-arm">
                        <div class="hands"></div>
                    </div>
                    <div class="arm" id="right-arm">
                         <div class="hands"></div>
                    </div>
                    <div id="legs"></div>
                    <div id="left-foot"></div>
                    <div id="right-foot"></div>
                </div>
            </div>
            <div id="character_chat_text" class="character_chat_text shadow character-message">新着通知(クリックしてね！）</br>
                <span>{{this.information}}</span>
            </div>
        </div>
    </div>
  
    
</template>
<script src="/js/app.js"></script>
<script>
export default {
  data () {
    return {
       messages: [],
       arraynumber:0,
       length:0,
       information:'',
    };
  },
  methods: {
    getMessage(){
        axios.get(`/user/information/index`).then((res) => {
        // propsで渡されたmessagesをarrayに入れている
        this.messages = res.data;
        this.length=this.messages.length;
        this.informationMessage();
        });
    },
    informationMessage(){
           if(this.arraynumber==this.length){
               this.arraynumber=0;
           }
           this.information=this.messages[this.arraynumber].content.replace(/\n/g, '<br/>');
           this.arraynumber++;
           
           console.log(this.information);
        },
 },
    
  mounted() {
    this.getMessage();
    },
};
</script>
