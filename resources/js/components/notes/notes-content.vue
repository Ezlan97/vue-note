<template>
  <div class="content bg-light shadow-sm">
    <br />
    <p class="date text-center">{{ formatedDate }}</p>
    <div class="container">
      <textarea
        class="contentbox form-control"
        v-if="note || show == true"
        @keyup="saveNote"
        v-model="note.content"
        id="content"
      ></textarea>
    </div>
    <!-- footer -->
    <footer class="footer">
      <div class="container">
        <div class="float-right">
          <p class="text-muted">Total Note : {{ this.$store.state.noteLists.length }}</p>
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
import NoteAPI from "../../api/note";

export default {
  props: {
    note: {
      required: false,
    },
    user: {
      type: Object,
    },
  },

  data() {
    return {
      show: false,
    };
  },

  computed: {
    formatedDate() {
      let date = null;

      if (this.$store.state.activeNote != []) {
        date = new Date(this.$store.state.activeNote.updated_at);
      } else {
        date = new Date();
      }

      return date.toLocaleString("en-gb", {
        year: "numeric",
        month: "long",
        day: "numeric",
        hour: "2-digit",
        minute: "2-digit",
      });
    },
  },

  methods: {
    // patch content and add debounce
    saveNote: _.debounce(function () {
      //check if function called succesfully
      console.log("success : method save note called");
      console.log("Content : " + this.note.content);

      //ready variable and form data
      let updatedContent = this.note;
      let formData = new FormData();
      formData.append("content", updatedContent.content);
      formData.append("user_id", this.user.id);

      // check need update or create new note
      if (!this.note.id) {
        NoteAPI.saveNote(formData).then((res) => {
          this.note = res.data;
          this.$store.dispatch("pushToNoteList", res.data);
        });
      } else {
        NoteAPI.updateNote(this.note.id, { content: updatedContent.content }).then((res) => {
          console.log("api data = " + res.data);
        });
        console.log("updated note");
      }
    }, 1000),
  },
  
};
</script>

<style lang="scss">
.form-control {
  display: block;
  width: 100%;
  height: calc(1.6em + 0.75rem + 2px);
  padding: 0.375rem 0.75rem;
  font-size: 0.9rem;
  font-weight: 400;
  line-height: 1.6;
  color: #495057;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.content {
  height: 80vh;
}

.footer {
  position: absolute;
  bottom: 0;
  height: 60px; /* Set the fixed height of the footer here */
  line-height: 60px; /* Vertically center the text there */
}
</style>
