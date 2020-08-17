<template>
    <div class="list p-3 bg-white shadow-sm">
        <div v-if="loading" class="d-flex h-100 align-tem-center justify-content-center">
            <div class="spinner-border" role="status"></div>
        </div>
        <div v-else>
            <div class="list-group list-group-flush">
                <notes-item v-for="n in notelist" :note="n" :key="n.id" :active="n.id == activeNoteId" @click.native="emitNoteClick(n)"/> 
            </div>
        </div>
    </div>
</template>

<script>
import NotesItem from './notes-item.vue';

export default {
    components : {
        NotesItem
    },

    data() {
        return {
            loading: true,
            notelist: []
        }
    },

    mounted() {
        this.getNoteList();
    },

    methods: {
        getNoteList() {
            this.loading = true;

            axios.get('api/notes')
            .then( res => {
                this.notelist = res.data;
                console.log("api data = " + notelist);
            })
            .finally(() => {
                this.loading = false;
            })
        },

        emitNoteClick(note) {
            this.activeNoteId = note.id;
            this.$emit('note-clicked', note);
        },

    },
}
</script>

<style lang="scss">
    .list {
        height: 80vh;
    }
</style>