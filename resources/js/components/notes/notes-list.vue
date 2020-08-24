<template>
  <div class="list p-3 bg-white shadow-sm">
    <br />
    <div class="list-group list-group-flush">
      <input
        class="form-control mr-sm-2"
        type="search"
        v-model="search"
        placeholder="Search Note..."
        aria-label="Search"
        @keypress="searchContent"
      />
    </div>
    <br />
    <div v-if="loading" class="d-flex h-100 align-tem-center justify-content-center">
      <div class="spinner-border" role="status"></div>
    </div>
    <div v-else>
      <div class="list-group list-group-flush">
        <notes-item
          v-for="n in notes"
          :note="n"
          :key="n.id"
          :active="n.id == activeNote.id"
          @click.native="emitNoteClick(n)"
        />
      </div>
    </div>
  </div>
</template>

<script>
import NotesItem from "./notes-item.vue";
import NoteAPI from "../../api/note";

export default {
  components: {
    NotesItem,
  },

  props: {
    user: {
      type: Object,
    },
  },

  data() {
    return {
      loading: true,
      search: null,
    };
  },

  mounted() {
    this.getNoteList();
  },

  methods: {
    searchContent: _.debounce(function () {
      NoteAPI.searchNote({ search: this.search }).then((res) => {
        if (!res.data.length) {
          console.log("no result found!");
          this.noti = [];
          //notification status and message
          this.noti.push({
            type: "failed",
            message: "No result found for keyword " + this.search,
          });
          console.log(this.noti);
          this.$emit("no-result-found", this.noti);
        } else {
          console.log("result found!");
          this.$store.dispatch("initNoteList", res.data);
        }
      });
    }, 1000),

    getNoteList() {
      this.loading = true;

      NoteAPI.getAllNote(this.user.id)
        .then((res) => {
          this.$store.dispatch("initNoteList", res.data);
        })
        .finally(() => {
          this.loading = false;
        });
    },

    emitNoteClick(note) {
      this.activeNoteId = note.id;
      this.$store.dispatch("initNoteActive", note);
    },
  },

  computed: {
    notes() {
      return this.$store.state.noteLists;
    },

    activeNote() {
      return this.$store.state.activeNote;
    },
  },
};
</script>

<style lang="scss" scoped>
.list {
  height: 80vh;
  overflow: scroll;
}
</style>
