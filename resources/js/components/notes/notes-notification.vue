<template>
  <div>
    <div v-if="notify" class="alert alert-danger alert-dismissible fade show" role="alert" v-bind:style="{display: seen}">
      <strong>{{ printNoti }}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    notify: {
      type: Object,
      required: false,
    },
  },

  data() {
      return {
          seen: 'none'
      }
  },

  computed: {
    printNoti() {
      return this.notify[0].type + "! " + this.notify[0].message;
    },
  },

  updated() {
    this.seen = 'block';
  },
};
</script>
