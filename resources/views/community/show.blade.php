@extends('layouts.app')

@section('content')
<div id="community">
    <ul class="messages">
        <div v-for="(m,index) in messages.messages">
        <section v-if="m.user_id == {{Auth::id()}}">
            <li class="right-side">
                    <div class="img-and-name">
                        <span>{{Auth::user()->name}}</span>
    
                    </div>
                    <span v-text="m.messages" class="chat_text shadow"></span>
              
            </li>
        </section>
        <section v-else>
            <li class="left-side">
                    <div class="img-and-name">
                        <span v-text="messages.users[index].name"></span>
                        
                    </div>
                
                <span v-text="m.messages" class="chat_text shadow"></span>
            </li>
        </section>
        </div>
    </ul>

  <form enctype="multipart/form-data" @submit.prevent="send" class="bg-light">
      <div class="input-group chat_form_group">
          <input
          type="textarea"
          placeholder="Type a message"
          aria-describedby="button-addon2"
          class="form-control rounded-0 border-0 py-4 bg-light"
          v-model="text"
          />
          <div class="input-group-append">
              <button type="submit">送信</button>
          </div>
      </div>
  </form>
</div>
<script src="/js/app.js"></script>
<script>
  new Vue({
    el: "#community",
    data: {
      messages: [],
      text: "",
      userId: "{{Auth::id()}}",
    },
    methods: {
      getMessages() {
        
        axios.get(`/community/show`).then((res) => {
          // propsで渡されたmessagesをarrayに入れている
         
          this.messages = res.data;
          
          console.log(this.messages);
          console.log('getMessages');
        });
      },
      send() {
     
        let obj = {
          messages:this.text,
          user_id:this.userId,
        };
        console.log(obj);
       console.log(`/community/store`);
        axios
          .post(`/community/store`,obj)
          .then((res) => {
            this.getMessages();
            this.text="";
  
            console.log('sss');
          })
          .catch(function (error) {
            console.log(error);
          });
      },
    },
    mounted() {
    this.getMessages();
    },
  });
</script>
@endsection 
