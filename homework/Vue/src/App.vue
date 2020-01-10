<template>
  <div id="app">
    <div id="note-list">
      <ul class="note-ul">
        <li v-for="(item, index) in dataList" v-bind:key="item.id">
          <Notes :content="item.content" :activeColor="item.color" :index="index" :noteList="dataList" ></Notes>
        </li>
      </ul>
    </div>
    <div id="input-box">
      <input v-model="newNote" :style="{ color: colorList[defaultColorIndex] }"><br>
      <div class="btn-list">
        <button id="submit" @click="submitNote">确认</button>
        <button :style="{ background: colorList[1] }" @click="changeColor(1)">1</button>
        <button :style="{ background: colorList[2] }" @click="changeColor(2)">2</button>
        <button :style="{ background: colorList[3] }" @click="changeColor(3)">3</button>
      </div>
    </div>
  </div>
</template>

<script>
import Notes from "./components/Notes.vue"

export default {
  name: "myapp",
  components: {
    Notes,
  },
  data(){
    return{
      newNote: "",
      colorList: ["black", "red", "gold", "green"],
      noteItem: { color: "black", content: "" },
      dataList: [],
      colorIndex: 0,
      defaultColorIndex: 0
    }
  },
  methods: {
    submitNote() {
      if (this.newNote == "") {
        return;
      }
      this.colorIndex = this.defaultColorIndex;
      this.noteItem = { color: this.colorList[this.colorIndex], content: this.newNote };
      this.defaultColorIndex = 0;
      this.dataList.push(this.noteItem);
      this.newNote = "";
    },
    changeColor(index) {
      this.defaultColorIndex = index;
      this.colorIndex = index;
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
}
#input-box {
  position: absolute;
  overflow: auto;
  width: 50%;
  top: 70%;
  left: 25%;
  transform: translateX(-50%), translateY(-50%);
}
#input-box input {
  position: relative;
  width: 95%;
  height: 30px;
  font-size: 20px;
}
.note-ul {
  max-height: 400px;
  overflow: auto;
}
.note-ul li {
  margin: 0 10px;
  width: 90%,
}
.btn-list {
  position: relative;
  width: 95%;
  margin: 30px auto 0;
  height: 100px;
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
#submit {
  width: 100px;
}
</style>
