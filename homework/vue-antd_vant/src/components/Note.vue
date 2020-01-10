<template>
  <div class="note">
    <span class="note-text" :style="{ color: activeColor }">{{ content }}</span>
    <van-icon name="cross" class="del-btn" @click="delNote(index)" />
  </div>
</template>

<script>
import { Icon } from 'vant';

export default {
  name: 'note',
  components: {
    [Icon.name]: Icon
  },
  props: {
    content: String,
    activeColor: String,
    index: Number,
    noteList: Array
  },
  methods: {
    delNote(index) {
      this.noteList.splice(index, 1);
    }
  },

}
</script>

<style scoped>
.note {
  margin: auto;
}
.note span {
  height: 100%;
  font-size: 20px;
}
.del-btn {
  position: absolute;
  right: 0;
  margin-right: 10px;
  margin-top: -1px;
  color: #FF4500;
  font-size: 25px;
}
.del-btn:hover {
  color: red;
}
</style>
