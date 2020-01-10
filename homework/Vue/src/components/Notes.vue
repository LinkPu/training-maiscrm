<template>
  <div>
    <span :style="{ color: activeColor }">{{ content }}</span>
    <button class="del-btn" @click="delNote(index)">X</button>
  </div>
</template>

<script>
export default {
  name: 'Notes',
  props: {
    content: String,
    activeColor: String,
    index: Number,
    noteList: Array
  },
  methods: {
    delNote(index){
      this.noteList.splice(index, 1);
    }
  }
}
</script>

<style scoped>
.del-btn {
  position: absolute;
  right: 0;
}
</style>
