<template>
  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand">Simply Note</a>
    <div class="form-inline my-2 my-lg-0">
      <button class="btn btn-primary mr-sm-2" v-on:click="emitNewNote()">+ New Note</button>
      <div class="dropdown">
        <span
          class="material-icons text-white dropdown-toggle"
          id="dropdownMenuButton"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
        >face</span>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="/logout">Logout</a>
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
import NoteAPI from "../../api/note";

export default {
  data() {
    return {
      search: null,
      noti: null,
    };
  },

  methods: {
    emitNewNote() {
      let note = {
        content: "Edit here",
        updated_at: new Date(),
      };
      this.$store.dispatch("initNoteActive", note);
    },
  },
};
</script>

<style lang="scss"></style>
