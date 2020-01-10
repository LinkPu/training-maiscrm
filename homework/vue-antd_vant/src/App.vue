<template>
  <div id="app">
    <div id="note-list">
      <van-list class="note-list">
        <van-cell v-for="(item, index) in dataList" v-bind:key="item.id">
          <note class="note-item" :content="item.content" :activeColor="item.color" :index="index" :noteList="dataList" ></note>
        </van-cell>
      </van-list>
    </div>
    <div id="input-box">
      <van-field class="text-field" v-model="newNote" @keyup.enter="submitNote"/>
      <div class="btn-list">
        <van-button class="btn confirm" type="primary" @click="submitNote">确认</van-button>
        <van-radio-group v-model="colorIndexRadio" class="color-radio-group">
          <van-radio name="1" :checked-color="colorList[1]">
            <van-button class="btn" :color="colorList[1]"></van-button>
          </van-radio>
          <van-radio name="2" :checked-color="colorList[2]">
            <van-button class="btn" :color="colorList[2]"></van-button>
          </van-radio>
          <van-radio name="3" :checked-color="colorList[3]">
            <van-button class="btn" :color="colorList[3]"></van-button>
          </van-radio>
        </van-radio-group>
      </div>
    </div>
  </div>
</template>

<script>
import { Field, Button, List, Cell, RadioGroup, Radio } from 'vant';
import Note from "./components/Note.vue";

export default {
  name: "myapp",
  components: {
    Note,
    [Button.name]: Button,
    [Field.name]: Field,
    [List.name]: List,
    [Cell.name]: Cell,
    [RadioGroup.name]: RadioGroup,
    [Radio.name]: Radio,
  },
  data(){
    return{
      newNote: "",
      colorList: ["#000000", "#00FFFF", "#FF8C00", "#FF0000"],
      noteItem: { color: "black", content: "" },
      dataList: [],
      colorIndex: 0,
      colorIndexRadio: 0
    }
  },
  methods: {
    submitNote() {
      if (this.newNote == ""){
        return;
      }
      this.colorIndex = this.colorIndexRadio;
      this.noteItem = { color: this.colorList[this.colorIndex], content: this.newNote };
      this.colorIndexRadio = 0;
      this.dataList.push(this.noteItem);
      this.newNote = "";
    }
  }
}
</script>

<style scoped>
#note-list {
  position: relative;
  width: 50%;
  margin: 5px;
  top: 70px;
  background: rgb(255, 255, 255);
  left: 25%;
  transform: translateX(-50%), translateY(-50%);
  max-height: 40%;
  overflow: auto;
}
#input-box {
  position: absolute;
  overflow: auto;
  width: 50%;
  top: 70%;
  left: 25%;
  transform: translateX(-50%), translateY(-50%);
}
#input-box .text-field {
  position: relative;
  width: 95%;
  height: 40px;
  left: 2.5%;
  font-size: 20px;
}
.note-list .note-item {
  margin-top: 5px;
}
.btn-list, .color-radio-group {
  position: relative;
  width: 95%;
  margin: 30px auto 0;
  margin-top: 0px;
  height: 100px;
  display: flex;
  justify-content: space-between;
}
.btn-list button {
  border-radius: 4px;
  border: 1px solid #dcdfe6;
  box-sizing: border-box;
  display: inline-block;
  height: 40px;
  line-height: 40px;
  outline: none;
  padding: 0 15px;
  transition: border-color .2scubic-bezier(.645, .045, .355, 1);
  width: 40px;
  align-self: center;
}
.btn-list .confirm {
  width: 80px;
  margin-right: 10%;
}
</style>
