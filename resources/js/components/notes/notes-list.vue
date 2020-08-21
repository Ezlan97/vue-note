<template>
    <div class="list p-3 bg-white shadow-sm">
        <br>
        <div class="list-group list-group-flush">
            <button class="btn btn-primary" v-on:click="emitNewNote()">+ New Note</button>                      
        </div>
        <br>
        <div
            v-if="loading"
            class="d-flex h-100 align-tem-center justify-content-center"
        >
            <div class="spinner-border" role="status"></div>
        </div>
        <div v-else>
            <div class="list-group list-group-flush">
                <notes-item
                    v-for="n in notes"
                    :note="n"
                    :key="n.id"
                    :active="n.id == activeNoteId"
                    @click.native="emitNoteClick(n)"
                />
                <div class="fixed-bottom">{{ notes.length }}</div>
            </div>
        </div>
    </div>
</template>

<script>
import NotesItem from "./notes-item.vue";

export default {
    components: {
        NotesItem
    },

    props: {
        user: {
            type: Object
        }
    },

    data() {
        return {
            loading: true
        };
    },

    mounted() {
        this.getNoteList();
    },

    methods: {
        getNoteList() {
            this.loading = true;

            axios
                .get("api/notes/" + this.user.id)
                .then(res => {
                    this.$store.dispatch('initNoteList', res.data);
                })
                .finally(() => {
                    this.loading = false;
                });
        },

        emitNoteClick(note) {
            this.activeNoteId = note.id;
            this.$store.dispatch('initNoteActive', note);
        },

        emitNewNote() {
            let note = {
                content: "Edit here",
                updated_at: new Date(),
            }
            this.$emit("new-note", note);
        }
    },

    computed: {
        notes() {
            return this.$store.state.noteLists
        }
    }
};
</script>

<style lang="scss" scoped>
.list {
    height: 80vh;
    overflow: scroll;
}
</style>
