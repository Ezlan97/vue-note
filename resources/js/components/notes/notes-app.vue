<template>

    <div class="wrapper container">
        <div class="notes">

            <div class="row">
                <div class="header col-md-12">
                    <notes-header/>
                </div>
            </div>

            <div class="row">
                <div class="list col-md-4">
                    <notes-list @note-clicked="onNoteClicked"/>
                </div>
                <div class="contents col-md-8">
                    <notes-content :note="activeNote" />
                </div>
            </div>

        </div>
    </div>

</template>

<script>
import NotesList from './notes-list.vue';
import NotesContent from './notes-content.vue';
import NotesHeader from './notes-header.vue';

export default {
    components : {
        NotesList,
        NotesContent,
        NotesHeader,
    },

    data() {
        return {
            activeNote: null
        }
    },

    methods: {
        onNoteClicked(note) {
            this.activeNote = note;
        },
    },    
}
</script>

<style lang="scss">
    .wrapper {
        align-items: center;
        display: flex;
        height: 100vh;
    }

    .notes {
        flex-grow: 1;

        .contents {
            height: 80vh;
            padding-left: 0%;
        }

        .list {
            height: 80vh;
            padding-right: 0%;
        }
    }
</style>