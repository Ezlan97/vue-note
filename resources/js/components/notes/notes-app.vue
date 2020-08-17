<template>

    <div class="wrapper container">
        <div class="notes">

            <div class="row">
                <div class="header col-md-12">
                    <p>header</p>
                </div>
            </div>

            <div class="row">
                <div class="list col-md-4">
                    <notes-list @note-clicked="onNoteClicked" @updated-content="updatedContent"/>
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

export default {
    props: {
        component: {
            type: Object,
            required: true
        }
    },

    components : {
        NotesList,
        NotesContent
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

        .header {
            background-color: greenyellow;            
        }

        .list {
            height: 80vh;
        }
    }
</style>